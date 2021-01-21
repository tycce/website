<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

if($_GET['do'] == 'logout'){
    unset($_SESSION['admin']);
    session_destroy();
}
 
if(!$_SESSION['admin']){
    header("Location: enter.php");
    exit;
}


?>