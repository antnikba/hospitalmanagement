<?php
require_once ('checklogin.php');
require_once ('connect.php');


$update = "UPDATE `patients` SET patient_name='{$_POST['name']}' WHERE id='{$_POST['go']}'";
$update2 = "UPDATE `patients` SET bornon='{$_POST['bornon']}' WHERE id='{$_POST['go']}'";
if(mysqli_query($conn, $update)){
    if(mysqli_query($conn, $update2)) {
        header("Location:patients.php");
    }
}else{
    header("Location:pmodify.php");
}