<?php

session_start();
session_destroy();
$error = 'Successfully logged out!';
echo "<script type='text/javascript'>alert('$error'); location.href='index.php';</script>";

?>
