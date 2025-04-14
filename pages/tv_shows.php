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
    .tvshow-container { display: flex; flex-wrap: wrap; justify-content: center; }
    .tvshow-link { text-decoration: none; color: inherit; margin: 10px; }
    .tvshow { background-color: #222; border-radius: 5px; padding: 10px; width: 300px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; }
    .tvshow:hover { transform: scale(1.05); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); cursor: pointer; }
    .tvshow img { width: 100%; border-radius: 5px; }
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
    <div class="tvshow-container">
      <?php
      $tvshows = [
        ["title" => "Breaking Bad", "description" => "A high school chemistry teacher turns to a life of crime after a terminal diagnosis.", "image" => "https://image.tmdb.org/t/p/w500/ggFHVNu6YYI5L9pCfOacjizRGt.jpg"],
        ["title" => "Game of Thrones", "description" => "Noble families vie for control of Westeros in a brutal, epic battle for the Iron Throne.", "image" => "https://image.tmdb.org/t/p/w500/7WUHnWGx5OO145IRxPDUkQSh4C0.jpg"],
        ["title" => "Stranger Things", "description" => "Kids and teens uncover mysteries and supernatural forces in their small town.", "image" => "https://image.tmdb.org/t/p/w500/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg"],
        ["title" => "The Mandalorian", "description" => "A lone bounty hunter navigates the outer reaches of the galaxy in the aftermath of the Empire's fall.", "image" => "https://image.tmdb.org/t/p/w500/sWgBv7LV2PRoQgkxwlibdGXKz1S.jpg"],
        ["title" => "The Office", "description" => "A mockumentary exploring the humorous and heartfelt dynamics of office workers.", "image" => "https://image.tmdb.org/t/p/w500/nDnwQJGqKwiFPa4WtS35pRJvz5.jpg"],
        ["title" => "Friends", "description" => "Six friends navigate life, love, and hilarious challenges in New York City.", "image" => "https://image.tmdb.org/t/p/w500/xJHokMbljvjADYdit5fK5VQsXEG.jpg"],
        ["title" => "Westworld", "description" => "Guests at a futuristic theme park encounter android hosts that begin to malfunction.", "image" => "https://image.tmdb.org/t/p/w500/9N0ldf5e7Fof1S0rD6RBzVW3w.jpg"],
        ["title" => "The Crown", "description" => "A dramatized chronicle of Queen Elizabeth II's reign and the challenges of royal life.", "image" => "https://image.tmdb.org/t/p/w500/lH3ZIlX8Zc8pTpu6WgF2ipDqt3S.jpg"],
        ["title" => "House of Cards", "description" => "A ruthless politician manipulates his way to power in Washington, D.C.", "image" => "https://image.tmdb.org/t/p/w500/gpsJ8UvueoaNV7SYwUtvpjNjog8.jpg"],
        ["title" => "The Boys", "description" => "Vigilantes take on corrupt superheroes in a dark, gritty world.", "image" => "https://image.tmdb.org/t/p/w500/zq0xx28ABiDfq6U3s6CyhmtaiqM.jpg"],
        ["title" => "Better Call Saul", "description" => "The transformation of a small-time lawyer into a morally ambiguous criminal attorney.", "image" => "https://image.tmdb.org/t/p/w500/Ad4fDAIj0AoWq6fm4SWTmLwK0em.jpg"],
        ["title" => "Ozark", "description" => "A financial planner relocates his family to the Ozarks after a money-laundering scheme goes wrong.", "image" => "https://image.tmdb.org/t/p/w500/lO4smOlGVj7K0mjh3gqCHIPaeVU.jpg"],
        ["title" => "Sherlock", "description" => "A modern adaptation of Sherlock Holmes solving mysteries in contemporary London.", "image" => "https://image.tmdb.org/t/p/w500/6Nmd5nX1wI8moaGEj6j3mV0FgqP.jpg"],
        ["title" => "The Witcher", "description" => "A solitary monster hunter struggles to find his place in a turbulent world.", "image" => "https://image.tmdb.org/t/p/w500/5MkdVwL4gIhbL1GqQ0aBptK5lBS.jpg"],
        ["title" => "Black Mirror", "description" => "Anthology series exploring twisted, high-tech multiverses where humanity's dark side emerges.", "image" => "https://image.tmdb.org/t/p/w500/ohgHGGsN3xlCXSxaBS8PGHqaRYk.jpg"],
        ["title" => "Fargo", "description" => "Crime stories in the upper Midwest inspired by true events and dark humor.", "image" => "https://image.tmdb.org/t/p/w500/tWoCecUPWoB6AtY3l5pDacRW2G2.jpg"],
        ["title" => "Narcos", "description" => "The rise and fall of notorious drug cartels in Colombia.", "image" => "https://image.tmdb.org/t/p/w500/6Fv5DfiJc0In9jHc2Uc08v7zCge.jpg"],
        ["title" => "Succession", "description" => "The tumultuous power struggle within a global media empire.", "image" => "https://image.tmdb.org/t/p/w500/t5D9JN8h9aOI9d7NwE0ZccKRn8r.jpg"],
        ["title" => "Dexter", "description" => "A Miami blood spatter expert leads a secret life as a vigilante serial killer.", "image" => "https://image.tmdb.org/t/p/w500/IVvyIN4m5zx1bNxRJrpoVnRQO3P.jpg"],
        ["title" => "Vikings", "description" => "The saga of Ragnar Lothbrok and his band of legendary Norse warriors.", "image" => "https://image.tmdb.org/t/p/w500/6KsJsg9O3sJXuexYv7wF0wwt72p.jpg"],
        ["title" => "The Sopranos", "description" => "A New Jersey mob boss balances family life with running a criminal organization.", "image" => "https://image.tmdb.org/t/p/w500/6WNUYgWv6AvRR3oGca6Sc0F2Qae.jpg"],
        ["title" => "Chernobyl", "description" => "A dramatized account of the nuclear disaster and its aftermath in 1986.", "image" => "https://image.tmdb.org/t/p/w500/evI2YHZnQ2YqhU8mDRSRGoWaKqt.jpg"],
        ["title" => "The Walking Dead", "description" => "Survivors navigate a post-apocalyptic world overrun by zombies.", "image" => "https://image.tmdb.org/t/p/w500/xkYN3EjjpMNx6Aaj8B3jf1YBRgN.jpg"],
        ["title" => "Peaky Blinders", "description" => "A notorious gang in post-WWI Birmingham is led by the fierce Tommy Shelby.", "image" => "https://image.tmdb.org/t/p/w500/7vQD90bAMxMBzjJGB9cZtWy3jMY.jpg"],
        ["title" => "True Detective", "description" => "An anthology series unraveling dark mysteries across different time periods.", "image" => "https://image.tmdb.org/t/p/w500/9JW9jFEyM7W4YvUNB2guKv7wmUQ.jpg"],
        ["title" => "Lost", "description" => "Survivors of a plane crash confront mysterious forces on a seemingly deserted island.", "image" => "https://image.tmdb.org/t/p/w500/lW00L82zXJfrz3rRzKT7h5Yzvck.jpg"],
        ["title" => "Prison Break", "description" => "Two brothers hatch a daring plan to break out of prison and expose a deep conspiracy.", "image" => "https://image.tmdb.org/t/p/w500/yiE5Wq02ELh0j7Xtr6pfLqZfV0q.jpg"],
        ["title" => "The Haunting of Hill House", "description" => "A family confronts terrifying memories of a haunted house and the ghosts that still linger.", "image" => "https://image.tmdb.org/t/p/w500/iHHlwEs2HutvArLbV7vlTyS3Ymg.jpg"],
        ["title" => "Modern Family", "description" => "A humorous look at the lives of three interconnected families.", "image" => "https://image.tmdb.org/t/p/w500/92WNWG3T1RQzNPhRj4KwPImJ31y.jpg"],
        ["title" => "Rick and Morty", "description" => "An eccentric scientist and his grandson embark on interdimensional adventures.", "image" => "https://image.tmdb.org/t/p/w500/pLZq9xjMxzcsWagRJUT3sXBv7BH.jpg"]
      ];
      foreach ($tvshows as $show) {
        echo "<a class='tvshow-link' href='tvshow.php?title=" . urlencode($show['title']) . "'>";
        echo "<div class='tvshow'>";
        echo "<img src='" . htmlspecialchars($show['image']) . "' alt='" . htmlspecialchars($show['title']) . " poster'>";
        echo "<h2>" . htmlspecialchars($show['title']) . "</h2>";
        echo "<p>" . htmlspecialchars($show['description']) . "</p>";
        echo "</div>";
        echo "</a>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p>&copy; 2025 Notflix. All rights reserved.</p>
  </footer>
</body>
</html>
