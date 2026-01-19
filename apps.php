<?php
// apps.php

require_once __DIR__ . '/config/db.php';


// Récupération de toutes les applications
$sql = "SELECT * FROM applications ORDER BY nom";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
