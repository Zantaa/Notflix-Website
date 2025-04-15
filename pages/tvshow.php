<?php
session_start();
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
  ["title" => "Ozark",                "description" => "A financial advisor launders money to keep his family safe.",         "image" => "../images/ozark.jpg"],
  ["title" => "Better Call Saul",     "description" => "A small-time lawyer transforms into a criminal attorney.",           "image" => "../images/bettercallsaul.jpg"],
  ["title" => "The Boys",             "description" => "Vigilantes battle corrupt superheroes in a twisted world.",           "image" => "../images/theboys.jpg"],
  ["title" => "House of Cards",       "description" => "A scheming politician climbs the ranks of power in D.C.",            "image" => "../images/houseofcards.jpg"],
  ["title" => "The Crown",            "description" => "A chronicle of Queen Elizabeth II's reign across decades.",           "image" => "../images/thecrown.jpg"],
  ["title" => "Westworld",            "description" => "A futuristic park filled with android hosts evolving beyond control.", "image" => "../images/westworld.jpg"],
  ["title" => "Friends",              "description" => "Six friends share comedic ups and downs in New York City.",           "image" => "../images/friends.jpg"],
  ["title" => "The Office",           "description" => "Mockumentary of office employees at Dunder Mifflin.",                "image" => "../images/theoffice.jpg"],
  ["title" => "The Mandalorian",      "description" => "A bounty hunter protects a mysterious child post-Empire.",           "image" => "../images/themandalorian.jpg"],
  ["title" => "Stranger Things",      "description" => "Kids confront supernatural forces in 1980s Hawkins.",                "image" => "../images/strangerthings.jpg"],
  ["title" => "Rick and Morty",       "description" => "A mad scientist and his grandson go on interdimensional adventures.", "image" => "../images/rickandmorty.jpg"]
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
