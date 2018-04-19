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
            }
        }
        
      /*  $getHtml = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $getUrl = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
        
            $db = new Dbc();
            $db = $db->getConn();


            
            
            $stmt = "SELECT first_name,last_name,email,username,craft,city,bio 
                 FROM masteruser FULl JOIN craftsmen ON user_id=craftsmen_id WHERE user_id=?";
            
            $query = $db->prepare($stmt);
            $query -> execute(array($_SESSION['user_id']));
            

           $result = $query->fetch(PDO::FETCH_ASSOC);
           
           echo json_encode($result);
        */
    }
    else{
        echo "NOT ALLOWED";
    }


?>
