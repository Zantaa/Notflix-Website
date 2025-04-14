<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - TV Shows</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; }
    header { background-color: #e50914; padding: 1rem; }
    nav ul { list-style: none; padding: 0; margin: 0; }
    nav ul li { display: inline; margin-right: 20px; }
    nav ul li a { color: #fff; text-decoration: none; }
    main { padding: 20px; }
    .show-container { display: flex; flex-wrap: wrap; justify-content: center; }
    .show {
      background-color: #222;
      border-radius: 5px;
      margin: 10px;
      padding: 10px;
      width: 300px;
      text-align: center;
    }
    .show img {
      width: 100%;
      border-radius: 5px;
    }
    footer { background-color: #141414; text-align: center; padding: 1rem; border-top: 1px solid #222; position: fixed; bottom: 0; width: 100%; }
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
    <h1>Popular TV Shows</h1>
    <div class="show-container">
      <div class="show">
        <img src="../images/show1.jpg" alt="Mystery Manor">
        <h2>Mystery Manor</h2>
        <p>A thrilling series full of twists and secrets.</p>
      </div>
      <div class="show">
        <img src="../images/show2.jpg" alt="Comedy Nights">
        <h2>Comedy Nights</h2>
        <p>A hilarious comedy that lights up your evenings.</p>
      </div>
      <div class="show">
        <img src="../images/show3.jpg" alt="Drama District">
        <h2>Drama District</h2>
        <p>An intense drama exploring the complexities of urban life.</p>
      </div>
      <!-- Add more TV shows as needed -->
    </div>
  </main>
  <footer>
    <p>&copy; 2025 Notflix. All rights reserved.</p>
  </footer>
</body>
</html>
