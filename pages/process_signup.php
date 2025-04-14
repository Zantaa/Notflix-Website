<?php
session_start();


require_once(__DIR__ . '/../models/database.php');


if (!isset($pdo)) {
    die('Database connection ($pdo) is not defined. Please check the file path or the database.php file.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password']);
    $username = trim($_POST['username']);

    
    if (empty($password) || empty($username)) {
        $_SESSION['error'] = "Both fields are required.";
        header('Location: signup.php');
        exit;
    }

    if (strlen($username) < 3 || strlen($username) > 20) {
        $_SESSION['error'] = "Username must be between 3 and 20 characters.";
        header('Location: signup.php');
        exit;
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password must be at least 6 characters long.";
        header('Location: signup.php');
        exit;
    }

    try {
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $_SESSION['error'] = "Username is already taken.";
            header('Location: signup.php');
            exit;
        }

        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);

        $_SESSION['success'] = "Account created! You can now log in.";
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "Something went wrong. Please try again later.";
        header('Location: signup.php');
        exit;
    }
} else {
    header('Location: signup.php');
    exit;
}
