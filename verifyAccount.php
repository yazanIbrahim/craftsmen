<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/29/2018
 * Time: 7:03 PM
 */

include "includes/classes/Dbc.php";
if(isset($_GET['hash'])){
    $hash = filter_input(INPUT_GET,'hash',FILTER_SANITIZE_STRING);
    echo $hash;

    $db = new Dbc();
    $db = $db->getConn();

    $stmt  = "SELECT user_id,activation_hash FROM masteruser WHERE activation_hash = ? LIMIT 1";
    $query = $db->prepare($stmt);
    $query->execute(array($hash));

    $res = $query->fetch(PDO::FETCH_ASSOC);
    //if hash exist
    if($query->rowCount(sizeof($res)) > 0){
        //if hasehs from database and from get is equal
        if(strcmp($hash,$res['activation_hash']) == 0){
            echo "equal";
            //update activation status field to 1
            $stmt = "UPDATE masteruser SET activation_status = ? WHERE user_id = ?";
            $query = $db->prepare($stmt);
            $query->execute(array(1,$res['user_id']));

            header("location:index.php");
        }

    }


}