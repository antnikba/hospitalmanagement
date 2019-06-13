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


$insert = "INSERT INTO `patients` (`id`, `patient_name`, `diagnosis`, `bornon`, `doctorid`, `anamnesis`, `inthehospital`, `hospitalid`, `departmentid`, `nurseid`, `alive`, `medication`, `condition`)
 VALUES (NULL, '$pname', '$pdiag', '$pbirth', '{$_SESSION['id']}', '$panam', '$currentdate', '$hospital_id', '$department', '0', '1', '$pmed', '$pcon')";


if (mysqli_query($conn, $insert)) {
    echo "New record created successfully";
    header("Location: patients.php");
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}


?>