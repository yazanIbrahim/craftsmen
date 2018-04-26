<?php
session_start();
require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";
include "../classes/craftsmen.php";

$data = json_decode(file_get_contents("php://input"));
$data = (array)$data;
print_r($data);
//echo "xss attack" . $data['firstName'];




$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            ),
            'passwordo' => array(
                'name' => 'passwordoError',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'password' => true,
                'checkOldPassword' => array($_SESSION['user_id'],$data['passwordo'])
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
            $craftmen = new craftsmen($db);
            //$craftmen->setType($type);
            $craftmen->update($dbData);





        }


    }


ELSE{
    ECHO "NOT ALLOWED";
}

?>
