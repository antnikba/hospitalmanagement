<?php

session_start();
require_once ('connect.php');

require_once ('checklogin.php');

require_once ('getuserinfo.php');

$pid = $_POST['viewPatient'];

$query = mysqli_query($conn, "SELECT * from patients WHERE id='$pid'");

$result = mysqli_fetch_assoc($query);


?>


<!DOCTYPE html>

<html>
<head>
    <title>VENOM HMS</title>
    <?php include('bootstrap.php');?>
</head>
<body>
<?php include('header.php');?>
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

