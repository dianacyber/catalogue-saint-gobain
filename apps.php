<?php
// apps.php

// Connexion à la base de données
require_once __DIR__ . '/config/db.php';

// Requête SQL pour récupérer toutes les applications triées par ordre alphabétique
$sql = "SELECT * FROM applications ORDER BY nom";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Stockage de toutes les applications dans un tableau
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);