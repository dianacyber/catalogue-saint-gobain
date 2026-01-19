<?php
$termes = [
  ["Switch", "Boîtier réseau reliant plusieurs équipements entre eux."],
  ["VLAN", "Séparation logique du réseau pour isoler des usages."],
  ["Adresse IP", "Numéro identifiant un appareil sur le réseau."],
  ["Firewall", "Système de sécurité filtrant les connexions réseau."],
  ["Ping", "Test pour vérifier si un appareil répond sur le réseau."]
];

$q = strtolower($_GET['q'] ?? '');
$filtre = array_filter($termes, function($t) use ($q){
  return $q === '' || str_contains(strtolower($t[0]), $q);
});
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Glossaire réseau</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header class="topbar">
  <div class="brand"><span>Réseau</span></div>
  <div class="top-actions">
    <a class="top-link" href="index.php">← Glossaire</a>
  </div>
</header>

<main class="container">

  <form class="search" method="get">
    <input type="text" name="q" placeholder="Rechercher un terme…" value="<?= htmlspecialchars($q) ?>">
    <button>Rechercher</button>
  </form>

  <div class="detail-grid">
    <?php foreach ($filtre as [$titre, $def]): ?>
      <div class="detail-card">
        <h2><?= $titre ?></h2>
        <p><?= $def ?></p>
      </div>
    <?php endforeach; ?>
  </div>

</main>

</body>
</html>
