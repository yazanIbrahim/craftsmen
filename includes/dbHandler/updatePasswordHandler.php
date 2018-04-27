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

            ),

        ));

        //check if data is valid; if yes proceed to sanitizing else display errors to the user
        if (!$validator->isPassed())
            echo json_encode($validator->getErrors());
        else {
            //sanitize input and insert to database

            $sanitizer = new Sanitizer($data);
            $dbData = $sanitizer->sanitize(array(
                'passwordo' => 'string',
                'password1' => 'string',
                
            ));

          $response =array();
            $db = new Dbc();
            $db = $db->getConn();
            $craftmen = new craftsmen($db);
            //$craftmen->setType($type);
            if($craftmen->updatePass($dbData['password1']))
            {   
                  $response['res'] = "تم تغيير كلمة السر بنجاح";
                  echo json_encode($response);
            }else{
                $response['res'] = "حدث خطأ دبر راسك";
                echo json_encode($response);
            }
              





        }


    }


ELSE{
    ECHO "NOT ALLOWED";
}

?>
