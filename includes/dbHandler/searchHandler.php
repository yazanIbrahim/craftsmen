<?php
require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";

if(isset($_GET['search'])){

    $searchValue = filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING);
    if(isset($searchValue) && !empty($searchValue)){
        $db = new Dbc();
        $db = $db->getConn();

        $stmt  = "SELECT craft,first_name,last_name FROM craftsmen JOIN masteruser on craftsmen_id = user_id WHERE craft LIKE '%$searchValue%' OR first_name LIKE '%$searchValue%'";
        $query = $db->prepare($stmt);
        $query->execute();

        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }


}