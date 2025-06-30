<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once 'conn.php';

// MODIFICATION
if (!empty($_POST['noms'])) {
    foreach ($_POST['noms'] as $id => $newNom) {
        $stmt = $pdo->prepare("UPDATE competences SET nom = :nom WHERE id = :id");
        $stmt->execute([':nom' => $newNom, ':id' => $id]);
    }
}

// SUPPRESSION
if (!empty($_POST['delete_ids'])) {
    foreach ($_POST['delete_ids'] as $idToDelete) {
        $stmt = $pdo->prepare("DELETE FROM competences WHERE id = :id");
        $stmt->execute([':id' => $idToDelete]);
    }
}

echo " Mises à jour effectuées.<br><a href='modifier.php'>Retour</a>";
