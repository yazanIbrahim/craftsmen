<?php
require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";




include "../classes/Helper.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';



$data = json_decode(file_get_contents("php://input"));
$data = (array)$data;
//print_r($data);
//echo "xss attack" . $data['firstName'];




$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['type'])) {// type of  user signing up

        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

        if($type == "craftsmen")
            $type = 1;
        elseif($type == 'user')
            $type = 0;
        else{
            echo "type is uknown you cant register";
            exit(0);
        }




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
                'unique' => 'masteruser', // name of the table to check in

            ),
            'userName' => array(
                'name' => 'userNameError',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'masteruser'
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
            )
        ));

        //check if data is valid; if yes proceed to sanitizing else display errors to the user
        if (!$validator->isPassed())
            echo json_encode($validator->getErrors());
        else {
            //sanitize input and insert to database

            $sanitizer = new Sanitizer($data);
            $dbData = $sanitizer->sanitize(array(
                'firstName' => 'string',
                'surName' => 'string',
                'email' => 'email',
                'userName' => 'string',
                'password1' => 'string',
                'password2' => 'string',
            ));

            $db = new Dbc();
            $db = $db->getConn();
            $user = new User($db);
            $user->setType($type);
            $user->signup($dbData);

            echo json_encode("تم التسجيل بنجاح الرجا التحقق من بريدك الالكتروني لتفعيل حسابك");







        }


    }

}
ELSE{
    ECHO "NOT ALLOWED";
}

?>
