<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';

require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";
require_once "../classes/Sanitizer.php";
require_once "../classes/Validator.php";
require_once "../classes/User.php";

$data = json_decode(file_get_contents("php://input"),true);
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $validator = new Validator();
    $validator->check($data,array(

        'credential' => array(
            'name' => "credentialError",
            'required' => true,
        ),

        'password' => array(
            'name' => 'passwordError',
            'required' =>true
        )
    ));
    $payload = array();


    if($validator->isPassed()){
        //sanitize input
        $sanitizer = new Sanitizer($data);
        $data = $sanitizer->sanitize(array(
            'credential' => 'string',
            'password'   => 'string'
        ));

        $db = new Dbc();
        $db = $db->getConn();
        $user = new User($db);

        if($user->login($data['credential'],$data['password'])){

            if($user->getType() == 1){
              //then its a craftsmen
                $payload['type'] = "craftsmenRedirect";
                echo json_encode($payload);
            }elseif($user->getType() == 0){
                $payload['type'] = "userRedirect";
                echo json_encode($payload);
            }

        }else{
            //IF THERE IS A LOGIN ERROR{USERNAME OR PASSWORD WRONG ETC..}
            $payload['type'] = "loginError";
            $payload['errors'] = $user->getErrors();
            echo json_encode($payload);
        }



    }else{
        // IF THERE IS A VALIDATION ERROR
        $payload['type'] = "validationError";
        $payload['errors'] = $validator->getErrors();
        echo json_encode($payload);
    }

}else{

    echo "access denied ";
}