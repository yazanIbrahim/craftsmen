<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require '../../phpmailer/Exception.php';


require_once "../classes/Dbc.php";

require_once "../classes/User.php";

require_once "../classes/Helper.php";
require_once "../classes/Validator.php";
require_once "../classes/Sanitizer.php";



//Load Composer's autoloader

$data = json_decode(file_get_contents("php://input"),true);




if($_SERVER['REQUEST_METHOD'] == 'POST'){








    $validator = new Validator();
    $validator->check($data,array(
        "recoveryEmail" => array(
            "name"     => 'email',
            "required" => true,
            "email"    => true
        )
    ));
    if(!$validator->isPassed()){

        echo json_encode($validator->getErrors());
    }else{

        //santize

        $sanitizer = new Sanitizer($data);
        $sanitizedData = $sanitizer->sanitize(array(
            'recoveryEmail' => 'email'
        ));
        $db = new Dbc();
        $db = $db->getConn();

        $stmt  = "SELECT user_id,username FROM masteruser WHERE email = ? LIMIT 1";
        $query = $db->prepare($stmt);
        $query->execute(array($sanitizedData['recoveryEmail']));

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount($res) > 0){
            $user = new User();
            $user->sendPasswordRecoveryLink($sanitizedData['recoveryEmail'],$res['user_id']);
            
        }
        else{
            //display error
        }

    }



}