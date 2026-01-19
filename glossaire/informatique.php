<?php
// Tableau qui contient les termes du glossaire informatique
// Chaque ligne contient le nom du terme et sa définition
$termes = [
  ["Application", "Logiciel utilisé pour effectuer une tâche précise."],
  ["Applicatif", "Terme utilisé pour désigner une application informatique."],
  ["Serveur", "Ordinateur qui fournit des services aux utilisateurs."],
  ["Serveur applicatif", "Serveur qui héberge une application."],
  ["Base de données", "Endroit où sont stockées les informations."],
  ["MySQL", "Système de gestion de base de données."],
  ["PDO", "Interface PHP permettant d’accéder à une base de données de manière sécurisée."],
  ["Compte utilisateur", "Identité informatique d’un collaborateur."],
  ["Droits d’accès", "Autorisations accordées à un utilisateur."],
  ["Authentification", "Vérification de l’identité d’un utilisateur."],
  ["Ticket", "Demande envoyée au support informatique."],
  ["Incident", "Problème empêchant l’utilisation normale d’un outil."],
  ["Demande de service", "Demande non urgente (accès, logiciel, matériel)."],
  ["Support informatique", "Équipe chargée d’aider les utilisateurs."],
  ["Sauvegarde", "Copie des données pour éviter leur perte."],
  ["Restauration", "Récupération des données après une perte."],
  ["Déploiement", "Mise à disposition d’une application pour les utilisateurs."],
  ["Environnement de test", "Version utilisée pour tester avant la mise en production."],
  ["Production", "Version réellement utilisée par les utilisateurs."],
  ["Mise à jour", "Installation d’une nouvelle version d’un logiciel."],
  ["Patch", "Correctif appliqué à un logiciel ou un système."],
  ["Sécurité informatique", "Protection des systèmes et des données."],
  ["Certificat", "Fichier de sécurité permettant de chiffrer les échanges."],
  ["Chiffrement", "Technique rendant les données illisibles sans autorisation."]
];

// Récupération du mot recherché dans l’URL
// strtolower permet de ne pas faire la différence entre majuscules et minuscules
$q = strtolower($_GET['q'] ?? '');

// Filtrage des termes selon la recherche
// Si aucun mot n’est saisi, tous les termes sont affichés
$resultats = array_filter($termes, function($t) use ($q){
  return $q === '' || str_contains(strtolower($t[0]), $q);
});
?>

<!doctype html>
<html lang="fr">
<head>
  <!-- Encodage pour gérer les accents -->
  <meta charset="utf-8">

  <!-- Titre affiché dans l’onglet du navigateur -->
  <title>Glossaire informatique</title>

  <!-- Fichier CSS commun à tout le site -->
  <link rel="stylesheet" href="../assets/style.css?v=1">
</head>
<body>

<!-- Barre du haut pour la navigation -->
<header class="topbar">
  <div class="brand">
    <!-- Titre de la page -->
    <span>Glossaire informatique</span>
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
    <?php foreach ($resultats as [$titre, $def]): ?>
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
