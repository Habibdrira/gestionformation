<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearn";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Initialiser les variables de message
$success_msg = "";
$error_msg = "";

// Traitement des données soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = ($_POST['password']); 
    $email = $_POST['email'];
    $classe = $_POST['classe'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $student_name = $_POST['student_name'];

    // Gestion de l'image
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = basename($_FILES["image"]["name"]);
        $target_dir = "uploads/";
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    // Préparation et exécution de la requête SQL
    $stmt = $conn->prepare("INSERT INTO student (username, password, email, classe, Gender, image, `Date of Birth`, `Student Name`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $password, $email, $classe, $gender, $image, $dob, $student_name);

    if ($stmt->execute()) {
        $success_msg = "Nouvel enregistrement créé avec succès";
    } else {
        $error_msg = "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: 50px auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"],
        input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
        /* Styles pour le footer */
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: auto;
            padding: 0 20px;
        }
        .footer-container .left-col,
        .footer-container .right-col {
            flex: 1;
        }
        .footer-container .social-media img {
            width: 24px;
            margin: 0 10px;
        }
        .newsletter-form {
            display: flex;
        }
        .newsletter-form .txtb {
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        .newsletter-form .btn {
            padding: 10px;
            border: none;
            border-radius: 0 5px 5px 0;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .newsletter-form .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include "nav.php"; ?>

    <div class="container">
        <h2>Formulaire d'inscription</h2>
        <?php if (!empty($success_msg)): ?>
            <div class="message success"><?php echo $success_msg; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_msg)): ?>
            <div class="message error"><?php echo $error_msg; ?></div>
        <?php endif; ?>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="classe">Classe:</label>
            <input type="text" id="classe" name="classe">

            <label for="gender">Genre:</label>
            <input type="text" id="gender" name="gender">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">

            <label for="dob">Date de naissance:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="student_name">Nom de l'étudiant:</label>
            <input type="text" id="student_name" name="student_name" required>

            <input type="submit" value="S'inscrire">
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="left-col">
                <img src="img/icon/iteam.jpg" style="width: 100px;">
                <div class="logo"></div>
                <div class="social-media">
                    <a href="#"><img src="img/icon/fb.png"></a>
                    <a href="#"><img src="img/icon/insta.png"></a>
                    <a href="#"><img src="img/icon/tt.png"></a>
                    <a href="#"><img src="img/icon/ytube.png"></a>
                    <a href="#"><img src="img/icon/linkedin.png"></a>
                </div><br><br>
                <p class="rights-text">web devoloped by Zahaf Donia and Drira Habib</p>
                <br><p><img src="img/icon/location.png"> Lovely Professional University<br>85-87 Rue Palestine 1002 Tunis</p><br>
                <p><img src="img/icon/phone.png"> +216 22 022 444<br><img src="img/icon/mail.png">&nbsp; info@iteam-univ.tn</p>
            </div>
            <div class="right-col">
                <h1 style="color: #fff">Our Newsletter</h1>
                <div class="border"></div><br>
                <p>Enter Your Email to get our News and updates.</p>
                <form class="newsletter-form">
                    <input class="txtb" type="email" placeholder="Enter Your Email">
                    <input class="btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </footer>
</body>
</html>
