<?php
session_start();
require_once ('connect.php');
require_once ('checklogin.php');
require_once ('getuserinfo.php');


if(isset($_POST['diagnosisModify'])){
    $modify = "UPDATE `patients` SET diagnosis='{$_POST['diagnosisModify']}' WHERE id='{$_POST['sendID']}'";
    if(mysqli_query($conn, $modify)){
        $error = 'Diagnosis updated successfully!';
        echo "<script type='text/javascript'>alert('$error'); location.href='patients.php';</script>";
    }else{
        $error = 'Unexpected error, while updating the diagnosis. Please contact with an administrator.';
        echo "<script type='text/javascript'>alert('$error'); location.href='home.php';</script>";
    }
}

$id=$_POST['patientDiagnosis'];

$query = mysqli_query($conn, "SELECT * from `patients` WHERE id='$id'");

$result = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS</title>
    <?php include('bootstrap.php'); ?>
</head>
<body>
<?php include('header.php');?>
<div class="jumbotron bg-info">
    <h1>Diagnosis of <?php echo $result['patient_name'];?></h1>
</div>
<form class="jumbotron bg-danger" method="post" action="pdiagnosis.php">
    <div class="form-group">
        <label for="diagnosisModify">Diagnosis</label>
        <textarea class="form-control" id="diagnosisModify" name="diagnosisModify" rows="5"><?php echo $result['diagnosis'] ;?></textarea>
    </div>
    <div>
        <button class="btn btn-warning" name="sendID" type="submit" value="<?php echo $result['id'];?>">Modify</button>
        <button class="btn btn-warning" name="sendBACK" type="button" onclick="location.href='patients.php'">Back</button>
    </div>
</form>
</body>
</html>
