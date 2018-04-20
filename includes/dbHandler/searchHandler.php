<?php
require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
$response = array();
    if(isset($_GET['search']) && !empty(isset($_GET['search']))){
        $searchValue = filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING);


            $db = new Dbc();
            $db = $db->getConn();
            $response = array();
            $stmt = "SELECT first_name,last_name,craft,username,city FROM masteruser JOIN craftsmen 
              ON masteruser.user_id = craftsmen.craftsmen_id where craft like '%$searchValue%' OR first_name LIKE '%$searchValue%' ";

            $query = $db->prepare($stmt);
            $query->execute();

            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($response);








    }


}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){





}