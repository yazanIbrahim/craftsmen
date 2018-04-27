<?php
session_start();
require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";
include "../classes/craftsmen.php";

$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$data = (array)$data;

//echo "xss attack" . $data['firstName'];




$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //validate form data
        $validator = new Validator();
        $validator->check($data, array(
            'firstName' => array(
                'name' => 'firstNameError',//name of the angular model which will be used to display error msgs
                'required' => false,
                'min' => 2,
                'max' => 20
            ),
            'lastName' => array(
                'name' => 'surNameError',
                'required' => false,
                'min' => 2,
                'max' => 20
            ),
            'email' => array(
                'name' => 'emailError',
                'required' => false,
                'email' => true,
                'unique' => array('masteruser',$_SESSION['user_id']), // name of the table to check in

            ),
            'surName' => array(
                'name' => 'surNameError',
                'required' => false,
                'min' => 2,
                'max' => 20,

            ),
            'userName'=>array(
                'name' => 'userNameError',
                'required' => false,
                'min' => 5,
                'max' => 10,
            ),
            'mobile'=>array(
                'name' => 'mobileError',
                'required' => false,
                'min' => 9  ,
                'max' => 10,

            ),
            'bio'=>array(
                'name' => 'bioError',
                'required' => false,
                'min' => 2,
                'max' => 55,
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
                'bio' => 'string'

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
