<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 4/6/2018
 * Time: 2:57 AM
 */
session_start();
require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";
include "../classes/Helper.php";
include "../classes/EndUser.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = array();

    if(isset($_SESSION['userType']) && $_SESSION['userType'] == 0){ // end user and logged in

        $db = new Dbc();
        $db = $db->getConn();

        $rateValue  = filter_input(INPUT_POST,'rate',FILTER_SANITIZE_STRING);
        $username   =  filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);


        //get the id of the craftsmen being rated
        $stmt = "SELECT user_id FROM masteruser WHERE username = ?";
        $query = $db->prepare($stmt);
        $query->execute(array($username));
        $craftsmenId = $query->fetch(PDO::FETCH_ASSOC)['user_id'];

        //check time frame in which user has rated this craftsmen
        /* $stmt = "SELECT rate_date FROM rate where user_id = ? AND craftsmen_id = ?";
         $query = $db->prepare($stmt);
         $query->execute(array($_SESSION['user_id'],$craftsmenId));
         $rateDate = $query->fethc()*/

        $stmt = "INSERT INTO rate(craftsmen_id,user_id,rate,rate_date) VALUES((SELECT user_id from masteruser where username = ?),?,?,CURRENT_TIME )";
        $query = $db->prepare($stmt);
        $query->execute(array($username,$_SESSION['user_id'],$rateValue));

        $rateId = $db->lastInsertId();

        if($query){






            $response['msg'] ="تم التقييم";
            echo json_encode($response);


        }
    }else{
       $response['msg'] = "عليك تسجي الدخول اولا";
       echo json_encode($response);
    }






}
