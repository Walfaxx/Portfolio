<?php
$host = "localhost"; // serveur local
$dbname = "portfolio"; // nom de la base de données
$user = "root"; // utilisateur MySQL (par défaut sur XAMPP/WAMP)
$password = ""; // mot de passe (vide par défaut)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(" Erreur de connexion : " . $e->getMessage());
}
?>
