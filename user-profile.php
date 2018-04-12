<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 4/2/2018
 * Time: 6:10 PM
 */

session_start();

if(!isset($_SESSION['user_id']) ||  $_SESSION['userType'] == 1){
    Helper::redirect("index.php",2,"access denied , u r not allowed to explore this page");
}elseif(isset($_SESSION['userType'])){

    echo $_SESSION['userType'];
}