

<?php

$servername = "localhost";
$username = "root";  
$password = ""; 
$dbname = "portfolio";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';

   
    if (!empty($lname) && !empty($fname) && !empty($subject)) {
       
        $sql = "INSERT INTO contacts (nom, prenom, sujet) VALUES (?, ?, ?)";

        
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param("sss", $lname, $fname, $subject);

       
        if ($stmt->execute()) {
            echo "Les données ont été enregistrées avec succès.";
        } else {
            echo "Erreur : " . $stmt->error;
        }

       
        $stmt->close();
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}


$conn->close();
?>