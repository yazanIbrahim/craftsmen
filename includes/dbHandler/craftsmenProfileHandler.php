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
                case "getRate":{


                    //calculate rate
                    $craftsmen =  new craftsmen($db);


                    $response['rate'] =  $craftsmen->calRate($_SESSION['user_id']);


                    echo json_encode($response);
                }break;

                case "chartData":{

                    $stmt = "SELECT date(rate_date) as date,rate as value from rate where craftsmen_id = ?";
                    $query = $db->prepare($stmt);
                    $query->execute(array($_SESSION['user_id']));

                    $response = $query->fetchAll(PDO::FETCH_ASSOC);
                    echo json_encode($response);
                }break;
                case "craftsmenPlaceHolder":{
                    $getHtml = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
                    $getUrl = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);

                    $db = new Dbc();
                    $db = $db->getConn();




                    $stmt = "SELECT first_name as firstName,last_name as surName,bio,email,username as userName,city,craft,mobile FROM masteruser inner JOIN craftsmen on
 craftsmen_id = user_id 
inner join craftsmen_mobile on craftsmen.craftsmen_id = craftsmen_mobile.craftsmen_id where user_id =? ";

                    $query = $db->prepare($stmt);
                    $query -> execute(array($_SESSION['user_id']));


                    $result = $query->fetch(PDO::FETCH_ASSOC);

                    echo json_encode($result);
                }break;
            }
        }
        


    }
    else{
        echo "NOT ALLOWED";
    }


?>
