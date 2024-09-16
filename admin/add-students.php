<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_SESSION['role']) && isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
    header('Location: ../login.php');
    exit;
} else {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $classe = $_POST['classe'];
        $gender = $_POST['gender'];
        $image = $_FILES["image"]["name"];
        $dob = $_POST['dob'];
        $studentName = $_POST['studentName'];

        $ret = "SELECT username FROM student WHERE username=:username OR id_user=:studentName";
        $query = $dbh->prepare($ret);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':studentName', $studentName, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() == 0) {
            $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");

            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid image format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                $image = md5($image . time()) . "." . $extension;
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

                $sql = "INSERT INTO student (username, password, email, classe, Gender, image, `Date of Birth`, `Student Name`) VALUES (:username, :password, :email, :classe, :gender, :image, :dob, :studentName)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':classe', $classe, PDO::PARAM_STR);
                $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                $query->bindParam(':image', $image, PDO::PARAM_STR);
                $query->bindParam(':dob', $dob, PDO::PARAM_STR);
                $query->bindParam(':studentName', $studentName, PDO::PARAM_STR);
                $query->execute();

                $LastInsertId = $dbh->lastInsertId();
                if ($LastInsertId > 0) {
                    echo '<script>alert("Student has been added.")</script>';
                    echo "<script>window.location.href ='add-students.php'</script>";
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again")</script>';
                }
            }
        } else {
            echo "<script>alert('Username or Student Name already exists. Please try again');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Management System || Add Students</title>
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
                        <h3 class="page-title"> Add Students </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Students</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Add Students</h4>

                                    <form class="forms-sample" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="exampleInputName1">Student Name</label>
                                            <input type="text" name="studentName" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Student Email</label>
                                            <input type="text" name="email" value="" class="form-control" required='true'>
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleInputEmail3">Student Class</label>
                                            <select name="classe" class="form-control" required='true'>
                                                <option value="">Select Class</option>
                                                <?php

                                                $sql2 = "SELECT * FROM class";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                foreach ($result2 as $row1) {
                                                ?>
                                                    <option value="<?php echo htmlentities($row1->id); ?>"><?php echo htmlentities($row1->classname); ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Gender</label>
                                            <select name="gender" class="form-control" required='true'>
                                                <option value="">Choose Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date of Birth</label>
                                            <input type="date" name="dob" value="" class="form-control" required='true'>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Student ID</label>
                                            <input type="text" name="id_user" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Student Photo</label>
                                            <input type="file" name="image" value="" class="form-control" required='true'>
                                        </div>
                             
                                        <h3>Login details</h3>
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Name</label>
                                            <input type="text" name="username" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Password</label>
                                            <input type="Password" name="password" value="" class="form-control" required='true'>
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
