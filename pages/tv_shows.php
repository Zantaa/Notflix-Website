<?php
session_start();
require('../models/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notflix - TV Shows</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; }
        header { background-color: #e50914; padding: 1rem; border-bottom: 1px solid #222; display: flex; justify-content: space-between; align-items: center; }
        nav ul { list-style-type: none; padding: 0; margin: 0; }
        nav ul li { display: inline; margin-right: 20px; }
        nav ul li a { color: #fff; text-decoration: none; }
        main { padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 70vh; }
        footer { background-color: #141414; color: #777; text-align: center; padding: 1rem; position: fixed; bottom: 0; width: 100%; border-top: 1px solid #222; }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Welcome to our TV show selection!</h1>
    </main>
    <footer>
        <p>&copy; 2025 Notflix. All rights reserved.</p>
    </footer>
</body>
</html>
