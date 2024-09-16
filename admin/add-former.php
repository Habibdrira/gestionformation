<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_SESSION['role']) && isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $specialite = $_POST['specialite'];
    $experience = $_POST['experience'];
    $cv = $_FILES["cv"]["name"];

    $ret = "SELECT username FROM former WHERE username=:username";
    $query = $dbh->prepare($ret);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() == 0) {
        $extension = strtolower(pathinfo($cv, PATHINFO_EXTENSION));
        $allowed_extensions = array("pdf", "doc", "docx");

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid CV format. Only pdf / doc / docx format allowed');</script>";
        } else {
            $cv = md5($cv . time()) . "." . $extension;
            move_uploaded_file($_FILES["cv"]["tmp_name"], "cvs/" . $cv);

            $sql = "INSERT INTO former (username, password, email, specialite, experience, cv) VALUES (:username, :password, :email, :specialite, :experience, :cv)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':specialite', $specialite, PDO::PARAM_STR);
            $query->bindParam(':experience', $experience, PDO::PARAM_STR);
            $query->bindParam(':cv', $cv, PDO::PARAM_STR);
            $query->execute();

            $LastInsertId = $dbh->lastInsertId();
            if ($LastInsertId > 0) {
                echo '<script>alert("Formateur has been added.")</script>';
                echo "<script>window.location.href ='add-former.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    } else {
        echo "<script>alert('Username already exists. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Management System || Add Formateurs</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container-scroller">
        <?php include_once('includes/header.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include_once('includes/sidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Add Formateurs </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Formateurs</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Add Formateurs</h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Username</label>
                                            <input type="text" name="username" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Password</label>
                                            <input type="password" name="password" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email</label>
                                            <input type="email" name="email" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Specialité</label>
                                            <input type="text" name="specialite" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Experience</label>
                                            <input type="text" name="experience" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">CV</label>
                                            <input type="file" name="cv" value="" class="form-control" required='true'>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
</body>

</html>
