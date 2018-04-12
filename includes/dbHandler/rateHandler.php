<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 4/6/2018
 * Time: 2:57 AM
 */

require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";
include "../classes/Helper.php";
include "../classes/EndUser.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new Dbc();
    $db = $db->getConn();

    $rateValue  = filter_input(INPUT_POST,'rate',FILTER_SANITIZE_STRING);
    $username   =  filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $response = array();

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
    $query->execute(array($username,$craftsmenId,$rateValue));

    $rateId = $db->lastInsertId();

    if($query){






            $response['response'] ="your rating has been submitted";
            echo json_encode($response);


    }


    //$stmt = "UPDATE craftsmen set rate = ? where craftsmen_id =(SELECT user_id from masteruser where username = ?) ";
    //$query = $db->prepare($stmt);
    //$query->execute(array($rateValue,$username));


}
