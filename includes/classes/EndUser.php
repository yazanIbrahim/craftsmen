<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/31/2018
 * Time: 3:37 PM
 */

class EndUser extends User {





    public function __construct($dbConnectionObject){
        parent::__construct($dbConnectionObject);


    }
    
    public function postComment($craftsmenId,$commentText,$userId){
        
        $stmt  = "INSERT INTO craftsmen_comments(craftsmen_id,comment,enduser_id,comment_date) VALUES(?,?,?,CURRENT_TIME)";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($craftsmenId,$commentText,$userId));
        
        if($query){
            return true;
        }else
            return false;
       
    }

    public function signup($formData){

        extract($formData);

        $hash = md5((rand(0,100000)));// a hash for account activation
        $password1 = password_hash($password1,PASSWORD_DEFAULT);
        $stmt  = "INSERT INTO masteruser (email,username,password,first_name,last_name,user_type,activation_hash) VALUES (?,?,?,?,?,?,?)";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($email,$userName, $password1,  $firstName, $surName,0,$hash));

        // after inserting the user in the master user table ,check if the type of the user which is either {enduser or craftsmen}
        // if it was a craftmen add his related info to the craftsmen table

        if($query){
            $id = $this->getDbConnection()->lastInsertId();
            $stmt = "INSERT INTO end_user (enduser_id) VALUES(?)";
            $query = $this->getDbConnection()->prepare($stmt);
            $query->execute(array($id));

            //send activation email
            Helper::sendEmail("yazan_9526@hotmail.com","<a href=\"http://localhost/craft/includes/dbHandler/verifyAccount.php?hash=$hash\">
               Verify Account</a>","Verify your account");
            return true;
        }else{
            return false;
        }










    }



}