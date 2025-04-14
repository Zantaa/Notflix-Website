<?php
session_start();

$movies = [
  ["title" => "The Shawshank Redemption", "description" => "Two imprisoned men bond over several years, finding solace and redemption.", "image" => "https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg"],
  ["title" => "The Godfather", "description" => "The patriarch of an organized crime dynasty transfers control of his empire to his reluctant son.", "image" => "https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg"],
  ["title" => "The Dark Knight", "description" => "Batman faces off against the chaotic Joker in a battle for Gotham's soul.", "image" => "https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg"],
  ["title" => "Pulp Fiction", "description" => "Interwoven tales of crime and redemption in Los Angeles.", "image" => "../images/pulpfiction.jpg"],
  ["title" => "Schindler's List", "description" => "A true story of a man who saved hundreds during the Holocaust.", "image" => "https://image.tmdb.org/t/p/w500/c8Ass7acuOe4za6DhSattE359gr.jpg"],
  ["title" => "The Lord of the Rings: The Return of the King", "description" => "The epic finale of the quest to destroy the One Ring and save Middle-earth.", "image" => "https://image.tmdb.org/t/p/w500/rCzpDGLbOoPwLjy3OAm5NUPOTrC.jpg"],
  ["title" => "Fight Club", "description" => "An insomniac office worker and a soap maker start an underground fight club.", "image" => "../images/fightclub.jpg"],
  ["title" => "Forrest Gump", "description" => "The life journey of a kind-hearted man with a low IQ who influences modern history.", "image" => "https://image.tmdb.org/t/p/w500/saHP97rTPS5eLmrLQEcANmKrsFl.jpg"],
  ["title" => "Inception", "description" => "A skilled thief infiltrates dreams to plant an idea into a CEO's mind.", "image" => "../images/inception.jpg"],
  ["title" => "The Matrix", "description" => "A hacker discovers the truth about his reality and leads a rebellion against its controllers.", "image" => "https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg"],
  ["title" => "Goodfellas", "description" => "The rise and fall of a mob associate in the American mafia.", "image" => "../images/goodfellas.jpg"],
  ["title" => "The Empire Strikes Back", "description" => "Darth Vader relentlessly pursues the Rebel Alliance, dealing them a major setback.", "image" => "../images/theempirestrikesback.jpg"],
  ["title" => "One Flew Over the Cuckoo's Nest", "description" => "A rebellious patient challenges the oppressive mental institution he is sent to.", "image" => "https://image.tmdb.org/t/p/w500/3jcbDmRFiQ83drXNOvRDeKHxS0C.jpg"],
  ["title" => "Interstellar", "description" => "A group of explorers travels through a wormhole in search of a new home for humanity.", "image" => "https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg"],
  ["title" => "Parasite", "description" => "A dark comedy about greed and class warfare that takes a violent turn.", "image" => "https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg"],
  ["title" => "City of God", "description" => "Two boys in the slums of Rio take different paths, one to crime and one to photography.", "image" => "https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg"],
  ["title" => "The Green Mile", "description" => "A supernatural tale unfolds on death row in a Southern prison.", "image" => "https://image.tmdb.org/t/p/w500/velWPhVMQeQKcxggNEU8YmIo52R.jpg"],
  ["title" => "Se7en", "description" => "Two detectives hunt a serial killer who uses the seven deadly sins as his theme.", "image" => "https://image.tmdb.org/t/p/w500/69Sns8WoET6CfaYlIkHbla4l7nC.jpg"],
  ["title" => "Gladiator", "description" => "A betrayed Roman general rises through the ranks to avenge his family and emperor.", "image" => "https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg"],
  ["title" => "The Silence of the Lambs", "description" => "An FBI trainee enlists the help of a cannibalistic killer to catch another serial murderer.", "image" => "https://image.tmdb.org/t/p/w500/rplLJ2hPcOQmkFhTqUte0MkEaO2.jpg"],
  ["title" => "Saving Private Ryan", "description" => "A squad of soldiers ventures behind enemy lines to retrieve a paratrooper.", "image" => "../images/savingprivateryan.jpg"],
  ["title" => "The Departed", "description" => "Undercover cops and moles engage in a deadly game in Boston.", "image" => "https://image.tmdb.org/t/p/w500/6yoghtyTpznpBik8EngEmJskVUO.jpg"],
  ["title" => "Whiplash", "description" => "A promising drummer faces a brutal instructor's push toward perfection.", "image" => "../images/whiplash.jpg"],
  ["title" => "The Prestige", "description" => "Two rival magicians engage in a dangerous battle of secrets.", "image" => "https://image.tmdb.org/t/p/w500/kU3B75TyRiCgE270EyZnHjfivoq.jpg"],
  ["title" => "Memento", "description" => "A man with short-term memory loss struggles to solve his wife's murder.", "image" => "../images/memento.jpg"],
  ["title" => "Apocalypse Now", "description" => "A soldier journeys deep into the Vietnam War, confronting horror and madness.", "image" => "../images/apocalypsenow.jpg"],
  ["title" => "Casablanca", "description" => "In WWII-era Casablanca, a cynical expatriate faces past romance and moral dilemmas.", "image" => "../images/casablanca.jpg"],
  ["title" => "Back to the Future", "description" => "A teenager is accidentally sent back in time by a DeLorean.", "image" => "../images/backtothefuture.jpg"],
  ["title" => "Raiders of the Lost Ark", "description" => "Indiana Jones races to recover the Ark of the Covenant before the Nazis.", "image" => "../images/raidersofthelostark.jpg"],
  ["title" => "The Lion King", "description" => "A young lion prince flees his kingdom, only to return and reclaim his destiny.", "image" => "https://image.tmdb.org/t/p/w500/2bXbqYdUdNVa8VIWXVfclP2ICtT.jpg"]
];

