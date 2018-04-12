
<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 2/22/2018
 * Time: 2:20 PM
 */

class Validator{

    private $error;
    private $pass;

    public function __construct(){
        $this->error = array();
        $this->pass  = FALSE;
    }

    public function check($formData , $fields){

        //print_r($formData);
        foreach($fields as $fieldName => $rules){

          $errorMsgFieldName = $fields[$fieldName]["name"]; //name of the field which will be used to display the error in the client side
            if(isset($formData[$fieldName]))
                $value = $formData[$fieldName];
            else
                $value ="";


            foreach($rules as $rule => $ruleValue){


                    if ($rule === 'required' && $ruleValue == true && empty($value)) {

                        $this->addError($errorMsgFieldName, "this field is required");
                    } elseif (!empty($value)) {
                        switch ($rule) {
                            case 'min':
                                {
                                    if (strlen($value) < $ruleValue)
                                        $this->addError($errorMsgFieldName, "{$fieldName} must be greater than {$ruleValue}");
                                }
                                break;
                            case 'max'     :
                                {
                                }
                                break;
                            case 'unique'  :

                                {

                                    $db = new Dbc();
                                    $db = $db->getConn();
                                    $dbColName = strtolower($fieldName);//actual column name in the database

                                    $stmt = "SELECT {$fieldName} FROM {$ruleValue} WHERE {$dbColName} = ?";
                                    $query = $db->prepare($stmt);
                                    $query->execute(array($formData[$fieldName]));
                                    if ($query->rowCount() > 0)
                                        $this->addError($errorMsgFieldName, "{$fieldName} exist pick another one");

                                }
                                break;
                            case 'username':
                                {
                                }
                                break;
                            case 'email'   :
                                {
                                    if ($ruleValue == true) {
                                        if (!Validator::validateEmail($value))
                                            $this->addError($errorMsgFieldName, "Email is not valid ");
                                    }
                                }
                                break;
                            case 'password':
                                {
                                    if ($ruleValue == true) {
                                        if (!Validator::validatePassword($value))
                                            $this->addError($errorMsgFieldName, "password is not valid ");
                                    }
                                }
                                break;
                            case 'match':{
                                if(!self::match($value,$formData[$ruleValue]))
                                    $this->addError($errorMsgFieldName,"password not matched");
                            }
                            break;
                            case 'captcha':{
                                if(strlen($value) != $ruleValue)
                                    $this->addError($errorMsgFieldName,"error in captcha");
                            }
                            break;
                            case 'mobile':{
                                    if(!self::validateMobile($value))
                                        $this->addError($errorMsgFieldName,"mobile is not in correct");
                            }
                            break;
                        }
                    }
                }
        }

        if(empty($this->error))
            $this->pass = true;




    }

    public function isPassed(){
        return $this->pass;
    }

    public function addError($field , $errorMsg){
        $this->error [$field] = $errorMsg;
    }

    public function getErrors(){
        return $this->error;
    }


    public static function validateLength($str,$length,$type){
        if(strtolower($type) =='min')
        {
            if(strlen($str) < $length){

             Validator::addErrors($str,"not valid");
                return false;
            }

            else
                return true;
        }
        if(strtolower($type) == 'max')
        {
            if($str > $length)
                return false;
            else
                return true;
        }
    }
    
    public static function validateEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            return true;
            
        }
        else 
        {


            return false;
        }

    }
    
    public static function validatePassword($password){
        if(preg_match("/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",$password))
        {


            return true;

        }
        else
            {

            return false;
        }
    }
    

    public static function validateUsername($username){
      if(preg_match("/^[a-zA-Z]{5,16}[-_]{0,1}([a-zA-Z0-9]{0,8})$/",$username))
        {

            return true;
        }
        else
        {

            return false;
        }
    }

    public static function match($str1,$str2){

        if(strcmp($str1,$str2) == 0)
            return true;
        else
            return false;
    }

    public static function validateMobile($mobileNumber){

        if(preg_match('/^[0-9]{10}$/',$mobileNumber))
            return true;
        else
            return false;

    }
    
    





}
?>
