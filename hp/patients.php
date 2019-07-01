<?php

session_start();
require_once ('connect.php');

require_once ('checklogin.php');


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
    <?php include('bootstrap.php');?>
    <link href="stylesheet/patients.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include ('header.php');?>
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
