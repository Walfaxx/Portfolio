<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gérer les compétences</title>
</head>
<body>
    <h1>Gérer les compétences</h1>

    <!-- Modifier les compétences existantes -->
    <h2>Modifier les compétences</h2>
    <form method="post" action="update.php">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom actuel</th>
                <th>Nouveau nom</th>
                <th>Supprimer</th>
            </tr>

            <?php
            $stmt = $pdo->query("SELECT * FROM competences");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $nom = htmlspecialchars($row['nom']);
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nom</td>";
                echo "<td><input type='text' name='noms[$id]' value='$nom'></td>";
                echo "<td><input type='checkbox' name='delete_ids[]' value='$id'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <button type="submit">Enregistrer les modifications</button>
    </form>

    <!-- Ajouter une compétence -->
    <h2>Ajouter une compétence</h2>
    <form method="post" action="add.php">
        <input type="text" name="new_nom" placeholder="Nouvelle compétence" required>
        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
