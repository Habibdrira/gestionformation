<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <?php
                    $userId = $_SESSION['student_id'];
                    $sql = "SELECT * FROM student WHERE id_user = :userId";

                    $query = $dbh->prepare($sql);
                    $query->bindParam(':userId', $userId, PDO::PARAM_INT);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) { ?>
                            <p class="profile-name"><?php echo htmlentities($row->username); ?></p>
                            <p class="designation"><?php echo htmlentities($row->email); ?></p>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="cours.php">
                <span class="menu-title">cours</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
   

            <li class="nav-item">
            <a class="nav-link" href="formation.php">
                <span class="menu-title">formation</span>
                <i class="icon-layers menu-icon"></i>
            </a>
        </li>


      





    </ul>
</nav>
