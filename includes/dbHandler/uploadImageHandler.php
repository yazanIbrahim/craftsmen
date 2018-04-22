<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 4/22/2018
 * Time: 7:45 AM
 */
session_start();
require_once "../classes/Helper.php";
require_once "../classes/Dbc.php";
Helper::uploadFile($_FILES['image'],"images");
$db = new Dbc();
$db = $db->getConn();

$stmt ="Update masteruser set image_path = ? WHERE user_id = ?";

$query = $db->prepare($stmt);
//echo $_FILES['image']['name'];

$query->execute(array($_FILES['image']['name'],$_SESSION['user_id']));

//print_r($_FILES);
/*function uploadEventImage($file) {
    $fileName = $file['image'];
    $fileSize = $file['size'];
    $fileTmp = $file['tmp_name'];
    $fileError = $file['error'];
    $array = explode('.', $fileName);
    $fileExtension = strtolower(end($array));
    $allowed = array('jpg', 'png', 'gif', 'jpeg');
    if (in_array($fileExtension, $allowed) && $fileError === 0 && $fileSize < 3000000) {
        if (move_uploaded_file($fileTmp, $this->eventsDir . $fileName)) {
            return true;
        }
    } else {
        return false;
    }
}*/