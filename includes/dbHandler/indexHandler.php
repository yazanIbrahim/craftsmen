<?php


require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";


if(isset($_GET['action'])){

    $action = filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);
    $db = new DBC();
    $db = $db->getConn();

    switch($action){

        case 'topCraftsmen' :{
            $stmt = "SELECT first_name,last_name,SUM(rate) as rate,count(rate_id) as numofrates,username,city,craft,mobile FROM masteruser 
inner JOIN craftsmen on craftsmen_id = user_id 
inner join craftsmen_mobile on craftsmen.craftsmen_id = craftsmen_mobile.craftsmen_id
inner join rate on craftsmen.craftsmen_id=rate.craftsmen_id GROUP BY rate order by rate DESC limit 8  
                    ";

            $query = $db->prepare($stmt);
            $query->execute();
            $response['topCraftsmen'] = $query->fetchAll(PDO::FETCH_ASSOC);

            $i = 0;
            foreach($response['topCraftsmen'] as $craftsmen=>$attributes){
                    $rate = $attributes['rate'];

                    $numOfRating = $attributes['numofrates'];// how man rates for this craftsmen
                   // $attributes['rate']= ceil((($rate/(float)$numOfRating)*5)/100);
                    $response['topCraftsmen'][$i]['rate'] = ceil((($rate/(float)$numOfRating)*5)/5);
                    $i++;

            }






            echo json_encode($response);
        }
        break;
        case 'getCraftsmenProfiles':{

            if(isset($_GET['offset'])){
                $offset = filter_input(INPUT_GET,'offset',FILTER_SANITIZE_STRING);
                $craft = filter_input(INPUT_GET,'craft',FILTER_SANITIZE_STRING);


                $stmt = "SELECT * from masteruser left join craftsmen on user_id = craftsmen_id WHERE craft = ? LIMIT 2 offset $offset ";
                $query = $db->prepare($stmt);
                $query->execute(array($craft));

                $craftsmenInfo = array();
                $craftsmenInfo['craftsmen'] = $query->fetchAll(PDO::FETCH_ASSOC);
                $craftsmenInfo['num'] = sizeof($craftsmenInfo);// variable holding how many records exist to use for display number of pages
                echo json_encode($craftsmenInfo);
            }
        }
        break;
        case 'topcrafts':{


            // select the top 6 crfats exists in the data base to display them as thumbnails
            $stmt = "SELECT craft FROM craftsmen GROUP BY craft ORDER BY COUNT(craftsmen_id) DESC LIMIT 6";
            $query = $db->prepare($stmt);
            $query->execute();
            $topCrafts = array();
            while($res = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($topCrafts,$res['craft']);
            }


            echo json_encode($topCrafts);
        }
        break;
        case 'pageNumbers': {

            $res = array();
            $stmt = "SELECT count(craftsmen_id) as num FROM craftsmen";
            $query = $db->prepare($stmt);
            $query->execute();
            $res['num'] = $query->fetch()['num'];

            $stmt = "SELECT * FROM craftsmen JOIN masteruser ON craftsmen_id = user_id LIMIT 1 ";
            $query = $db->prepare($stmt);
            $query->execute(array());

            $res['craftsmen'] = $query->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($res);
        }
    }
}