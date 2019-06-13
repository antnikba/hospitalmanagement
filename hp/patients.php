<?php

session_start();
require_once ('connect.php');

if(isset($_SESSION['loggedin'])) {
}else {
    $error = 'Please log in first!';
    echo "<script type='text/javascript'>alert('$error'); location.href='index.php';</script>";
}


$current_date = date(Y-m-d);


$query = mysqli_query($conn, "SELECT * from users WHERE id='{$_SESSION['id']}'");


if (mysqli_num_rows($query) == 1) {
    while ($result = mysqli_fetch_assoc($query)) {
        $user_name = $result['fullname'];
        $hospital_id = $result['hospitalid'];
        $work_id = $result['workid'];
        $rank = $result['level'];
    }

}

$query2 = mysqli_query($conn, "SELECT * from hospitals WHERE id='$hospital_id'");

if(mysqli_num_rows($query2) == 1) {
    while ($result2 = mysqli_fetch_assoc($query2)) {
        $hospital_name = $result2['hospital_name'];
        $hospital_logo = $result2['logourl'];
    }
}


if($rank >= 2){
    $query = mysqli_query($conn, "SELECT * from patients WHERE doctorid='{$_SESSION['id']}' and hospitalid='$hospital_id'");
}elseif($rank < 2){
    $query = mysqli_query($conn, "SELECT * from patients WHERE nurseid='{$_SESSION['id']}' and hospitalid='$hospital_id'");
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS</title>
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/patients.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="home.php"><img src="<?php echo $hospital_logo;?>" alt="Logo" style="width:40px;"></a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Patients</a>
        </li>
        <li class="nav-item">
            <?php if($rank >= 3){echo '<a class="nav-link" href="#">Bedside management</a>';} ?>
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
                    <h6 class="dropdown-header"><?php echo $user_name;?></h6>
                    <?php if($rank == 4){echo '<a class="dropdown-item" href="#">Admin</a>';} ?>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </ul>
</nav>

<div class="jumbotron bg-danger">
    <h1>Patients</h1>
    <button type="button" class="btn btn-outline-success" name="addPatient" onclick="location.href='addpatient.php'">Add a patient!</button>
    <hr/>
    <?php

    while($result = mysqli_fetch_assoc($query)){
        $patient_name = $result['patient_name'];
        $bornon = $result['bornon'];
        $inthehp = $result['inthehospital'];
        $pid = $result['id'];

        //Convert it into a timestamp.
        $then = strtotime($inthehp);

        //Get the current timestamp.
        $now = time();

        //Calculate the difference.
        $difference = $now - $then;

        //Convert seconds into days.
        $days = floor($difference / (60*60*24) );

        echo '<p>'. $patient_name .' <br/> Born on: '. $bornon .', In the hospital for '.$days.' days. </p><form action="patientview.php" method="post">
    <button type="submit" class="btn btn-outline-success" name="viewPatient" value="'.$pid.'">Manage Patient</button>
</form> <hr/> ';

    }

    ?>
</div>
</body>
</html>
