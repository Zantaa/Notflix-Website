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
    .tvshow-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .tvshow-link {
      text-decoration: none;
      color: inherit;
      margin: 10px;
    }
    .tvshow {
      background-color: #222;
      border-radius: 5px;
      padding: 10px;
      width: 300px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .tvshow:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0,0,0,0.5);
      cursor: pointer;
    }
    .tvshow img {
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
        ["title" => "Breaking Bad",         "description" => "A high school chemistry teacher turns to crime.",                      "image" => "../images/breakingbad.jpg"],
        ["title" => "Modern Family",        "description" => "Three connected families navigate comedic daily life.",               "image" => "../images/modernfamily.jpg"],
        ["title" => "The Haunting of Hill House", "description" => "Siblings confront terrifying memories of their haunted home.", "image" => "../images/thehauntingofhillhouse.jpg"],
        ["title" => "Prison Break",         "description" => "Two brothers plan an elaborate escape to expose a conspiracy.",       "image" => "../images/prisonbreak.jpg"],
        ["title" => "Lost",                 "description" => "Plane crash survivors face mysteries on a remote island.",           "image" => "../images/lost.jpg"],
        ["title" => "True Detective",       "description" => "Anthology of detectives solving dark, twisted crimes.",              "image" => "../images/truedetective.jpg"],
        ["title" => "Peaky Blinders",       "description" => "A dangerous gang in post-WWI Birmingham led by Tommy Shelby.",        "image" => "../images/peakyblinders.jpg"],
        ["title" => "Vikings",              "description" => "Ragnar Lothbrok and fellow Norse warriors explore new lands.",        "image" => "../images/vikings.jpg"],
        ["title" => "The Sopranos",         "description" => "A New Jersey mob boss deals with family and organized crime.",        "image" => "../images/thesopranos.jpg"],
        ["title" => "Chernobyl",            "description" => "A dramatized account of the 1986 nuclear disaster and aftermath.",    "image" => "../images/chernobyl.jpg"],
        ["title" => "The Walking Dead",     "description" => "A group of survivors struggle in a zombie apocalypse.",              "image" => "../images/thewalkingdead.jpg"],
        ["title" => "Game of Thrones",      "description" => "Noble families fight for the Iron Throne in a medieval fantasy realm.", "image" => "../images/gamethrones.jpg"],
        ["title" => "Narcos",               "description" => "Documents the rise of drug cartels and law enforcement battles.",     "image" => "../images/narcos.jpg"],
        ["title" => "Fargo",                "description" => "Quirky crime stories with dark humor in America's upper Midwest.",    "image" => "../images/fargo.jpg"],
        ["title" => "Black Mirror",         "description" => "Anthology exploring technology's dark influence on humanity.",       "image" => "../images/blackmirror.jpg"],
        ["title" => "The Witcher",          "description" => "Geralt of Rivia hunts monsters while destiny weaves his path.",       "image" => "../images/thewitcher.jpg"],
        ["title" => "Sherlock",             "description" => "Modern retelling of Sherlock Holmes solving cases in London.",        "image" => "../images/sherlock.jpg"],
        ["title" => "Ozark",                "description" => "A financial advisor launder money to keep his family safe.",          "image" => "../images/ozark.jpg"],
        ["title" => "Better Call Saul",     "description" => "A small-time lawyer transforms into a criminal attorney.",           "image" => "../images/bettercallsaul.jpg"],
        ["title" => "The Boys",             "description" => "Vigilantes battle corrupt superheroes in a twisted world.",           "image" => "../images/theboys.jpg"],
        ["title" => "House of Cards",       "description" => "A scheming politician climbs the ranks of power in D.C.",            "image" => "../images/houseofcards.jpg"],
        ["title" => "The Crown",            "description" => "A chronicle of Queen Elizabeth II's reign across decades.",           "image" => "../images/thecrown.jpg"],
        ["title" => "Westworld",            "description" => "A futuristic park filled with android hosts evolving beyond control.", "image" => "../images/westworld.jpg"],
        ["title" => "Friends",              "description" => "Six friends share comedic ups and downs in New York City.",           "image" => "../images/friends.jpg"],
        ["title" => "The Office",           "description" => "Mockumentary of office employees at Dunder Mifflin.",                "image" => "../images/theoffice.jpg"],
        ["title" => "The Mandalorian",      "description" => "A bounty hunter protects a mysterious child post-Empire.",           "image" => "../images/themandalorian.jpg"],
        ["title" => "Stranger Things",      "description" => "Kids confront supernatural forces in 1980s Hawkins.",                "image" => "../images/strangerthings.jpg"],
        ["title" => "Rick and Morty",       "description" => "A mad scientist and his grandson travel across bizarre dimensions.",  "image" => "../images/rickandmorty.jpg"]
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
