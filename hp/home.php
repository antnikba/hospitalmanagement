<?php
session_start();
    require_once ('connect.php');
    require_once ('checklogin.php');
    require_once ('getuserinfo.php');


    $query2 = mysqli_query($conn, "SELECT * from hospitals WHERE id='{$_SESSION['hospital_id']}'");

    if(mysqli_num_rows($query2) == 1) {
        while ($result2 = mysqli_fetch_assoc($query2)) {
            $hospital_name = $result2['hospital_name'];
            $hospital_logo = $result2['logourl'];
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
    <link href="stylesheet/homecss.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php include ('header.php');?>
<div class="container">
    <div class="jumbotron bg-warning">
        <h1><?php echo $hospital_name;?></h1>
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
