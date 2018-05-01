<?php
session_start();
require_once "../classes/Dbc.php";
include "../classes/Validator.php";
include "../classes/Sanitizer.php";
include "../classes/User.php";
include "../classes/Helper.php";
include "../classes/EndUser.php";
include "../classes/craftsmen.php";





$data = json_decode(file_get_contents("php://input"));
$data = (array)$data;
$payload = array();
  $db = new Dbc();
         $db = $db->getConn();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
   
    
    $stmt = "SELECT user_type from masteruser where username = ?";
    $query = $db->prepare($stmt);
    $query->execute(array($data['username']));
    $res = $query->fetch(PDO::FETCH_ASSOC);
    if(isset($_SESSION['user_id']) && $_SESSION['userType'] == 0 ){
              //echo $_SESSION['user_id'];
			  
		$validator = new validator();
		$validator->check($data,array(

        "comment"=>array(
			'name'=>'msg',
			'required'=> true
		)
    ));
		
		
		if(!$validator->isPassed()){
			
		}else{
			 $commentSanitizer = new Sanitizer($data);
			 $dbComment = $commentSanitizer->sanitize(array(
                     'comment' => 'string'));
         
				$stmt1 = "SELECT user_id as craftsmenId FROM masteruser WHERE username = ?";
             $query1 = $db->prepare($stmt1);
             $query1->execute(array($data['username']));
             $result = $query1->fetch(PDO::FETCH_ASSOC);
             
			 $user = new Enduser($db);
			 if($user->postComment($result['craftsmenId'],$data['comment'],$_SESSION['user_id'])){
				
				$id = $db->lastInsertId();
				$stmt = "SELECT * FROM craftsmen_comments WHERE comment_id = ?";
				$query = $db->prepare($stmt);
				$query->execute(array($id));

		   $payload ['comment'] = $query->fetch(PDO::FETCH_ASSOC);
		   $payload ['msg']     = true;
           
		}
		
        
             echo json_encode($payload);
         }
         


         
    }else{

        $payload ['msg'] = false;
        echo json_encode($payload);
    }
  
        
    
    
    
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){

    $craftsmen = new craftsmen($db);

    if(isset($_GET['action']) && $_GET['action'] == "getCraftsmenInfoOnLoad"){


        $username = filter_input(INPUT_GET, 'username',FILTER_SANITIZE_STRING);
        //get the id of the craftsmen to send him to the fucntion
        $stmt = "SELECT user_id from masteruser where username = ?";
        $query = $db->prepare($stmt);
        $query->execute(array($username));


        $id = $query->fetch(PDO::FETCH_ASSOC)['user_id'];

        $response = array();

        $craftsmen->retrieveData($id);


        $response ['comments'] = $craftsmen->getComments();

        //get the number of comments in the database
        $stmt = "SELECT COUNT(comment) as numOfRecords FROM craftsmen_comments WHERE craftsmen_id = ?";
        $query = $db->prepare($stmt);
        $query->execute(array($id));
        $response ['numberOfPages'] = $query->fetch(PDO::FETCH_ASSOC)['numOfRecords'];
        $response ['craftsmenInfo'] = $craftsmen->getCraftsmenInfo();

        echo json_encode($response);


    }
    elseif(isset($_GET['action']) && $_GET['action'] == "getComments" && isset($_GET['offset']) && isset($_GET['username'])){
        $response = array();

        $offset = filter_input(INPUT_GET,'offset',FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_GET, 'username',FILTER_SANITIZE_STRING);
        $response = array();
        //get the id of the craftsmen to send him to the fucntion
        $stmt = "SELECT user_id from masteruser where username = ?";
        $query = $db->prepare($stmt);
        $query->execute(array($username));


        $id = $query->fetch(PDO::FETCH_ASSOC)['user_id'];

        $response ['comments'] =  $craftsmen->getCraftsmenComments($id,$offset);
        echo json_encode($response);
    }
}else{
    echo "NOT ALLOWED";
}

?>