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
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="jumbotron bg-success">
    <h1>Modify Patient data</h1>
    <p><?php echo $result['patient_name'];?></p>
</div>
<div class="container-fluid bg-success">
    <form action="modify.php" method="post">
    <label for="name">Patient name:</label>
    <input type="text" class="form-control" id="name" value="<?php echo $result['patient_name'];?>" />
    <label for="name">Born On</label>
    <input type="date" class="form-control" id="bornon" value="<?php echo $result['bornon'];?>" />
        <button type="submit" class="btn btn-danger" name="go">Add</button>
    </form>



    <form action="patientview.php" method="post">
        <button type="submit" class="btn btn-danger" name="viewPatient" value="<?php echo $patientid;?>">Back</button>
    </form>
</div>
</body>
</html>
