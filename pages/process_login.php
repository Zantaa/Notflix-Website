<?php

session_start();

try {
    require('../models/database.php');
    require('../models/login.php');
    
    $message = "";
    
    $action = htmlspecialchars(filter_input(INPUT_GET, "action"));

    $username = htmlspecialchars(filter_input(INPUT_POST, "username")); 
    $password = htmlspecialchars(filter_input(INPUT_POST, "password")); 
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    
    
    if( $action == "logout" ){
        $_SESSION = array();
        session_destroy();
    }
    
    
    if ($username != "" && $password != "") {
        if (login( $username, $password)){
        $_SESSION['is_logged_in'] = true;
        
    }else {
        $message = "Login failed!";
    }
}
    
    
    include 'pages/login.php';
    
} catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }