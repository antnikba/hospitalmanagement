<?php

session_start();
require_once ('connect.php');

require_once ('checklogin.php');

require_once ('getuserinfo.php');

if(isset($_POST['anamnesisModify'])){
    $replace = "UPDATE `patients` SET anamnesis='{$_POST['anamnesisModify']}' WHERE id={$_POST['sendInfo']}";
    if(mysqli_query($conn, $replace)){
        $error = 'Anamnesis updated successfully!';
        echo "<script type='text/javascript'>alert('$error'); location.href='patients.php';</script>";
    }else{
        $error = 'Unexpected error, while updating the anamnesis. Please contact with an administrator.';
        echo "<script type='text/javascript'>alert('$error'); location.href='home.php';</script>";
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
    <?php include('bootstrap.php');?>
</head>
<body>
<?php include ('header.php');?>
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
