<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 4/1/2018
 * Time: 2:38 AM
 */

require "../classes/Dbc.php";
require "../classes/User.php";

require "../classes/Helper.php";
require "../classes/Validator.php";

require "../classes/Sanitizer.php";

$data = json_decode(file_get_contents("php://input"),true);

if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $db = new Dbc();
    $db = $db->getConn();
    $user = new User($db);
    $stmt = "SELECT user_id FROM reset_token WHERE token = ?";
    $query = $db->prepare($stmt);
    $query->execute(array($data['token']));



    if($query->rowCount() > 0){//if such a token is exist

        $res = $query->fetch(PDO::FETCH_ASSOC);
        $userId = $res['user_id'];
        if($user->resetPassword($data['first'],$userId)){
            $userAlert['success'] = "your password has changed successfully";
            // after successful password change delete all login attempts to this user
            $user->deleteLoginAttempts($userId);
            $user->deleteResetToken($userId);
            echo json_encode($userAlert);
        }else{
            $userAlert['error'] = "something went wrong";
            echo json_encode($userAlert);
        }





    }else{

        Helper::redirect("index.php",2);
    }


}