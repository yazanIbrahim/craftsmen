<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/29/2018
 * Time: 7:03 PM
 */

include "../classes/Dbc.php";
include "../classes/Helper.php";

if(isset($_GET['hash'])){
    $hash = filter_input(INPUT_GET,'hash',FILTER_SANITIZE_STRING);


    $db = new Dbc();
    $db = $db->getConn();


    //check if there is hash matches with the one in the url
    $stmt  = "SELECT user_id,activation_hash FROM masteruser WHERE activation_hash = ? LIMIT 1";
    $query = $db->prepare($stmt);
    $query->execute(array($hash));

    $res = $query->fetch(PDO::FETCH_ASSOC);
    //if hash exist
    if($query->rowCount(sizeof($res)) > 0){
        //if hasehs from database and from get is equal
        if(strcmp($hash,$res['activation_hash']) == 0){

            //update activation status field to 1
            $stmt = "UPDATE masteruser SET activation_status = ? WHERE user_id = ?";
            $query = $db->prepare($stmt);
            $query->execute(array(1,$res['user_id']));

            Helper::redirect("../../index.php",5,"you will be redirected to the homepage in 5 seconds");

            //header("location:../../index.php?message=hi;refresh:5");
        }

    }


}