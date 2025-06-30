<?php
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php");
}
    exit;
    ?>