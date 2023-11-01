<?php 
if(!isset($_SESSION['userSession'])){
    $d->loadpage("login.php");
    exit;
}

if(isset($_GET['logout'])) {
    unset($_SESSION['userSession']);
    $d->loadpage("login.php");
    exit;
}