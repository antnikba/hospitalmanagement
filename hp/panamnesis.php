<?php

session_start();
require_once ('connect.php');

require_once ('checklogin.php');

if(isset($_POST['anamnesisModify'])){
    $replace = "UPDATE `patients` SET anamnesis='{$_POST['anamnesisModify']}' WHERE id={$_POST['sendInfo']}";
    if(mysqli_query($conn, $replace)){
        header("Location:patients.php");
    }else{
        header("Location:panamnesis.php");
    }
}


// LOOKING FOR THE PATIENT
$pid = $_POST['patientAnamnesis'];

$query = mysqli_query($conn, "SELECT * from patients WHERE id='$pid'");

$result = mysqli_fetch_assoc($query);





?>
<!DOCTYPE html>
<html>
<head>
    <title>Anamnesis - VENOM HMS</title>
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="jumbotron bg-info">
    <h1>Modify anamnesis</h1>
    <p>Anamnesis of <?php echo $result['patient_name'];?></p>
</div>
<form class="bg-danger" action="panamnesis.php" method="post">
    <div class="form-group">
        <label for="anamnesisModify">Anamnesis</label>
        <textarea class="form-control" id="anamnesisModify" name="anamnesisModify" rows="5"><?php echo $result['anamnesis'];?></textarea>
    </div>
    <div>
        <button type="submit" name="sendInfo" class="btn btn-warning" value="<?php echo $result['id'];?>">Modify!</button>
        <button type="button" name="sendBack" class="btn btn-info" onclick="location.href='patients.php'">Go back!</button>
    </div>
</form>
</body>
</html>
