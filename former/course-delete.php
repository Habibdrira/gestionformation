<?php
session_start();
include('includes/dbconnection.php');

// Vérification des sessions et des rôles
if (!isset($_SESSION['role']) || !isset($_SESSION['former_id'])) {
    header("Location: course.php");
    exit;
}

// Fonction pour supprimer une formation
function removeCourse($id_f, $conn) {
    $sql = "DELETE FROM formation
            WHERE id_f=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id_f]);
    return $re ? true : false;
}

// Vérification si l'ID de la formation à supprimer est passé via GET
if (isset($_GET['id_f'])) {
    $id_f = $_GET['id_f'];
    
    // Appel de la fonction pour supprimer la formation
    if (removeCourse($id_f, $dbh)) {
        $success_message = "Suppression réussie !";
        header("Location: course.php?success=" . urlencode($success_message));
        exit;
    } else {
        $error_message = "Une erreur inconnue s'est produite lors de la suppression de la formation.";
        header("Location: course.php?error=" . urlencode($error_message));
        exit;
    }
} else {
    $error_message = "ID de la formation non spécifié.";
    header("Location: course.php?error=" . urlencode($error_message));
    exit;
}
?>
