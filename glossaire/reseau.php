<?php
// Tableau qui contient les termes du glossaire réseau
// Chaque élément contient le nom du terme et sa définition
$termes = [
  ["Switch", "Boîtier réseau reliant plusieurs équipements entre eux."],
  ["VLAN", "Séparation logique du réseau pour isoler des usages."],
  ["Adresse IP", "Numéro identifiant un appareil sur le réseau."],
  ["Firewall", "Système de sécurité filtrant les connexions réseau."],
  ["Ping", "Test pour vérifier si un appareil répond sur le réseau."]
];

// Récupération du mot recherché dans l’URL
// strtolower permet d’ignorer les majuscules et minuscules
$q = strtolower($_GET['q'] ?? '');

// Filtrage des termes selon la recherche
// Si aucun mot n’est saisi, tous les termes sont affichés
$filtre = array_filter($termes, function($t) use ($q){
  return $q === '' || str_contains(strtolower($t[0]), $q);
});
?>

<!doctype html>
<html lang="fr">
<head>
  <!-- Encodage pour gérer correctement les accents -->
  <meta charset="utf-8">

  <!-- Titre affiché dans l’onglet du navigateur -->
  <title>Glossaire réseau</title>

  <!-- Fichier CSS commun à tout le site -->
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- Barre du haut pour la navigation -->
<header class="topbar">
  <div class="brand">
    <!-- Titre de la catégorie -->
    <span>Réseau</span>
  </div>

  <div class="top-actions">
    <!-- Lien pour revenir à la page principale du glossaire -->
    <a class="top-link" href="index.php">← Glossaire</a>
  </div>
</header>

<main class="container">

  <!-- Formulaire de recherche simple -->
  <!-- La méthode GET permet de voir la recherche dans l’URL -->
  <form class="search" method="get">
    <!-- Le champ garde la valeur tapée après la recherche -->
    <input type="text" name="q" placeholder="Rechercher un terme…" value="<?= htmlspecialchars($q) ?>">
    <button>Rechercher</button>
  </form>

  <!-- Zone d’affichage des résultats -->
  <div class="detail-grid">

    <!-- Boucle qui affiche chaque terme filtré -->
    <?php foreach ($filtre as [$titre, $def]): ?>
      <div class="detail-card">
        <!-- Nom du terme -->
        <h2><?= $titre ?></h2>

        <!-- Définition du terme -->
        <p><?= $def ?></p>
      </div>
    <?php endforeach; ?>

  </div>

</main>

</body>
</html>
