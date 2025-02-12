<?php

session_start();

if(!isset($_SESSION['created_a_account'])  
        || $_SESSION['created_a_account'] == false){
    header("Location: pages/index.php");
}

