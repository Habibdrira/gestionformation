<?php
session_start();

// Désactivation des rapports d'erreurs pour la production
error_reporting(0);

// Inclusion du fichier de connexion à la base de données
include('includes/dbconnection.php');

// Vérification de la connexion à la base de données
if (!$dbh) {
  die("Erreur de connexion : " . mysqli_connect_error());
}

// Fonction pour récupérer toutes les formations
function getAllSubjects($dbh) {
  $sql = "SELECT * FROM formation";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $subjects = $stmt->fetchAll();
    return $subjects;
  } else {
    return []; // Retourner un tableau vide si aucune formation trouvée
  }
}

// Fonction pour afficher les messages d'erreur ou de succès
function displayMessages() {
  if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger mt-3 n-table" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
  }
  if (isset($_GET['success'])) {
    echo '<div class="alert alert-info mt-3 n-table" role="alert">' . htmlspecialchars($_GET['success']) . '</div>';
  }
}

// Fonction pour générer le tableau des cours
function generateCoursesTable($courses) {
  if (count($courses) > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered mt-3 n-table">';
    echo '<thead><tr><th scope="col">#</th><th scope="col">Date Formation</th><th scope="col">Durée</th><th scope="col">Prix</th><th scope="col">Actions</th></tr></thead><tbody>';
    foreach ($courses as $course) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($course['id_f']) . '</td>';
      
      // Vérifier si la date est vide ou non
      if (!empty($course['date_d'])) {
        // Conversion de la date avec DateTime pour assurer la conformité du format
        $dateFormation = new DateTime($course['date_d']);
        echo '<td>' . htmlspecialchars($dateFormation->format('Y-m-d')) . '</td>';
      } else {
        echo '<td> Date non spécifiée </td>'; // Afficher un message par défaut si la date est vide
      }
      
      echo '<td>' . htmlspecialchars($course['durre']) . '</td>';
      echo '<td>' . htmlspecialchars($course['prix']) . '</td>';
      echo '<td>';
      echo '<a href="course-edit.php?idf=' . $course['id_f'] . '" class="btn btn-warning">Edit</a>';
      echo '<a href="course-delete.php?idf=' . $course['id_f'] . '" class="btn btn-danger">Delete</a>';
      echo '</td>';
      echo '</tr>';
    }
    echo '</tbody></table></div>';
  } else {
    echo '<div class="alert alert-info .w-450 m-5" role="alert">Aucune formation trouvée.</div>';
  }
}

// Récupérer les données des formations depuis la base de données
$courses = getAllSubjects($dbh);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "inc/navbar.php"; ?>
    <div class="container mt-5">
        <a href="course-add.php" class="btn btn-dark">Ajouter un nouveau cours</a>
        <?php displayMessages(); ?>
        <?php generateCoursesTable($courses); ?>
    </div>
    <script>
        $(document).ready(function(){
            $("#navLinks li:nth-child(8) a").addClass('active');
        });
    </script>
</body>
</html>
