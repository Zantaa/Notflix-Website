<?php
require('../models/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        die('All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    try {
        $stmt = $database->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            die('Email is already registered.');
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $database->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
} else {
    header('Location: signup.php');
    exit;
}