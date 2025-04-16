<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$username = $_SESSION['username'];

$updatesFile = __DIR__ . '/updates.json';
if (file_exists($updatesFile)) {
    $temp = file_get_contents($updatesFile);
    $allUpdates = json_decode($temp, true);
    if (!is_array($allUpdates)) {
        $allUpdates = [];
    }
} else {
    $allUpdates = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $newUpdate = [
        'user'      => $username,
        'message'   => trim($_POST['update']),
        'timestamp' => time()
    ];
    $allUpdates[] = $newUpdate;
    file_put_contents($updatesFile, json_encode($allUpdates));
    header('Location: profile.php');
    exit;
}

$userUpdates = array_filter($allUpdates, function($u) use ($username) {
    return isset($u['user']) && strcasecmp($u['user'], $username) === 0;
});
usort($userUpdates, function($a, $b) {
    return $b['timestamp'] - $a['timestamp'];
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Profile</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; background: #141414; color: #fff; margin: 0; padding: 20px; }
    header, footer { background: #e50914; color: #fff; padding: 10px; text-align: center; }
    nav ul { list-style: none; padding: 0; }
    nav ul li { display: inline-block; margin: 0 10px; }
    nav ul li a { color: #fff; text-decoration: none; }
    main { max-width: 600px; margin: 20px auto; background: #222; padding: 20px; border-radius: 5px; }
    .update-form textarea { width: 100%; padding: 8px; border-radius: 3px; border: none; margin-bottom: 10px; }
    .update-form button { background: #e50914; color: #fff; border: none; padding: 10px 20px; border-radius: 3px; cursor: pointer; }
    .updates { margin-top: 20px; }
    .update { border-bottom: 1px solid #444; padding: 10px 0; }
    .update:last-child { border-bottom: none; }
    .timestamp { display: block; color: #888; font-size: 0.9em; margin-top: 5px; }
  </style>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="tv_shows.php">TV Shows</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Hello, <?= htmlspecialchars($username) ?>!</h1>
    <form class="update-form" method="post">
      <textarea name="update" rows="3" placeholder="What's on your mind?" required></textarea>
      <button type="submit">Post Update</button>
    </form>
    <div class="updates">
      <?php if (count($userUpdates)): ?>
        <?php foreach ($userUpdates as $u): ?>
          <div class="update">
            <p><?= htmlspecialchars($u['message']) ?></p>
            <span class="timestamp"><?= date("M d, Y H:i", $u['timestamp']) ?></span>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No updates yet.</p>
      <?php endif; ?>
    </div>
  </main>
  <footer>
    &copy; 2025 Notflix
  </footer>
</body>
</html>
