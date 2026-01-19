<?php
require_once __DIR__ . '/apps.php';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catalogue des applicatifs</title>
  <link rel="stylesheet" href="assets/style.css?v=9999">
</head>
<body>


<header class="topbar">
  <div class="brand">
    <img class="brand-logo" src="assets/img/saint.jpg" alt="Saint-Gobain">
    <span>Catalogue des applicatifs</span>
  </div>

  <div class="top-actions">
    <a class="top-link" href="#liste">Voir la liste</a>
  </div>

  <a class="top-link" href="glossaire.php">Glossaire</a>

</header>


<section class="hero">
  <div class="hero-inner">
    <h1>Catalogue des applicatifs</h1>
    <p>Retrouve rapidement les outils internes et ouvre la fiche pour voir la description, pour qui et un exemple.</p>

    <form class="search" method="get" action="index.php">
      <input type="text" name="q" placeholder="Rechercher un applicatif…" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
      <button type="submit">Rechercher</button>
    </form>
  </div>
</section>

<?php
$q = trim($_GET['q'] ?? '');
if ($q !== '') {
  $applications = array_filter($applications, function($app) use ($q) {
    return stripos($app['nom'], $q) !== false;
  });
}
?>

<main class="container" id="liste">
  <div class="section-head">
    <h2>Liste</h2>
    <div class="count"><?= count($applications) ?> applicatifs</div>
  </div>

  <div class="grid">
    <?php foreach ($applications as $app): ?>
      <a class="card" href="app.php?id=<?= (int)$app['id'] ?>">
        <div class="card-title"><?= htmlspecialchars($app['nom']) ?></div>
        <div class="card-sub">
          <?= htmlspecialchars(mb_strimwidth($app['description'] ?? 'Ouvrir la fiche détaillée', 0, 80, '…')) ?>
        </div>
        <div class="card-cta">Ouvrir →</div>
      </a>
    <?php endforeach; ?>
  </div>
</main>



<footer class="footer">
  Catalogue interne – Saint-Gobain Abrasifs
</footer>

</body>
</html>
