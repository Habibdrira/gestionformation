<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Vérification de la session pour les utilisateurs non authentifiés
if (isset($_SESSION['role']) && isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
  header('Location: ../login.php');
  exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $classe = $_POST['stuclass'];
    $gender = $_POST['gender'];
    $image = $_FILES["image"]["name"];
    $dob = $_POST['dob'];
    $studentName = $_POST['studentName'];
    $eid = $_GET['editid'];

    // Gestion de l'upload de l'image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "UPDATE student SET username=:username, password=:password, email=:email, classe=:classe, Gender=:gender, image=:image, `Date of Birth`=:dob, `Student Name`=:studentName WHERE id_user=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':classe', $classe, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':image', $target_file, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':studentName', $studentName, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_INT);
    $query->execute();

    echo '<script>alert("Student has been updated")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management System | Update Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Update Students</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Students</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Update Students</h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <?php
                                        $eid = $_GET['editid'];
                                        $sql = "SELECT * FROM student WHERE id_user=:eid";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':eid', $eid, PDO::PARAM_INT);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                        ?>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" value="<?php echo htmlentities($row->username); ?>" class="form-control" required='true'>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" value="<?php echo htmlentities($row->password); ?>" class="form-control" required='true'>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?php echo htmlentities($row->email); ?>" class="form-control" required='true'>
                                            </div>
                                            <div class="form-group">
    <label for="exampleInputEmail3">Student Class</label>
    <select name="stuclass" class="form-control" required='true'>
        <?php
        // Sélectionnez l'étudiant actuellement édité
        $eid = $_GET['editid'];
        $sql = "SELECT * FROM student WHERE id_user=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);

        // Récupérez toutes les classes disponibles
        $sql2 = "SELECT * FROM class";
        $query2 = $dbh->prepare($sql2);
        $query2->execute();
        $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

        // Parcourez les résultats et créez les options
        foreach ($result2 as $row1) {
            $classname_section = htmlentities($row1->classname . ' ' . $row1->section);
            $selected = ($classname_section == htmlentities($row->classe)) ? 'selected' : '';
        ?>
            <option value="<?php echo $classname_section; ?>" <?php echo $selected; ?>>
                <?php echo $classname_section; ?>
            </option>
        <?php } ?>
    </select>
</div>


                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select name="gender" class="form-control" required='true'>
                                                    <option value="<?php echo htmlentities($row->Gender); ?>"><?php echo htmlentities($row->Gender); ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" name="dob" value="<?php echo htmlentities($row->DateofBirth); ?>" class="form-control" required='true'>
                                            </div>
                                            <div class="form-group">
                                                <label for="studentName">Student Name</label>
                                                <input type="text" name="studentName" value="<?php echo htmlentities($row->StudentName); ?>" class="form-control" required='true'>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Student Photo</label>
                                                <img src="uploads/<?php echo htmlentities($row->image); ?>" width="100" height="100" value="<?php echo htmlentities($row->image); ?>"><a href="changeimage.php?editid=<?php echo htmlentities($row->id_user); ?>"> &nbsp; Edit Image</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include_once('includes/footer.php'); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
</body>
</html>




