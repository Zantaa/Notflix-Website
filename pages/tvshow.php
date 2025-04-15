<?php
session_start();
$tvshows = [
  ["title" => "Breaking Bad", "description" => "A high school chemistry teacher turns to crime after a terminal diagnosis.", "image" => "../images/breakingbad.png"],
  ["title" => "Game of Thrones", "description" => "Noble families vie for control of Westeros in a brutal battle for the Iron Throne.", "image" => "../images/gamethrones.png"],
  ["title" => "Stranger Things", "description" => "Kids and teens face mysterious supernatural forces in a small town.", "image" => "../images/strangerthings.jpg"],
  ["title" => "The Mandalorian", "description" => "A lone bounty hunter navigates the outer reaches of the galaxy.", "image" => "../images/themandalorian.jpg"],
  ["title" => "The Office", "description" => "A mockumentary following the everyday lives of office employees.", "image" => "../images/theoffice.jpg"],
  ["title" => "Friends", "description" => "Six friends navigate life and love in New York City.", "image" => "../images/friends.jpg"],
  ["title" => "Westworld", "description" => "A futuristic theme park where androids begin to rebel.", "image" => "../images/westworld.jpg"],
  ["title" => "The Crown", "description" => "A chronicle of Queen Elizabeth II's reign and royal family intrigues.", "image" => "../images/thecrown.jpg"],
  ["title" => "House of Cards", "description" => "A ruthless politician schemes his way to power in Washington, D.C.", "image" => "../images/houseofcards.jpg"],
  ["title" => "The Boys", "description" => "Vigilantes take on corrupt superheroes in a dark, twisted world.", "image" => "../images/theboys.jpg"],
  ["title" => "Better Call Saul", "description" => "A small-time lawyer transforms into a criminal attorney.", "image" => "../images/bettercallsaul.jpg"],
  ["title" => "Ozark", "description" => "A financial advisor launders money for a cartel while trying to keep his family safe.", "image" => "../images/ozark.jpg"],
  ["title" => "Sherlock", "description" => "Modern retelling of Sherlock Holmes solving cases in London.", "image" => "../images/sherlock.jpg"],
  ["title" => "The Witcher", "description" => "A monster hunter struggles to find his place in a dangerous world.", "image" => "../images/thewitcher.jpg"],
  ["title" => "Black Mirror", "description" => "An anthology series exploring technology's dark influence on society.", "image" => "../images/blackmirror.jpg"],
  ["title" => "Fargo", "description" => "Darkly humorous crime stories set in America's upper Midwest.", "image" => "../images/fargo.jpg"],
  ["title" => "Narcos", "description" => "The rise and fall of notorious drug cartels.", "image" => "../images/narcos.jpg"],
  ["title" => "Succession", "description" => "A powerful family battles for control of a global media empire.", "image" => "../images/succession.jpg"],
  ["title" => "Dexter", "description" => "A blood-spatter expert leads a secret life as a vigilante serial killer.", "image" => "../images/dexter.jpg"],
  ["title" => "Vikings", "description" => "The saga of legendary Norse warriors and their epic battles.", "image" => "../images/vikings.jpg"],
  ["title" => "The Sopranos", "description" => "A New Jersey mob boss juggles family life and organized crime.", "image" => "../images/thesopranos.jpg"],
  ["title" => "Chernobyl", "description" => "A dramatized account of the catastrophic 1986 nuclear disaster.", "image" => "../images/chernobyl.jpg"],
  ["title" => "The Walking Dead", "description" => "Survivors struggle in a post-apocalyptic zombie world.", "image" => "../images/thewalkingdead.jpg"],
  ["title" => "Peaky Blinders", "description" => "A notorious gang in post-WWI Birmingham is led by Tommy Shelby.", "image" => "../images/peakyblinders.jpg"],
  ["title" => "True Detective", "description" => "Dark, twisted investigations into crime and corruption.", "image" => "../images/truedetective.jpg"],
  ["title" => "Lost", "description" => "Plane crash survivors unravel mysteries on a deserted island.", "image" => "../images/lost.jpg"],
  ["title" => "Prison Break", "description" => "Two brothers devise an intricate escape from prison to expose a conspiracy.", "image" => "../images/prisonbreak.jpg"],
  ["title" => "The Haunting of Hill House", "description" => "A family confronts haunting memories and ghostly presences.", "image" => "../images/thehauntingofhillhouse.jpg"],
  ["title" => "Modern Family", "description" => "A humorous look at the daily lives of three interconnected families.", "image" => "../images/modernfamily.jpg"],
  ["title" => "Rick and Morty", "description" => "A mad scientist and his grandson embark on wild interdimensional adventures.", "image" => "../images/rickandmorty.jpg"]
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
$commentsFile = __DIR__ . '/tv_comments.json';
if (file_exists($commentsFile)) {
  $temp = file_get_contents($commentsFile);
  $comments = json_decode($temp, true);
  if (!is_array($comments)) { $comments = array(); }
} else {
  $comments = array();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['comment'], $_POST['show'])) {
  $newComment = array(
    "show" => $_POST['show'],
    "name" => $_POST['name'],
    "comment" => $_POST['comment'],
    "timestamp" => time()
  );
  $comments[] = $newComment;
  file_put_contents($commentsFile, json_encode($comments));
  header("Location: tvshow.php?title=" . urlencode($_POST['show']));
  exit;
}
$showComments = array();
if ($found) {
  foreach ($comments as $c) {
    if (strcasecmp($c['show'], $found['title']) === 0) {
      $showComments[] = $c;
    }
  }
  usort($showComments, function($a, $b) {
    return $b['timestamp'] - $a['timestamp'];
  });
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
    .comment-form, .comments { background-color: #333; border-radius: 5px; padding: 15px; max-width: 700px; margin: 20px auto; }
    .comment-form input, .comment-form textarea { width: 100%; margin-bottom: 10px; padding: 8px; border: none; border-radius: 3px; }
    .comment-form input[type="submit"] { background-color: #e50914; color: #fff; cursor: pointer; }
    .comment { border-bottom: 1px solid #444; padding: 10px 0; }
    .comment:last-child { border-bottom: none; }
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
    <div class="comment-form">
      <h2>Leave a Comment</h2>
      <form method="post" action="tvshow.php?title=<?php echo urlencode($found['title']); ?>">
        <input type="hidden" name="show" value="<?php echo htmlspecialchars($found['title']); ?>">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="comment" placeholder="Your Comment" rows="4" required></textarea>
        <input type="submit" value="Post Comment">
      </form>
    </div>
    <div class="comments">
      <h2>Comments</h2>
      <?php if (count($showComments) > 0): ?>
        <?php foreach ($showComments as $cm): ?>
          <div class="comment">
            <strong><?php echo htmlspecialchars($cm['name']); ?></strong>
            <small><?php echo date("M d, Y H:i", $cm['timestamp']); ?></small>
            <p><?php echo htmlspecialchars($cm['comment']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No comments yet.</p>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="tvshow-detail">
      <h1>TV Show Not Found</h1>
      <p><a href="tv_shows.php">Back to TV Shows</a></p>
    </div>
  <?php endif; ?>
</body>
</html>
