<?php

session_start();
require_once ('checklogin.php');
require_once ('connect.php');
require_once ('getuserinfo.php');

if($_SESSION['rank'] == 4){
?>
<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS - ADMINPANEL</title>
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include ('header.php');?>
<div class="jumbotron bg-warning">
    <h1>ADMINPANEL</h1>
    <p>Welcome <?php echo $_SESSION['user_name'] ; ?></p>
</div>
<div class="jumbotron bg-info">
    <button class="btn btn-warning" onclick="location.href=`register.php`">REGISTER A NEW USER</button>
    <button class="btn btn-info" onclick="location.href=`home.php`">GET BACK TO HOME SCREEN</button>
</div>
</body>
</html>
<?php
}else{
    header("Location: home.php");
}


?>