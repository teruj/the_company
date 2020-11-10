<?php
session_start();

/*  put this at the top of internal pages  */
if(!$_SESSION['id']){ //if the session id is not set
    header("location: loginRedirect.php");
    exit;
}

include_once "../classes/user.php";

//Are you sure you want to delete userID x?
//if(Yes){}
$user = new User;

$userID = $_GET['userID'];
$user->deleteUser($userID);
//}else{
//header("location: dashboard.php")
//}