$found = null;
if (isset($_GET['title'])) {
  $searchTitle = urldecode($_GET['title']);
  foreach ($movies as $movie) {
    if (strcasecmp($movie['title'], $searchTitle) === 0) {
      $found = $movie;
      break;
    }
  }
}

$commentsFile = __DIR__ . '/comments.json';
if (file_exists($commentsFile)) {
  $temp = file_get_contents($commentsFile);
  $comments = json_decode($temp, true);
  if (!is_array($comments)) {
    $comments = array();
  }
} else {
  $comments = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['comment'], $_POST['movie'])) {
  $newComment = array(
    "movie" => $_POST['movie'],
    "name" => $_POST['name'],
    "comment" => $_POST['comment'],
    "timestamp" => time()
  );
  $comments[] = $newComment;
  file_put_contents($commentsFile, json_encode($comments));
  header("Location: movie.php?title=" . urlencode($_POST['movie']));
  exit;
}

$movieComments = array();
if ($found) {
  foreach ($comments as $c) {
    if (is_array($c) && strcasecmp($c['movie'], $found['title']) === 0) {
      $movieComments[] = $c;
    }
  }
  usort($movieComments, function($a, $b) {
    return $b['timestamp'] - $a['timestamp'];
  });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notflix - <?php echo htmlspecialchars($found['title'] ?? 'Movie Not Found'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #141414; color: #fff; margin: 0; padding: 20px; }
    .movie-detail { background-color: #222; border-radius: 5px; padding: 20px; max-width: 700px; margin: 20px auto; text-align: center; }
    .movie-detail img { width: 100%; border-radius: 5px; }
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
    <div class="movie-detail">
      <img src="<?php echo htmlspecialchars($found['image']); ?>" alt="<?php echo htmlspecialchars($found['title']); ?>">
      <h1><?php echo htmlspecialchars($found['title']); ?></h1>
      <p><?php echo htmlspecialchars($found['description']); ?></p>
      <p><a href="movies.php">Back to Movies</a></p>
    </div>
    <div class="comment-form">
      <h2>Leave a Comment</h2>
      <form method="post" action="movie.php?title=<?php echo urlencode($found['title']); ?>">
        <input type="hidden" name="movie" value="<?php echo htmlspecialchars($found['title']); ?>">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="comment" placeholder="Your Comment" rows="4" required></textarea>
        <input type="submit" value="Post Comment">
      </form>
    </div>
    <div class="comments">
      <h2>Comments</h2>
      <?php if (count($movieComments) > 0): ?>
        <?php foreach ($movieComments as $cm): ?>
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
    <div class="movie-detail">
      <h1>Movie Not Found</h1>
      <p><a href="movies.php">Back to Movies</a></p>
    </div>
  <?php endif; ?>
</body>
</html>
