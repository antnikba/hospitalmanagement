<?php

session_start();

if(isset($_SESSION['loggedin'])) {
    if($_SESSION['loggedin'] == true){

    }
}else {
    $error = 'Please log in first!';
    echo "<script type='text/javascript'>alert('$error'); location.href='index.php';</script>";
}


?>