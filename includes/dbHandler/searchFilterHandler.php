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

            $stmt = "SELECT image_path,first_name,last_name,SUM(rate) as rate,count(rate_id) as numofrates,
username,city,craft,mobile FROM masteruser inner JOIN craftsmen on craftsmen_id = user_id inner join
 craftsmen_mobile on craftsmen.craftsmen_id = craftsmen_mobile.craftsmen_id left join rate
  on craftsmen.craftsmen_id=rate.craftsmen_id where craft like '%$sq%' OR first_name LIKE '%$sq%' GROUP BY 
  craftsmen.craftsmen_id order by rate DESC";

    $query = $db->prepare($stmt);
    $query->execute();

    if($query->rowCount() > 0){

        //if there results

        $response['res'] =  $query->fetchAll(PDO::FETCH_ASSOC);
        //$response['numofpages'] = $query->rowCount();

        $i = 0;
                //print_r($response['res']);
        foreach($response['res'] as $craftsmen=>$attributes){
            $rate = $attributes['rate'];

            $numOfRating = $attributes['numofrates'];// how man rates for this craftsmen
            // $attributes['rate']= ceil((($rate/(float)$numOfRating)*5)/100
            if(!empty($rate)){
                $response['res'][$i]['rate'] = ceil((($rate/(float)$numOfRating)*5)/5)."%";
            }else{
                $response['res'][$i]['rate'] = " لم يحصل على تقييم بعد";
            }
            
            $i++;

        }
        echo json_encode($response);
    }else{
        // no results found
        $response['res'] = "no results found";
        echo json_encode($response);
    }
}elseif(isset($_GET['onPageClick'])){

}











}