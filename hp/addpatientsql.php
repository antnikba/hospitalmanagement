<?php

session_start();
require_once ('connect.php');

$query = mysqli_query($conn, "SELECT * from users WHERE id='{$_SESSION['id']}'");


if (mysqli_num_rows($query) == 1) {
    while ($result = mysqli_fetch_assoc($query)) {
        $user_name = $result['fullname'];
        $hospital_id = $result['hospitalid'];
        $work_id = $result['workid'];
        $rank = $result['level'];
        $department = $result['departmentid'];
    }

}

$pname = $_POST['pname'];
$pbirth = $_POST['pbirth'];
$panam = $_POST['panam'];
$pdiag = $_POST['pdiag'];
$pmed = $_POST['pmed'];
$pcon = $_POST['pcon'];
$pmed = $_POST['pmed'];

$currentdate = date('Y-m-d');

echo $pname;
echo $pbirth;
echo $panam;
echo $pdiag;
echo $pmed;
echo $pcon;
echo $pmed;
echo $currentdate;

$insert = "INSERT INTO patients(patient_name, diagnosis, bornon, anamnesis, inthehospital, hospitalid, departmentid, nurseid, alive, medication, condition)
VALUES ('$pname','$pdiag','$pbirth','$panam','$currentdate', '$hospital_id','$department', 0, 1, '$pmed', '$pcon')";

?>