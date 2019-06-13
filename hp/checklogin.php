<?php

if(isset($_SESSION['loggedin'])) {
}else {
    $error = 'Please log in first!';
    echo "<script type='text/javascript'>alert('$error'); location.href='index.php';</script>";
}


?>