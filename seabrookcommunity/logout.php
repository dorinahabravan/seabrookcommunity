<?php 
session_start();

    $_SESSION['userid']=NULL;
    unset($_SESSION['userid']);

header("Location: login.php");
die();







