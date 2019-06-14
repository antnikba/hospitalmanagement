<?php
session_start();
require_once ('connect.php');
require_once ('checklogin.php');


$query = mysqli_query($conn, "SELECT * from users WHERE id='{$_SESSION['id']}'");


if (mysqli_num_rows($query) == 1) {
    while ($result = mysqli_fetch_assoc($query)) {
        $_SESSION['user_name'] = $result['fullname'];
        $_SESSION['hospital_id'] = $result['hospitalid'];
        $_SESSION['work_id'] = $result['workid'];
        $_SESSION['rank'] = $result['level'];
    }

}

?>
