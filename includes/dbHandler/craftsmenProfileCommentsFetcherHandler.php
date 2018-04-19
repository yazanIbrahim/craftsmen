<?php

session_start();
require_once "../classes/Dbc.php";
require_once  "../classes/User.php";
require_once "../classes/craftsmen.php";




if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action'])){

        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $db = new Dbc();
        $db = $db->getConn();
        switch ($action){
            case "getcomments":{
                $offset = filter_input(INPUT_GET, 'offset', FILTER_SANITIZE_SPECIAL_CHARS);
                $craftsmen = new craftsmen($db);
                $response = $craftsmen->getCraftsmenComments($_SESSION['user_id'],$offset);

                echo json_encode($response);

            }break;
        }
    }

}
else{
    echo "NOT ALLOWED";
}


?>
