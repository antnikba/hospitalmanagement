<?php
session_start();
require_once('connect.php');


require_once ('checklogin.php');


$patientid = $_POST['patientModify'];

$query = mysqli_query($conn, "SELECT * from patients WHERE id='$patientid'");

$result = mysqli_fetch_assoc($query);



?>

<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS</title>
    <link href="stylesheet/patients.css" rel="stylesheet" type="text/css" />
    <?php include('bootstrap.php');?>
</head>
<body>
<div class="jumbotron bg-success">
    <h1>Modify Patient data</h1>
    <p><?php echo $result['patient_name'];?></p>
</div>
<div class="container-fluid bg-success">
    <form action="modify.php" method="post">
    <label for="name">Patient name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['patient_name'];?>" />
    <label for="name">Born On</label>
    <input type="date" class="form-control" id="bornon" name="bornon" value="<?php echo $result['bornon'];?>" />
        <button type="submit" class="btn btn-danger" name="go" value="<?php echo $patientid?>">Add</button>
    </form>



    <form action="patientview.php" method="post">
        <button type="submit" class="btn btn-danger" name="viewPatient" value="<?php echo $patientid;?>">Back</button>
    </form>
</div>
</body>
</html>
