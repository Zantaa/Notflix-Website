<?php
session_start();
require('../models/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notflix - Sign Up</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; }
        header { background-color: #e50914; padding: 1rem; border-bottom: 1px solid #222; display: flex; justify-content: space-between; align-items: center; }
        nav ul { list-style-type: none; padding: 0; margin: 0; }
        nav ul li { display: inline; margin-right: 20px; }
        nav ul li a { color: #fff; text-decoration: none; }
        main { padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 70vh; }
        footer { background-color: #141414; color: #777; text-align: center; padding: 1rem; position: fixed; bottom: 0; width: 100%; border-top: 1px solid #222; }
        .signup-container { background-color: rgba(0, 0, 0, 0.75); padding: 3rem; border-radius: 5px; width: 400px; }
        .signup-container h2 { margin-bottom: 20px; color: #fff; font-size: 2rem; }
        .form-group { margin-bottom: 20px; }
        .form-group input { width: 100%; padding: 1rem; border: 0; border-radius: 5px; background-color: #333; color: #fff; font-size: 1rem; }
        .signup-button { background-color: #e50914; border: none; padding: 1rem; border-radius: 5px; cursor: pointer; width: 100%; font-size: 1.2rem; color: #fff; }
        .signup-button:hover { background-color: #ff3333; }
        .signup-options { margin-top: 20px; text-align: center; }
        .signup-options a { color: #777; text-decoration: none; margin: 0 10px; }
        .signup-options a:hover { text-decoration: underline; }
        .error { color: red; text-align: center; }
        .success { color: green; text-align: center; }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) { ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movies.php">Movies</a></li>
                    <li><a href="tv_shows.php">TV Shows</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="signup-container">
            <h2>Sign Up</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p class='error'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "<p class='success'>{$_SESSION['success']}</p>";
                unset($_SESSION['success']);
            }
            ?>
            <form action="process_signup.php" method="post">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="signup-button">Sign Up</button>
            </form>
            <div class="signup-options">
                <a href="login.php">Already have an account? <b>Sign In</b></a>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Notflix. All rights reserved.</p>
    </footer>
</body>
</html>
