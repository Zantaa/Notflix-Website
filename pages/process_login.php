<?php
session_start();
require('../models/database.php');
require('../models/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    
    if ($username !== '' && $password !== '') {
        if (login($username, $password)) {
            $_SESSION['is_logged_in'] = true;
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error'] = "Login failed!";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Please provide username and password.";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
