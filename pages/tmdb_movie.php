<?php
// tmdb_movie.php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - TMDb Movie Info</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #141414;
      color: #fff;
      margin: 0;
      padding: 20px;
    }
    .movie {
      background-color: #222;
      padding: 20px;
      border-radius: 5px;
      max-width: 700px;
      margin-bottom: 20px;
    }
    .movie img {
      max-width: 300px;
      display: block;
      margin-bottom: 20px;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <h1>TMDb Movie Information</h1>
  <?php
  // TMDb v4 Bearer token (provided)
  $bearerToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZTkxYzY0YTNiZTgzZGMxYWUwYzdiYTk0ZWVlMDAxNSIsIm5iZiI6MTc0NDY2NTE5MS41MDcsInN1YiI6IjY3ZmQ3YTY3MzAxNTM2MzI4NmQ5NWE5ZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.vw44vZ7ZMpnHAzw6NjIt6ZO6ySyJmcuFFtcbTH0bewU";

  // Get the movie title from the query string; default to "Fight Club" if not provided
  $movieQuery = isset($_GET['movie']) && !empty($_GET['movie']) ? $_GET['movie'] : "Fight Club";

  // Build the URL for TMDb v4 search endpoint for movies.
  // Documentation: https://developers.themoviedb.org/4/search/search-movies
  $endpoint = "https://api.themoviedb.org/4/search/movie?query=" . urlencode($movieQuery) . "&page=1";

  // Initialize cURL
  $ch = curl_init($endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Set the headers: Use the Bearer token for Authorization and proper content type
  $headers = [
    "Authorization: Bearer {$bearerToken}",
    "Content-Type: application/json;charset=utf-8"
  ];
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  // For testing, we can disable SSL verification (remove or set to true for production)
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($httpCode !== 200) {
      echo "<p class='error'>Error fetching data from TMDb API. HTTP Status Code: {$httpCode}</p>";
      // Optionally display the raw response for debugging:
      // echo "<pre>" . htmlspecialchars($response) . "</pre>";
  } else {
      $data = json_decode($response, true);
      if (isset($data['results']) && count($data['results']) > 0) {
          // Get the first result from the search
          $movie = $data['results'][0];

          // Build the poster URL if available. TMDb image URL base is typically:
          // "https://image.tmdb.org/t/p/w500" for a medium-size poster.
          $posterUrl = "";
          if (isset($movie['poster_path']) && !empty($movie['poster_path'])) {
              $posterUrl = "https://image.tmdb.org/t/p/w500" . $movie['poster_path'];
          }

          echo "<div class='movie'>";
          // Display the movie title and release year (if available)
          $releaseYear = isset($movie['release_date']) ? substr($movie['release_date'], 0, 4) : "N/A";
          echo "<h2>" . htmlspecialchars($movie['title']) . " ({$releaseYear})</h2>";

          // Display the poster if available
          if ($posterUrl) {
              echo "<img src='" . htmlspecialchars($posterUrl) . "' alt='Movie Poster'>";
          }

          // Display overview and vote average (rating)
          echo "<p><strong>Overview:</strong> " . htmlspecialchars($movie['overview']) . "</p>";
          echo "<p><strong>Vote Average:</strong> " . htmlspecialchars($movie['vote_average']) . "</p>";
          echo "</div>";
      } else {
          echo "<p class='error'>No results found for: " . htmlspecialchars($movieQuery) . "</p>";
      }
  }
  ?>
  <p>To test, use a URL like: <code>?movie=Inception</code></p>
</body>
</html>
