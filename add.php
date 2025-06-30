<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once 'conn.php';

if (!empty($_POST['new_nom'])) {
    $nom = trim($_POST['new_nom']);
    $stmt = $pdo->prepare("INSERT INTO competences (nom) VALUES (:nom)");
    $stmt->execute([':nom' => $nom]);
    echo " Compétence ajoutée avec succès.<br><a href='modifier.php'>Retour</a>";
} else {
    echo " Veuillez entrer un nom valide.<br><a href='modifier.php'>Retour</a>";
}
