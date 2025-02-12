<?php
require_once(__DIR__ . '/includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notflix - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            background-color: #141414;
            color: #fff;
        }
        header {
            background-color: #e50914;
            color: #fff;
            padding: 1rem;
            border-bottom: 1px solid #222;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        nav ul li a:hover {
            color: #fff;
            text-decoration: none;
        }
        main {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
        }
        footer {
            background-color: #141414;
            color: #777;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #222;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 3rem;
            border-radius: 5px;
            width: 400px;
        }
        .login-container h2 {
            text-align: left;
            margin-bottom: 20px;
            color: #fff;
            font-size: 2rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }
        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 0;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 1rem;
        }
        .login-button {
            background-color: #e50914;
            color: #fff;
            border: none;
            padding: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            text-align: center;
            display: block;
            font-size: 1.2rem;
        }
        .login-button:hover {
            background-color: #ff3333;
        }
        .login-options {
            margin-top: 20px;
            text-align: center;
        }
        .login-options a {
            color: #777;
            text-decoration: none;
            margin: 0 10px;
        }
        .login-options a:hover {
            text-decoration: underline;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .remember-me input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="tv_shows.php">TV Shows</a></li>
            </ul>
        </nav>
        <div></div>
    </header>

    <main>
        <div class="login-container">
            <h2>Sign In</h2>
            <form action="process_login.php" method="post">
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="Email or mobile number" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-button">Sign In</button>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
            </form>
            <div class="login-options">
                <a href="#">Forgot password?</a>
                <br>
                <a href="signup.php">New to Notflix? <b>Sign up now</b>.</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Notflix. All rights reserved.</p>
    </footer>
</body>
</html>
