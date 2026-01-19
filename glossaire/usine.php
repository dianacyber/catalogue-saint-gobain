<?php
$termes = [
  ["Jumbo", "Grande bobine de matière abrasive utilisée avant découpe."],
  ["Bobine", "Rouleau de matière première utilisé pour la fabrication."],
  ["Bobine mère", "Bobine principale avant transformation."],
  ["Ligne de production", "Ensemble de machines permettant de fabriquer un produit."],
  ["Atelier", "Zone de l’usine dédiée à une activité précise."],
  ["Poste de travail", "Emplacement où une tâche est réalisée."],
  ["Opérateur", "Personne qui travaille sur une machine."],
  ["Ordre de fabrication (OF)", "Document indiquant quoi produire et en quelle quantité."],
  ["Lot", "Ensemble de produits fabriqués dans les mêmes conditions."],
  ["Cadence", "Vitesse de production d’une machine ou d’une ligne."],
  ["Réglage machine", "Ajustement des paramètres avant ou pendant la production."],
  ["Arrêt machine", "Arrêt temporaire ou prolongé d’une machine."],
  ["Arrêt planifié", "Arrêt prévu à l’avance (maintenance, réglage)."],
  ["Arrêt non planifié", "Arrêt imprévu dû à une panne ou un incident."],
  ["Maintenance", "Actions pour maintenir ou réparer une machine."],
  ["Maintenance préventive", "Intervention avant panne pour l’éviter."],
  ["Maintenance corrective", "Réparation après panne."],
  ["Contrôle qualité", "Vérification que le produit respecte les critères."],
  ["Non-conformité", "Produit ne respectant pas les critères attendus."],
  ["Rebut", "Produit non conforme écarté."],
  ["Retouche", "Correction effectuée sur un produit."],
  ["Traçabilité", "Suivi de l’historique d’un produit."],
  ["Stock", "Quantité de matières ou produits disponibles."],
  ["Flux", "Circulation des produits dans l’usine."],
  ["Expédition", "Envoi des produits vers les clients."],
  ["Magasinage", "Gestion du stockage et des mouvements."],
  ["HSE / EHS", "Hygiène, Sécurité et Environnement."],
  ["ATEX", "Zone à risque nécessitant des règles de sécurité spécifiques."]
];

$q = strtolower($_GET['q'] ?? '');
$resultats = array_filter($termes, function($t) use ($q){
  return $q === '' || str_contains(strtolower($t[0]), $q);
});
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Glossaire usine</title>
  <link rel="stylesheet" href="../assets/style.css?v=1">
</head>
<body>

<header class="topbar">
  <div class="brand"><span>Glossaire usine</span></div>
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
    <?php foreach ($resultats as [$titre, $def]): ?>
      <div class="detail-card">
        <h2><?= $titre ?></h2>
        <p><?= $def ?></p>
      </div>
    <?php endforeach; ?>
  </div>

</main>

</body>
</html>
