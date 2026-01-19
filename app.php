<?php
require_once __DIR__ . '/config/db.php';

if (!isset($_GET['id'])) {
  die("Application introuvable");
}

$id = (int) $_GET['id'];

$sql = "SELECT id, nom, description, pour_qui, exemple FROM applications WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$app = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$app) {
  die("Application inexistante");
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($app['nom']) ?> - Catalogue</title>
  <link rel="stylesheet" href="assets/style.css?v=3">
</head>
<body>

<header class="topbar">
  <div class="brand">Catalogue</div>
  <div class="top-actions">
    <a class="top-link" href="index.php#liste">← Retour</a>
  </div>
</header>

<section class="hero hero-mini">
  <div class="hero-inner">
    <h1><?= htmlspecialchars($app['nom']) ?></h1>
    <p>Fiche détaillée de l’applicatif</p>
  </div>
</section>

<main class="container">

  <div class="detail-grid">

    <div class="detail-card">
      <h2>Description</h2>
      <p><?= nl2br(htmlspecialchars($app['description'] ?? 'Non renseignée')) ?></p>
    </div>

    <div class="detail-card">
      <h2>Pour qui</h2>
      <p><?= nl2br(htmlspecialchars($app['pour_qui'] ?? 'Non renseigné')) ?></p>
    </div>

    <div class="detail-card">
      <h2>Exemple d’utilisation</h2>
      <p><?= nl2br(htmlspecialchars($app['exemple'] ?? 'Non renseigné')) ?></p>
    </div>

  </div>

</main>

<footer class="footer">
  Catalogue interne – Saint-Gobain Abrasifs
</footer>

</body>
</html>
