<?php
session_start();
    require_once ('connect.php');
    require_once ('checklogin.php');
    require_once ('getuserinfo.php');
?>





<!DOCTYPE html>
<html>
<head>
    <title>VENOM HMS</title>
    <?php include('bootstrap.php');?>
    <link href="stylesheet/homecss.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include ('header.php');?>
<div class="container">
    <div class="jumbotron bg-warning">
        <h1><?php echo $_SESSION['hospital_name'];?></h1>
        <p>You are currently <?php
            if($_SESSION['rank'] >= 3){
                $query = mysqli_query($conn, "SELECT * from patients WHERE doctorid='{$_SESSION['id']}' and hospitalid='{$_SESSION['hospital_id']}'");
                echo 'attending '.mysqli_num_rows($query). ' patient/s';
            }elseif($_SESSION['rank'] < 3){
                $query = mysqli_query($conn, "SELECT * from patients WHERE nurseid='{$_SESSION['id']}' and hospitalid='{$_SESSION['hospital_id']}'");
                echo 'nurseing '.mysqli_num_rows($query). ' patient/s';
            }
            ?></p>
    </div>
</div>

</body>
</html>
