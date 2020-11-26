<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("location:login.php");
}else{
    
    setcookie('PHPSESSID', "", time() - 3600, "/");
    session_unset();
    session_destroy();
    header("Location: login.php");
}