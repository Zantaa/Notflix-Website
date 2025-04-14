<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - Movies</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; }
    header { background-color: #e50914; padding: 1rem; }
    nav ul { list-style: none; padding: 0; margin: 0; }
    nav ul li { display: inline; margin-right: 20px; }
    nav ul li a { color: #fff; text-decoration: none; }
    main { padding: 20px; }
    .movie-container { display: flex; flex-wrap: wrap; justify-content: center; }
    .movie {
      background-color: #222;
      border-radius: 5px;
      margin: 10px;
      padding: 10px;
      width: 300px;
      text-align: center;
    }
    .movie img {
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
        <li><a href="tv_shows.php">TV Shows</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Popular Movies</h1>
    <div class="movie-container">
      <div class="movie">
        <img src="../images/movie1.jpg" alt="The Great Adventure">
        <h2>The Great Adventure</h2>
        <p>An epic journey through enchanted lands and mysterious realms.</p>
      </div>
      <div class="movie">
        <img src="../images/movie2.jpg" alt="Romantic Getaway">
        <h2>Romantic Getaway</h2>
        <p>A love story set in a picturesque town that will warm your heart.</p>
      </div>
      <div class="movie">
        <img src="../images/movie3.jpg" alt="Mystery Manor">
        <h2>Mystery Manor</h2>
        <p>A thrilling tale unraveling secrets behind an ancient manor.</p>
      </div>
      <!-- Add more movies as needed -->
    </div>
  </main>
  <footer>
    <p>&copy; 2025 Notflix. All rights reserved.</p>
  </footer>
</body>
</html>
