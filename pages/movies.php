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
    body { 
      font-family: Arial, sans-serif; 
      background-color: #141414; 
      color: #fff; 
      margin: 0; 
    }
    header { 
      background-color: #e50914; 
      padding: 1rem; 
    }
    nav ul { 
      list-style: none; 
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
    main { 
      padding: 20px; 
    }
    .movie-container { 
      display: flex; 
      flex-wrap: wrap; 
      justify-content: center; 
    }
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
    footer { 
      background-color: #141414; 
      text-align: center; 
      padding: 1rem; 
      border-top: 1px solid #222; 
      position: fixed; 
      bottom: 0; 
      width: 100%; 
    }
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
      <?php
      // Array of 30 movies with title, description, and TMDb poster URL
      $movies = [
          [ "title" => "The Shawshank Redemption", "description" => "Two imprisoned men bond over several years, finding solace and redemption.", "image" => "https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg" ],
          [ "title" => "The Godfather", "description" => "The patriarch of an organized crime dynasty transfers control of his empire to his reluctant son.", "image" => "https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg" ],
          [ "title" => "The Dark Knight", "description" => "Batman faces off against the chaotic Joker in a battle for Gotham's soul.", "image" => "https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg" ],
          [ "title" => "Pulp Fiction", "description" => "Interwoven tales of crime and redemption in Los Angeles.", "image" => "https://image.tmdb.org/t/p/w500/dM2w364MScsjFf8pfMbaWUcWrR.jpg" ],
          [ "title" => "Schindler's List", "description" => "A true story of a man who saved hundreds during the Holocaust.", "image" => "https://image.tmdb.org/t/p/w500/c8Ass7acuOe4za6DhSattE359gr.jpg" ],
          [ "title" => "The Lord of the Rings: The Return of the King", "description" => "The epic finale of the quest to destroy the One Ring and save Middle-earth.", "image" => "https://image.tmdb.org/t/p/w500/rCzpDGLbOoPwLjy3OAm5NUPOTrC.jpg" ],
          [ "title" => "Fight Club", "description" => "An underground fight club forms among disillusioned men.", "image" => "https://image.tmdb.org/t/p/w500/adw6Lq9FiC9zjYEpOqfq03ituwp.jpg" ],
          [ "title" => "Forrest Gump", "description" => "The life journey of a kind-hearted man with a low IQ who influences history.", "image" => "https://image.tmdb.org/t/p/w500/saHP97rTPS5eLmrLQEcANmKrsFl.jpg" ],
          [ "title" => "Inception", "description" => "A thief enters dreams to plant an idea into a target's subconscious.", "image" => "https://image.tmdb.org/t/p/w500/qmDpIHrmpJINaRKAfWQfftjCdyi.jpg" ],
          [ "title" => "The Matrix", "description" => "A hacker discovers the truth about his reality and his role in a rebellion.", "image" => "https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg" ],
          [ "title" => "Goodfellas", "description" => "The rise and fall of a mob associate in the American mafia.", "image" => "https://image.tmdb.org/t/p/w500/6QMSLvU5ziIL2T4oSGqu1qU2kML.jpg" ],
          [ "title" => "The Empire Strikes Back", "description" => "The Rebels suffer a major defeat as Darth Vader hunts them relentlessly.", "image" => "https://image.tmdb.org/t/p/w500/7BuH8itoSrLExs2YZSsM01Qk2No.jpg" ],
          [ "title" => "One Flew Over the Cuckoo's Nest", "description" => "A rebellious patient challenges the oppressive system in a mental institution.", "image" => "https://image.tmdb.org/t/p/w500/3jcbDmRFiQ83drXNOvRDeKHxS0C.jpg" ],
          [ "title" => "Interstellar", "description" => "A group of explorers travels through a wormhole in space to ensure humanity's survival.", "image" => "https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg" ],
          [ "title" => "Parasite", "description" => "A darkly comic portrayal of class disparities that spirals into violence.", "image" => "https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg" ],
          [ "title" => "City of God", "description" => "Two boys in the slums of Rio take very different paths, one to crime and one to survival.", "image" => "https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg" ],
          [ "title" => "The Green Mile", "description" => "A supernatural story on death row that defies the laws of reality.", "image" => "https://image.tmdb.org/t/p/w500/velWPhVMQeQKcxggNEU8YmIo52R.jpg" ],
          [ "title" => "Se7en", "description" => "Two detectives hunt a serial killer who uses the seven deadly sins as his modus operandi.", "image" => "https://image.tmdb.org/t/p/w500/69Sns8WoET6CfaYlIkHbla4l7nC.jpg" ],
          [ "title" => "Gladiator", "description" => "A betrayed Roman general seeks revenge and redemption through combat.", "image" => "https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg" ],
          [ "title" => "The Silence of the Lambs", "description" => "An FBI trainee enlists the help of a cannibalistic killer to catch another serial murderer.", "image" => "https://image.tmdb.org/t/p/w500/rplLJ2hPcOQmkFhTqUte0MkEaO2.jpg" ],
          [ "title" => "Saving Private Ryan", "description" => "A squad of soldiers is sent to retrieve a paratrooper during World War II.", "image" => "https://image.tmdb.org/t/p/w500/miDoEMlYDJhOCvxlzI0wZqBs9Yt.jpg" ],
          [ "title" => "The Departed", "description" => "Undercover cops and moles engage in a deadly game of cat-and-mouse in Boston.", "image" => "https://image.tmdb.org/t/p/w500/6yoghtyTpznpBik8EngEmJskVUO.jpg" ],
          [ "title" => "Whiplash", "description" => "A talented drummer faces intense pressure from a ruthless instructor.", "image" => "https://image.tmdb.org/t/p/w500/oPxnRhyAIzJKGUEdSiwTJEPXJLo.jpg" ],
          [ "title" => "The Prestige", "description" => "Two rival magicians engage in a dangerous battle of secrets and deception.", "image" => "https://image.tmdb.org/t/p/w500/kU3B75TyRiCgE270EyZnHjfivoq.jpg" ],
          [ "title" => "Memento", "description" => "A man with short-term memory loss attempts to unravel the mystery of his wife's murder.", "image" => "https://image.tmdb.org/t/p/w500/9X7G8DhH9OPzFeI78NNf3Wf0yjF.jpg" ],
          [ "title" => "Apocalypse Now", "description" => "A soldier's harrowing journey into the heart of the Vietnam War.", "image" => "https://image.tmdb.org/t/p/w500/pOVHzgrWQFuHwYvoXAgMB1UDnC3.jpg" ],
          [ "title" => "Casablanca", "description" => "In the midst of World War II, a cynical expatriate rekindles a past romance in Casablanca.", "image" => "https://image.tmdb.org/t/p/w500/k2WYF0O0DX7UGUAR4ENttxOLJN.jpg" ],
          [ "title" => "Back to the Future", "description" => "A teenager is accidentally sent back in time, altering his future in unpredictable ways.", "image" => "https://image.tmdb.org/t/p/w500/4E2e0ctUr7ZxUQbHVJSULaXPrmo.jpg" ],
          [ "title" => "Raiders of the Lost Ark", "description" => "Indiana Jones races against time and rival factions to recover the biblical Ark of the Covenant.", "image" => "https://image.tmdb.org/t/p/w500/4pRrZ8WQRmu4KfxJpbhC8F1rceT.jpg" ],
          [ "title" => "The Lion King", "description" => "A young lion prince flees his kingdom only to return and claim his rightful place.", "image" => "https://image.tmdb.org/t/p/w500/2bXbqYdUdNVa8VIWXVfclP2ICtT.jpg" ]
      ];
      
      // Loop over movies and display each movie card
      foreach ($movies as $movie) {
          echo "<div class='movie'>";
          echo "<img src='" . htmlspecialchars($movie['image']) . "' alt='" . htmlspecialchars($movie['title']) . " poster'>";
          echo "<h2>" . htmlspecialchars($movie['title']) . "</h2>";
          echo "<p>" . htmlspecialchars($movie['description']) . "</p>";
          echo "</div>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p>&copy; 2025 Notflix. All rights reserved.</p>
  </footer>
</body>
</html>
