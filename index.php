<?php
// Inclusion du fichier qui récupère toutes les applications
require_once __DIR__ . '/apps.php';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catalogue des applicatifs</title>
  <!-- Lien vers la feuille de style CSS -->
  <link rel="stylesheet" href="assets/style.css?v=9999">
</head>
<body>

<!-- Barre de navigation en haut -->
<header class="topbar">
  <div class="brand">
    <!-- Logo de l'entreprise -->
    <img class="brand-logo" src="assets/img/saint.jpg" alt="Saint-Gobain">
    <span>Catalogue des applicatifs</span>
  </div>

  <!-- Liens de navigation -->
  <div class="top-actions">
    <a class="top-link" href="#liste">Voir la liste</a>
    <a class="top-link" href="glossaire/index.php">Glossaire</a>
  </div>
</header>

<!-- Bannière d'accueil avec barre de recherche -->
<section class="hero">
  <div class="hero-inner">
    <h1>Catalogue des applicatifs</h1>
    <p>Retrouve rapidement les outils internes et ouvre la fiche pour voir la description, pour qui et un exemple.</p>

    <!-- Formulaire de recherche -->
    <form class="search" method="get" action="index.php">
      <input type="text" name="q" placeholder="Rechercher un applicatif…" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
      <button type="submit">Rechercher</button>
    </form>
  </div>
</section>

<?php
// Système de filtrage par recherche
$q = trim($_GET['q'] ?? ''); // Récupère le terme de recherche
if ($q !== '') {
  // Filtre les applications dont le nom contient le terme recherché
  $applications = array_filter($applications, function($app) use ($q) {
    return stripos($app['nom'], $q) !== false;
  });
}
?>

<!-- Liste des applications -->
<main class="container" id="liste">
  <div class="section-head">
    <h2>Liste</h2>
    <!-- Compteur dynamique d'applications affichées -->
    <div class="count"><?= count($applications) ?> applicatifs</div>
  </div>

  <!-- Grille de cartes -->
  <div class="grid">
    <?php foreach ($applications as $app): ?>
      <!-- Chaque application est une carte cliquable -->
      <a class="card" href="app.php?id=<?= (int)$app['id'] ?>">
        <!-- Nom de l'application -->
        <div class="card-title"><?= htmlspecialchars($app['nom']) ?></div>
        <!-- Aperçu de la description (limité à 80 caractères) -->
        <div class="card-sub">
          <?= htmlspecialchars(mb_strimwidth($app['description'] ?? 'Ouvrir la fiche détaillée', 0, 80, '…')) ?>
        </div>
        <!-- Bouton d'action -->
        <div class="card-cta">Ouvrir →</div>
      </a>
    <?php endforeach; ?>
  </div>
</main>

<!-- Pied de page -->
<footer class="footer">
  Catalogue interne – Saint-Gobain Abrasifs
</footer>

</body>
</html>