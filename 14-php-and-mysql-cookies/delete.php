<?php
    require "functions.php";
    
    session_start();
    
    if(!$_SESSION['login']){
        header("Location: login.php");
    }
    delete();
?>