<?php
require('../models/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notflix - Home</title>
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
        }
        main {
            padding: 20px;
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
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php
        
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){    ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="tv_shows.php">TV Shows</a></li>
                <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
        &nbsp;
         <?php  }  ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to Notflix!</h1>
    </main>

    <footer>
        <p>&copy; 2025 Notflix. All rights reserved.</p>
    </footer>
</body>
</html>

