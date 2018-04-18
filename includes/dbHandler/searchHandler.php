<?php
require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";

if(isset($_GET['search'])){

    if(isset($_GET['search']) && !empty(isset($_GET['search']))){
        $searchValue = filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING);

        $db = new Dbc();
        $db = $db->getConn();
        $response = array();
       // echo $searchValue;

        $stmt = "SELECT craft FROM craftsmen WHERE craft LIKE '%$searchValue%'";
        $query =$db->prepare($stmt);
        $query->execute();
        if($query->rowCount() > 0){
            //its a craft
            $response['type'] = "craft";
            $stmt = "SELECT craft,first_name,last_name FROM craftsmen 
                     LEFT JOIN masteruser on craftsmen_id = user_id WHERE craft LIKE '%$searchValue%' ";


            $query = $db->prepare($stmt);
            $query->execute();

            //$craftsmen = new craftsmen($db);
            $response['result'] = $query->fetchAll(PDO::FETCH_ASSOC);



            echo json_encode($response);
        }



    }


}