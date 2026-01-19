<?php
// Adresse du serveur de base de données (ici en local avec XAMPP)
$host = "localhost";

// Nom de la base de données utilisée par l'application
$dbname = "catalogue_sg";

// Nom d'utilisateur pour se connecter à MySQL
$user = "root";

// Mot de passe (vide par défaut sur XAMPP en local)
$pass = "";

// Tentative de connexion à la base de données
try {
    // Création de l'objet PDO pour se connecter à MySQL
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass
    );

    // Configuration du mode d'erreur pour afficher les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // En cas d'erreur, arrêt du script et affichage du message
    die("Erreur connexion BDD : " . $e->getMessage());
}
