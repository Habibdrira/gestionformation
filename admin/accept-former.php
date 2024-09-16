<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Vérification de la connexion à la base de données
if (!$dbh) {
    die("Erreur de connexion : " . mysqli_connect_error());
}







// Acceptation d'un formateur
if (isset($_GET['accept'])) {
    $rid = intval($_GET['accept']);
    $sql = "UPDATE former SET is_Active = 1 WHERE id_user =  :rid";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_INT);
    $query->execute();
    echo "<script>alert('former acceptee ');</script>";
    echo "<script>window.location.href = 'accept-former.php'</script>";  
    exit;
}

// Suppression d'un formateur
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "DELETE FROM former WHERE id_user = :rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_INT);
    $query->execute();
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'accept-former.php'</script>";     
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>iteam-elearning || Manage Formateurs</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container-scroller">
    <?php include_once('includes/header.php'); ?>
    
    <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> accepter Formateurs</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Formateurs</li>
                        </ol>
                    </nav>
                </div>
                
                <!-- Formateurs non acceptés -->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-sm-0">Formateurs en Attente</h4>
                                <div class="table-responsive border rounded p-1">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Formateur ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Specialité</th>
                                                <th>Experience</th>
                                                <th>CV</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Récupération des formateurs non actifs
                                            $sql = "SELECT * FROM former WHERE is_Active = 0";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {
                                            ?>   
                                                    <tr>
                                                        <td><?php echo htmlentities($row->id_user); ?></td>
                                                        <td><?php echo htmlentities($row->username); ?></td>
                                                        <td><?php echo htmlentities($row->email); ?></td>
                                                        <td><?php echo htmlentities($row->specialite); ?></td>
                                                        <td><?php echo htmlentities($row->experience); ?></td>
                                                        <td><a href="cvs/<?php echo htmlentities($row->cv); ?>" target="_blank">View CV</a></td>
                                                        <td>
                                                            <a href="accept-former.php?accept=<?php echo htmlentities($row->id_user); ?>" onclick="return confirm('Do you really want accepter  ?');" class="btn btn-success">Accepter</a>
                                                            ||
                                                            <a href="accept-former.php?delid=<?php echo htmlentities($row->id_user); ?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-danger">Refuser</a>
                                                        </td>
                                                    </tr>
                                            <?php 
                                                }
                                            } else {
                                                echo "<tr><td colspan='7' style='text-align:center;'>Aucun formateur en attente</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                
                                <!-- Pagination -->
                                <div align="left">
                                    <ul class="pagination">
                                        <li><a href="?pageno=1">First</a></li>
                                        <li class="<?php if($pageno <= 1) { echo 'disabled'; } ?>">
                                            <a href="<?php if($pageno <= 1) { echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                                        </li>
                                        <li class="<?php if($pageno >= $total_pages) { echo 'disabled'; } ?>">
                                            <a href="<?php if($pageno >= $total_pages) { echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                                        </li>
                                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
</div>

<!-- Scripts JS -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="./vendors/chart.js/Chart.min.js"></script>
<script src="./vendors/moment/moment.min.js"></script>
<script src="./vendors/daterangepicker/daterangepicker.js"></script>
<script src="./vendors/chartist/chartist.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<script src="./js/dashboard.js"></script>
</body>
</html>

