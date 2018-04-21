<?php
require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){

if(isset($_GET['sq'])){
    $sq = filter_input(INPUT_GET,'sq',FILTER_SANITIZE_STRING);
   // echo $sq;
    $response = array();
    $db = new Dbc();
    $db = $db->getConn();

        $stmt = "SELECT first_name,last_name,craft,username,city FROM masteruser JOIN craftsmen 
                  ON masteruser.user_id = craftsmen.craftsmen_id where craft like '%$sq%' OR first_name LIKE '%$sq%' ";

    $query = $db->prepare($stmt);
    $query->execute();

    if($query->rowCount() > 0){

        //if there results

        $response['res'] =  $query->fetchAll(PDO::FETCH_ASSOC);
        $response['numofpages'] = $query->rowCount();
        echo json_encode($response);
    }else{
        // no results found
        $response['res'] = "no results found";
        echo json_encode($response);
    }
}











}