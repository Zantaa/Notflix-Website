<?php
// movie_info.php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notflix - Movie Info</title>
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #141414;
          color: #fff;
          margin: 0;
          padding: 20px;
      }
      h1 {
          margin-bottom: 20px;
      }
      .movie {
          background-color: #222;
          padding: 20px;
          border-radius: 5px;
          max-width: 700px;
      }
      .movie img {
          max-width: 300px;
          display: block;
          margin-bottom: 20px;
      }
      .movie p {
          margin: 10px 0;
      }
      .error {
          color: red;
      }
  </style>
</head>
<body>
  <h1>Movie Information</h1>
  <?php
  // Use your new OMDb API key here
  $apiKey = "a903786bf848268c3f012228cabd9131";

  // Get the movie title from URL query parameter; default to "Fight Club" if not provided
  $movieTitle = (isset($_GET['movie']) && !empty($_GET['movie'])) 
                ? urlencode($_GET['movie']) 
                : urlencode("Fight Club");

  // Build the URL for the OMDb API request using HTTPS
  $apiUrl = "https://www.omdbapi.com/?t={$movieTitle}&apikey={$apiKey}";

  // Use cURL to fetch data from the API
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $apiUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Optionally disable SSL verification if necessary (for testing only)
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  // Check for HTTP errors
  if ($httpCode !== 200) {
      echo "<p class='error'>Error fetching data from OMDb API. HTTP Status Code: $httpCode</p>";
  } else {
      // Decode the JSON response
      $movieData = json_decode($response, true);
      // Check if the API returned a valid result
      if (isset($movieData['Response']) && $movieData['Response'] === "True") {
          ?>
          <div class="movie">
              <h2><?php echo htmlspecialchars($movieData['Title']); ?> (<?php echo htmlspecialchars($movieData['Year']); ?>)</h2>
              <?php
              if (!empty($movieData['Poster']) && $movieData['Poster'] != "N/A") {
                  echo "<img src='" . htmlspecialchars($movieData['Poster']) . "' alt='Poster for " . htmlspecialchars($movieData['Title']) . "'>";
              }
              ?>
              <p><strong>Genre:</strong> <?php echo htmlspecialchars($movieData['Genre']); ?></p>
              <p><strong>Director:</strong> <?php echo htmlspecialchars($movieData['Director']); ?></p>
              <p><strong>Plot:</strong> <?php echo htmlspecialchars($movieData['Plot']); ?></p>
              <p><strong>IMDB Rating:</strong> <?php echo htmlspecialchars($movieData['imdbRating']); ?></p>
          </div>
          <?php
      } else {
          echo "<p class='error'>Movie not found. Please check the title and try again.</p>";
      }
  }
  ?>
  <p>To test this page, add a query parameter in the URL like: <code>?movie=Inception</code></p>
</body>
</html>
