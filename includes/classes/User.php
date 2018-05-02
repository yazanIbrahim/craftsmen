<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/3/2018
 * Time: 2:09 AM
 */

class User{
    private $userErrorMsg;
    private $dbObj;
    private $type;
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $surName;
    private $userName;


    public function __construct($dbConnectionObject = null){
        $this->dbObj = $dbConnectionObject;
        $this->userErrorMsg = array();
    }

    public function getErrors(){
        return $this->userErrorMsg;
    }

    public function lockAccount(){
        // set the lock status field in the database to (1)
        $stmt = "UPDATE masteruser SET lock_status = ?";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array(1));

    }

    private function setErrorMsg($key,$errorMsg){
        $this->userErrorMsg[$key] = $errorMsg;

    }

    public function setUserId($id){
        $this->id = $id;
    }

    public function getUserId(){
        return $this->id;
    }

    public function getType(){

        return $this->type;
    }

    public function getDbConnection(){

        return $this->dbObj;
    }

   /*public function signup($arrayData){

        extract($arrayData);

        $hash = md5((rand(0,100000)));// a hash for account activation
        $password1 = password_hash($password1,PASSWORD_DEFAULT);
        $stmt  = "INSERT INTO masteruser (email,username,password,first_name,last_name,user_type,activation_hash) VALUES (?,?,?,?,?,?,?)";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($email,$userName, $password1,  $firstName, $surName,$this->getType(),$hash));

        // after inserting the user in the master user table ,check if the type of the user which is either {enduser or craftsmen}
        // if it was a craftmen add his related info to the craftsmen table
        $id = $this->getDbConnection()->lastInsertId();
        if($this->getType() == 1){

            $stmt = "INSERT INTO craftsmen (craftsmen_id,craft,city) VALUES(?,?,?)";
            $query = $this->getDbConnection()->prepare($stmt);
            $query->execute(array($id,$craft,$city));



        }



        Helper::sendEmail("yazan_9526@hotmail.com","<a href=\"http://localhost/craft/includes/dbHandler/verifyAccount.php?hash=$hash\">
               Verify Account</a>","Verify your account");


    }*/

    public function sendVerificationAccount($email,$id){





    }
    
    public function update($arrayData){
       // print_r($arrayData);
        extract($arrayData);
        
       // $password1 = password_hash($password1, PASSWORD_DEFAULT);
        $stmt = "UPDATE masteruser SET first_name=?, last_name=?, email=?, username=? WHERE user_id=?";
        $query = $this->getDbConnection()->prepare($stmt);

        $query -> execute(array($firstName,$surName,$email,$userName,$_SESSION['user_id']));
        
       
        $stmt2 = "UPDATE craftsmen SET bio=?, craft=?, city=? WHERE craftsmen_id = ?";
        $query2 = $this->getDbConnection()->prepare($stmt2);

        if($query2->execute(array($bio,$craft,$city,$_SESSION['user_id']))){
            return true;
        }else
            return false;
        
        
        
    }
    
    public function updatePass($user_id,$password){
        //print_r($arrayData);
       
        

            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = "UPDATE masteruser SET password=? WHERE user_id=?";
            $query = $this->getDbConnection()->prepare($stmt);

       

        $query -> execute(array($password,$user_id));
        if($query){
			$this->deleteLoginAttempts($user_id);
			 return true;
		}
           
        else 
			return false;


            $query -> execute(array($password,$_SESSION['user_id']));
            if($query)
                return true;
            else return false;
        
       
    }

    public function setType($type){
        $this->type = $type;

    }

    public function deleteLoginAttempts($userId){
        $stmt  = "DELETE FROM login_attempts WHERE user_id = ?";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($userId));
    }

    public function deleteResetToken($userId){

        $stmt  = "DELETE FROM reset_token WHERE user_id  = ?";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($userId));
    }

    public function resetPassword($password,$id){

        $password = password_hash($password,PASSWORD_DEFAULT);
        $stmt = "UPDATE MASTERUSER set password = ? WHERE user_id = ?";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($password,$id));

        if($query)
            return true;
        else
            return false;
    }

    public function sendPasswordRecoveryLink($email,$userId){

        $token = Helper::generateCaptcha();
        $token = md5($token);
        $db = new Dbc();
        $db = $db->getConn();
        $stmt = "INSERT INTO reset_token (token,token_time,user_id) VALUES(?,CURRENT_TIME,?)";
        $query = $db->prepare($stmt);
        $query->execute(array($token,$userId));

        Helper::sendEmail($email,"<a href=\"http://localhost/craftsmen/resetPassword.php?token=$token\" class='btn btn-danger'>
             Reset Password</a>","Verify your account");

    }

    public function login($loginId ,$password){

        //check if user exist
        $stmt = "SELECT user_id,email,password,user_type,username FROM masteruser WHERE (username = ? OR email = ?) LIMIT 1";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($loginId,$loginId));

        if($query->rowCount() > 0){ //user exist
            $fetchedData = $query->fetch(PDO::FETCH_ASSOC);
            $this->setUserId($fetchedData['user_id']);

            // if user found check if the account is locked due too many failed login attempts
            if(Helper::checkBruteForce($this->id,5,2,$this->dbObj)){// too many attempts

                // lock the account

                $this->lockAccount();
                $this->sendPasswordRecoveryLink($fetchedData['email'],$fetchedData['user_id']);
                $this->setErrorMsg('login',"Your Account has been locked please check your email to reset your password");

                return false;

            }else{// account is not locked, check if the password provided by the user and the password from database matches
                if(password_verify($password,$fetchedData['password'])){
                    $this->setType($fetchedData['user_type']);
                    $_SESSION['user_id'] = $this->getUserId();
                    $_SESSION['userType'] = $this->getType();

                    return true;
                }else{// password is not matchecd MACTHED

                    $this->setErrorMsg('login',"your username or password is not correct");


                    $stmt = "INSERT INTO login_attempts(user_id,login_time) VALUES (?,CURRENT_TIME)";
                    $query = $this->getDbConnection()->prepare($stmt);
                    $query->execute(array($this->getUserId()));



                    return false;

                }
            }



        }else{// user is not exist
            $this->setErrorMsg('login',"we could not find your account");
            return false;

        }




    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserErrorMsg($userErrorMsg){
        $this->userErrorMsg = $userErrorMsg;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function setSurName($surName){
        $this->surName = $surName;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }



    public function logout(){

        session_destroy();
        header("location:index.php");


    }

    public function getId(){
        return $this->id;
    }



}