<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/5/2018
 * Time: 5:28 PM
 */



class craftsmen extends User{

    Private $craft;
    private $city;
    private $rate;
    private $bio;
    private $mobile;
    private $comments;


    public function __construct($dbConnectionObject){
        parent::__construct($dbConnectionObject);
        $this->mobile = array();
        $this->comments = array();

    }
    
    

    public function setCraft($craft)
    {
        $this->craft = $craft;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getCraft()
    {
        return $this->craft;
    }

    public function getCity()
    {
        return $this->city;
    }


    public function getRate()
    {
        return $this->rate;
    }


    public function getBio()
    {
        return $this->bio;
    }

    public function getMobile()
    {
        return $this->mobile;
    }


    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }


    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

     public function getComments()
    {
       return $this->comments;
    }


    public function calRate($craftsmenId){

        $stmt = "SELECT COUNT(rate_id) as numofrates ,SUM(rate) as rate FROM rate WHERE craftsmen_id = ?";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($craftsmenId));

        $res = $query->fetch(PDO::FETCH_ASSOC);

        $rate = round($res['rate']/(float)$res['numofrates'],1);


        return $rate;

    }
    
     public function getCraftsmenComments($craftsmenId,$offset=0)
    {

       $stmt = "select comment,comment_date,first_name,last_name,username 
                from craftsmen_comments left join masteruser on enduser_id = user_id where craftsmen_id =? limit 3 offset $offset";
       $query = $this->getDbConnection()->prepare($stmt);
       $query->execute(array($craftsmenId));
       $result = $query->fetchAll(PDO::FETCH_ASSOC);


       return $result;
    }
    
     public function setComments($comments)
    {
       $this->comments = $comments;
    }
    
    public function retrieveData($craftsmenId){


        $stmt = "SELECT first_name,last_name,email,username,craft,city,bio,mobile FROM masteruser left JOIN craftsmen ON user_id=craftsmen_id 
left join craftsmen_mobile on craftsmen.craftsmen_id = craftsmen_mobile.craftsmen_id WHERE craftsmen_mobile.craftsmen_id=? ";

        $query = parent::getDbConnection()->prepare($stmt);



        $query->execute(array($craftsmenId));
        $result = $query->fetch(PDO::FETCH_ASSOC );


        extract($result);

       parent::setFirstName($first_name);
       parent::setSurName($last_name);
       parent::setUserName($username);
       $this->setBio($bio);
       $this->setCity($city);
       $this->setCraft($craft);
       $this->setRate(0);
       $this->setMobile($mobile);
       $this->setComments($comments = $this->getCraftsmenComments($craftsmenId,0));
       
       
       
    }

    public function getCraftsmenInfo(){

        $info = array();
        $info ['firstName'] = $this->getFirstName();
        $info ['lastName'] = $this->getSurName();
        $info ['username'] = $this->getUserName();
        $info ['bio'] = $this->getBio();
        $info ['city'] = $this->getCity();
        $info ['craft'] = $this->getCraft();
        $info ['mobile'] = $this->getMobile();
        return $info;
    }


    public function signup($formData){

        extract($formData);

        $hash = md5((rand(0,100000)));// a hash for account activation
        $password1 = password_hash($password1,PASSWORD_DEFAULT);
        $stmt  = "INSERT INTO masteruser (email,username,password,first_name,last_name,user_type,activation_hash) VALUES (?,?,?,?,?,?,?)";
        $query = $this->getDbConnection()->prepare($stmt);
        $query->execute(array($email,$userName, $password1,  $firstName, $surName,1,$hash));

        // after inserting the user in the master user table ,check if the type of the user which is either {enduser or craftsmen}
        // if it was a craftmen add his related info to the craftsmen table

        if($query){
            // add data to craftsmen table
            $id = $this->getDbConnection()->lastInsertId();
            $stmt = "INSERT INTO craftsmen (craftsmen_id,craft,city) VALUES(?,?,?)";
            $query = $this->getDbConnection()->prepare($stmt);
            $query->execute(array($id,$craft,$city));

            if($query){
                //add data to craftsmen mobile table
                $stmt  = "INSERT INTO craftsmen_mobile (craftsmen_id,mobile) VALUES (?,?)";
                $query = $this->getDbConnection()->prepare($stmt);
                $query->execute(array($id,$mobile));

                if($query){
                    Helper::sendEmail("yazan_9526@hotmail.com","<a href=\"http://localhost/craft/includes/dbHandler/verifyAccount.php?hash=$hash\">
               Verify Account</a>","Verify your account");
                    return true;
                }

                else
                    return false;
            }else
                return false;
        }else
            return false;









        /*Helper::sendEmail("yazan_9526@hotmail.com","<a href=\"http://localhost/craft/includes/dbHandler/verifyAccount.php?hash=$hash\">
               Verify Account</a>","Verify your account");*/


    }



}