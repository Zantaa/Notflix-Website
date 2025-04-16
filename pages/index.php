<?php
session_start();
require('../models/database.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; }
    header { background-color: #e50914; padding: 1rem; }
    nav ul { list-style: none; padding: 0; margin: 0; }
    nav ul li { display: inline; margin-right: 20px; }
    nav ul li a { color: #fff; text-decoration: none; }
    main { padding: 20px; }
    footer { background-color: #141414; text-align: center; padding: 1rem; border-top: 1px solid #222; position: fixed; bottom: 0; width: 100%; }
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
          <li><a href="profile.php">Profile</a></li>
        <?php } else { ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Welcome to Notflix!</h1>
    <p>Your movie database in one place! </p>
  </main>
  <footer>
    <p>&copy; 2025 Notflix. All rights reserved.</p>
  </footer>
</body>
</html>
