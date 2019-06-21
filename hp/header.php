<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="home.php"><img src="<?php echo $hospital_logo;?>" alt="Logo" style="width:40px;"></a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="patients.php">Patients</a>
        </li>
        <li class="nav-item">
            <?php if($_SESSION['rank'] >= 3){echo '<a class="nav-link" href="#">Bedside management</a>';} ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Timetable</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <!-- Dropdown -->
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Profile
                </a>
                <div class="dropdown-menu">
                    <h6 class="dropdown-header"><?php echo $_SESSION['user_name'];?></h6>
                    <?php if($_SESSION['rank'] == 4){echo '<a class="dropdown-item" href="admin.php">Admin</a>';} ?>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </ul>
</nav>
