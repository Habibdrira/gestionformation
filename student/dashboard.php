<?php
session_start();

include('includes/dbconnection.php');

// Vérifier si l'utilisateur est connecté
function checkLoggedIn() {
  if (isset($_SESSION['role']) && isset($_SESSION['student_id']) && isset($_SESSION['student_username'])) {
      header('Location: ../login.php');
      exit;
  }
}

// Constantes pour les noms de table
define('TABLE_class', 'class');
define('TABLE_STUDENT', 'student');
define('TABLE_FORMER', 'former');
define('TABLE_TEACHER', 'teacher');
define('cours', 'cours');
define('formation', 'formation');

// Fonction pour récupérer le nombre total d'éléments dans une table
function getTotalItems($table) {
  global $dbh;
  $sql = "SELECT * FROM $table";
  $query = $dbh->prepare($sql);
  $query->execute();
  return $query->rowCount();
}

checkLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin-Dashboard</title>
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
  <link rel="stylesheet" href="css1/style.css">
</head>
<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-sm-flex align-items-baseline report-summary-header">
                        <h5 class="font-weight-semibold">Report Summary</h5> 
                        <span class="ml-auto">Updated Report</span> 
                        <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                      </div>
                    </div>
                  </div>

                  <div class="row report-inner-cards-wrapper">
                    <div class="col-md-6 col-xl report-inner-card">
                      <div class="inner-card-text">
                        <span class="report-title">Total formation </span>
                        <h4><?php echo getTotalItems(formation);?></h4>
                        <a href="manage-class.php"><span class="report-count"> View formation </span></a>
                      </div>
                      <div class="inner-card-icon bg-success">
                        <i class="icon-rocket"></i>
                      </div>
                    </div>

                  
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/moment/moment.min.js"></script>
  <script src="vendors/daterangepicker/daterangepicker.js"></script>
  <script src="vendors/chartist/chartist.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/dashboard.js"></script>
</body>
</html>
