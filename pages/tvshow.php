<?php
session_start();
$tvshows = [
  ["title" => "Breaking Bad", "description" => "A high school chemistry teacher turns to a life of crime after a terminal diagnosis.", "image" => "https://image.tmdb.org/t/p/w500/ggFHVNu6YYI5L9pCfOacjizRGt.jpg"],
  ["title" => "Game of Thrones", "description" => "Noble families vie for control of Westeros in a brutal battle for the Iron Throne.", "image" => "https://image.tmdb.org/t/p/w500/7WUHnWGx5OO145IRxPDUkQSh4C0.jpg"],
  ["title" => "Stranger Things", "description" => "Kids and teens face mysterious supernatural forces in a small town.", "image" => "https://image.tmdb.org/t/p/w500/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg"],
  ["title" => "The Mandalorian", "description" => "A lone bounty hunter traverses the galaxy in the aftermath of the Empire.", "image" => "https://image.tmdb.org/t/p/w500/sWgBv7LV2PRoQgkxwlibdGXKz1S.jpg"],
  ["title" => "The Office", "description" => "A mockumentary about the everyday lives of office employees at Dunder Mifflin.", "image" => "https://image.tmdb.org/t/p/w500/nDnwQJGqKwiFPa4WtS35pRJvz5.jpg"],
  ["title" => "Friends", "description" => "Six friends navigate life and love in New York City.", "image" => "https://image.tmdb.org/t/p/w500/xJHokMbljvjADYdit5fK5VQsXEG.jpg"],
  ["title" => "Westworld", "description" => "A futuristic theme park populated by androids spirals out of control.", "image" => "https://image.tmdb.org/t/p/w500/9N0ldf5e7Fof1S0rD6RBzVW3w.jpg"],
  ["title" => "The Crown", "description" => "A dramatized chronicle of Queen Elizabeth II's reign and the personal intrigues of the royal family.", "image" => "https://image.tmdb.org/t/p/w500/lH3ZIlX8Zc8pTpu6WgF2ipDqt3S.jpg"],
  ["title" => "House of Cards", "description" => "A ruthless politician manipulates his way to power in Washington, D.C.", "image" => "https://image.tmdb.org/t/p/w500/gpsJ8UvueoaNV7SYwUtvpjNjog8.jpg"],
  ["title" => "The Boys", "description" => "Vigilantes take on corrupt superheroes in a dark, twisted world.", "image" => "https://image.tmdb.org/t/p/w500/zq0xx28ABiDfq6U3s6CyhmtaiqM.jpg"],
  ["title" => "Better Call Saul", "description" => "A lawyer's transformation into a morally ambiguous criminal attorney.", "image" => "https://image.tmdb.org/t/p/w500/Ad4fDAIj0AoWq6fm4SWTmLwK0em.jpg"],
  ["title" => "Ozark", "description" => "A financial planner relocates his family to the Ozarks after a money-laundering scheme goes wrong.", "image" => "https://image.tmdb.org/t/p/w500/lO4smOlGVj7K0mjh3gqCHIPaeVU.jpg"],
  ["title" => "Sherlock", "description" => "A modern adaptation of Sherlock Holmes solving mysteries in 21st century London.", "image" => "https://image.tmdb.org/t/p/w500/6Nmd5nX1wI8moaGEj6j3mV0FgqP.jpg"],
  ["title" => "The Witcher", "description" => "A solitary monster hunter struggles against fate in a turbulent world.", "image" => "https://image.tmdb.org/t/p/w500/5MkdVwL4gIhbL1GqQ0aBptK5lBS.jpg"],
  ["title" => "Black Mirror", "description" => "Anthology series exploring twisted, high-tech worlds where modern innovations expose humanity's dark side.", "image" => "https://image.tmdb.org/t/p/w500/ohgHGGsN3xlCXSxaBS8PGHqaRYk.jpg"],
  ["title" => "Fargo", "description" => "Dark and quirky tales of crime and punishment in America's upper Midwest.", "image" => "https://image.tmdb.org/t/p/w500/tWoCecUPWoB6AtY3l5pDacRW2G2.jpg"],
  ["title" => "Narcos", "description" => "The gritty rise and fall of notorious drug cartels in Colombia.", "image" => "https://image.tmdb.org/t/p/w500/6Fv5DfiJc0In9jHc2Uc08v7zCge.jpg"],
  ["title" => "Succession", "description" => "A powerful, dysfunctional family battles for control of a media empire.", "image" => "https://image.tmdb.org/t/p/w500/t5D9JN8h9aOI9d7NwE0ZccKRn8r.jpg"],
  ["title" => "Dexter", "description" => "A Miami-based blood spatter expert leads a secret double life as a vigilante killer.", "image" => "https://image.tmdb.org/t/p/w500/IVvyIN4m5zx1bNxRJrpoVnRQO3P.jpg"],
  ["title" => "Vikings", "description" => "The saga of Ragnar Lothbrok, a legendary Norse warrior and his band of raiders.", "image" => "https://image.tmdb.org/t/p/w500/6KsJsg9O3sJXuexYv7wF0wwt72p.jpg"],
  ["title" => "The Sopranos", "description" => "A New Jersey mob boss grapples with family life and organized crime.", "image" => "https://image.tmdb.org/t/p/w500/6WNUYgWv6AvRR3oGca6Sc0F2Qae.jpg"],
  ["title" => "Chernobyl", "description" => "A dramatized account of the nuclear disaster and its aftermath.", "image" => "https://image.tmdb.org/t/p/w500/evI2YHZnQ2YqhU8mDRSRGoWaKqt.jpg"],
  ["title" => "The Walking Dead", "description" => "Survivors struggle to stay alive in a world overrun by zombies.", "image" => "https://image.tmdb.org/t/p/w500/xkYN3EjjpMNx6Aaj8B3jf1YBRgN.jpg"],
  ["title" => "Peaky Blinders", "description" => "A ruthless gang in post-WWI Birmingham is led by the cunning Thomas Shelby.", "image" => "https://image.tmdb.org/t/p/w500/7vQD90bAMxMBzjJGB9cZtWy3jMY.jpg"],
  ["title" => "True Detective", "description" => "An anthology series exploring dark mysteries through complex investigations.", "image" => "https://image.tmdb.org/t/p/w500/9JW9jFEyM7W4YvUNB2guKv7wmUQ.jpg"],
        ["title" => "Lost", "description" => "Survivors of a plane crash face mysterious occurrences on a seemingly deserted island.", "image" => "https://image.tmdb.org/t/p/w500/lW00L82zXJfrz3rRzKT7h5Yzvck.jpg"],
        ["title" => "Prison Break", "description" => "Two brothers devise a daring escape plan from prison to expose a sinister conspiracy.", "image" => "https://image.tmdb.org/t/p/w500/yiE5Wq02ELh0j7Xtr6pfLqZfV0q.jpg"],
        ["title" => "The Haunting of Hill House", "description" => "A family confronts terrifying memories and paranormal events in their haunted home.", "image" => "https://image.tmdb.org/t/p/w500/iHHlwEs2HutvArLbV7vlTyS3Ymg.jpg"],
        ["title" => "Modern Family", "description" => "A humorous and heartfelt look at the lives of three interconnected families.", "image" => "https://image.tmdb.org/t/p/w500/92WNWG3T1RQzNPhRj4KwPImJ31y.jpg"],
        ["title" => "Rick and Morty", "description" => "An eccentric scientist and his grandson embark on wild interdimensional adventures.", "image" => "https://image.tmdb.org/t/p/w500/pLZq9xjMxzcsWagRJUT3sXBv7BH.jpg"]
];
$found = null;
if (isset($_GET['title'])) {
  $searchTitle = urldecode($_GET['title']);
  foreach ($tvshows as $show) {
    if (strcasecmp($show['title'], $searchTitle) === 0) {
      $found = $show;
      break;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - <?php echo htmlspecialchars($found['title'] ?? 'TV Show Not Found'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; padding: 20px; }
    .tvshow-detail { background-color: #222; border-radius: 5px; padding: 20px; max-width: 700px; margin: 20px auto; text-align: center; }
    .tvshow-detail img { width: 100%; border-radius: 5px; }
    a { color: #e50914; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <?php if ($found): ?>
    <div class="tvshow-detail">
      <img src="<?php echo htmlspecialchars($found['image']); ?>" alt="<?php echo htmlspecialchars($found['title']); ?>">
      <h1><?php echo htmlspecialchars($found['title']); ?></h1>
      <p><?php echo htmlspecialchars($found['description']); ?></p>
      <p><a href="tv_shows.php">Back to TV Shows</a></p>
    </div>
  <?php else: ?>
    <div class="tvshow-detail">
      <h1>TV Show Not Found</h1>
      <p><a href="tv_shows.php">Back to TV Shows</a></p>
    </div>
  <?php endif; ?>
</body>
</html>
