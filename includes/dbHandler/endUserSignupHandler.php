<?php
require_once "../classes/Dbc.php";
require "../classes/Validator.php";
require "../classes/Sanitizer.php";
require "../classes/User.php";
require "../classes/EndUser.php";
require "../classes/Helper.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';



$data = json_decode(file_get_contents("php://input"),true);

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $clientMsg = null;
    //validate form data
    $validator = new Validator();
    $validator->check($data, array(
        'firstName' => array(
            'name' => 'firstNameError',//name of the angular model which will be used to display error msgs
            'required' => true,
            'min' => 2,
            'max' => 20
        ),
        'surName' => array(
            'name' => 'surNameError',
            'required' => true,
            'min' => 2,
            'max' => 20
        ),
        'email' => array(
            'name' => 'emailError',
            'required' => true,
            'email' => true,
            'unique' => array('masteruser',null) // name of the table to check in

        ),
        'userName' => array(
            'name' => 'userNameError',
            'required' => true,
            'min' => 2,
            'max' => 20,
            'unique' => array('masteruser',null)
        ),
        'password1' => array(
            'name' => 'password1Error',
            'required' => true,
            'min' => 2,
            'max' => 20,
            'password' => true,

        ),
        'password2' => array(
            'name' => 'password2Error',
            'required' => true,
            'min' => 2,
            'max' => 20,
            'password' => true,
            'match'    => 'password1'
        ),

    ));

    //check if data is valid; if yes proceed to sanitizing else display errors to the user
    if (!$validator->isPassed()){
        $clientMsg = $validator->getErrors();
        $clientMsg ['type'] = "validationError";
        echo json_encode($clientMsg);
    }

    else {
        //sanitize input and insert to database

        $sanitizer = new Sanitizer($data);
        $dbData = $sanitizer->sanitize(array(
            'firstName' => 'string',
            'surName'   => 'string',
            'email'     => 'email',
            'userName'  => 'string',
            'password1' => 'string',
            'password2' => 'string',

        ));

        $db = new Dbc();
        $db = $db->getConn();

        $endUser =  new EndUser($db);
        if($endUser->signup($dbData)){
            $clientMsg ['type']       = "success";
            $clientMsg ['successMsg'] = "تم التسجيل بنجاح الرجاء التحقق من البريد الالكتروني لتفعيل حسابك";

            echo json_encode($clientMsg);
        }else{
            Helper::redirect('../../index.php',5,"somth went wrong");
        }
















    }




}

?>
