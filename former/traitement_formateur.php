<?php
session_start();
require "server.php"; 
$conn = new mysqli($host, $admin, $pass, $dbname);

// Vérifier si la connexion à la base de données a échoué
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

// Initialiser une variable pour stocker les messages
$message = "";

// Récupérer les données du formulaire soumis
if (isset($_POST['Postuler'])) {
    $nom = $_POST['name'];
    $email = $_POST['Email'];
    $specialite = $_POST['specialite'];
    $experience = $_POST['experience'];
    $cv = $_FILES['cv']['name'];

    // Préparer la requête SQL pour insérer les données dans la table former
    $sql = "INSERT INTO former (nom, email, specialite, experience, cv) VALUES (?, ?, ?, ?, ?)";

    // Préparer la déclaration SQL
    $stmt = $conn->prepare($sql);

    // Lier les paramètres à la requête
    $stmt->bind_param("sssss", $nom, $email, $specialite, $experience, $cv);

    // Exécuter la requête
    if ($stmt->execute()) {
        $message = "Les données ont été enregistrées avec succès dans la base de données.";
    } else {
        $message = "Erreur lors de l'enregistrement des données dans la base de données: " . $stmt->error;
    }

    // Fermer la déclaration
    $stmt->close();
}

// Afficher le message
echo $message;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message de confirmation</title>
</head>
<body>
    <h2>Message de confirmation</h2>
    <p><?php echo $message; ?></p>
</body>
</html>

