<?php
session_start();
    require_once ('connect.php');
    require_once ('checklogin.php');
    require_once ('getuserinfo.php');


    $query2 = mysqli_query($conn, "SELECT * from hospitals WHERE id='{$_SESSION['hospital_id']}'");

    if(mysqli_num_rows($query2) == 1) {
        while ($result2 = mysqli_fetch_assoc($query2)) {
            $hospital_name = $result2['hospital_name'];
            $hospital_logo = $result2['logourl'];
        }
    }
?>





<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS</title>
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/homecss.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="<?php echo $hospital_logo;?>" alt="Logo" style="width:40px;"></a>

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
<div class="container">
    <div class="jumbotron bg-warning">
        <h1><?php echo $hospital_name;?></h1>
        <p>You are currently <?php
            if($_SESSION['rank'] >= 3){
                $query = mysqli_query($conn, "SELECT * from patients WHERE doctorid='{$_SESSION['id']}' and hospitalid='{$_SESSION['hospital_id']}'");
                echo 'attending '.mysqli_num_rows($query). ' patient/s';
            }elseif($_SESSION['rank'] < 3){
                $query = mysqli_query($conn, "SELECT * from patients WHERE nurseid='{$_SESSION['id']}' and hospitalid='{$_SESSION['hospital_id']}'");
                echo 'nurseing '.mysqli_num_rows($query). ' patient/s';
            }
            ?></p>
    </div>
</div>

</body>
</html>
