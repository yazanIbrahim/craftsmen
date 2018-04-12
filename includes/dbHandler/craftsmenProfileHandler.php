<?php
    
    session_start();
    require_once "../classes/Dbc.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $getHtml = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $getUrl = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
        
            $db = new Dbc();
            $db = $db->getConn();
            
            
            $stmt = "SELECT first_name,last_name,email,username,craft,city,bio 
                 FROM masteruser FULl JOIN craftsmen ON user_id=craftsmen_id WHERE user_id=?";
            
            $query = $db->prepare($stmt);
            $query -> execute(array($_SESSION['user_id']));
            
           //$stmt2 = "SELECT craft=?, city=? FROM craftsmen WHERE craftsmen_id = ?";
           //$query2 = $this->getDbConnection()->prepare($stmt2);
           //$query2->execute(array($craft,$city,$id));
           
           $result = $query->fetch(PDO::FETCH_ASSOC);
           
           echo json_encode($result);
        
    }
    else{
        echo "NOT ALLOWED";
    }


?>
