<?php
session_start();
require_once ('connect.php');
$query = mysqli_query($conn, "SELECT * from users WHERE id='{$_SESSION['id']}'");

if(isset($_SESSION['loggedin'])) {
}else {
    $error = 'Please log in first!';
    echo "<script type='text/javascript'>alert('$error'); location.href='index.php';</script>";
}


if(mysqli_num_rows($query) == 1) {
    while ($result = mysqli_fetch_assoc($query)){
        $user_name = $result['fullname'];
        $hospital_id = $result['hospitalid'];
        $work_id = $result['workid'];
        $rank = $result['level'];
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
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="jumbotron bg-warning">
    <h1>Add a patient</h1>
<form action="addpatientsql.php" method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Patient name</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your patients name">
    </div>
    <div class="form-group">
        <label for="example-date-input" class="col-2 col-form-label">Date of birth</label>
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Anamnesis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea2">Current condition</label>
        <textarea class="form-control" id="exampleFormControlTextarea2" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea3">Current medications</label>
        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea3">Diagnosis</label>
        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-danger">Add!</button>
    </div>
</form>
</div>
</body>
</html>
