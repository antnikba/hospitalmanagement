<?php

session_start();
require_once ('connect.php');

require_once ('checklogin.php');

$pid = $_POST['viewPatient'];

$query = mysqli_query($conn, "SELECT * from patients WHERE id='$pid'");

$result = mysqli_fetch_assoc($query);


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
<div class="jumbotron bg-success">
    <h1><?php echo $result['patient_name'];?></h1>
    <p><?php echo $result['diagnosis'];?></p>
</div>
<div class="container justify-content-center">
    <div class="d-flex flex-row">
    <div class="p-2"><form action="pmodify.php" method="post">
    <button class="btn btn-outline-success" type="submit" value="<?php echo $result['id'];?>" name="patientModify">Modify Patient data</button>
        </form></div>
        <div class="p-2"><form action="panamnesis.php" method="post">
    <button class="btn btn-outline-danger" type="submit" value="<?php echo $result['id'];?>" name="patientAnamnesis">Anamnesis</button>
            </form></div>
        <div class="p-2"><form action="pdiagnosis.php" method="post">
    <button class="btn btn-outline-danger" type="submit" value="<?php echo $result['id'];?>" name="patientDiagnosis">Diagnosis</button>
            </form></div>
        <div class="p-2"><button class="btn btn-outline-danger" type="button" onclick="location.href='patients.php'" name="patientBack">Back to Patients</button></div>
</div>
</body>
</html>

