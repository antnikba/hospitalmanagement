<?php

//MySQLi

$host = 'remotemysql.com';
$uname = 'ngDrEjUvVE';
$pass = 'SJJuXxQSAO';
$database = 'ngDrEjUvVE';

$conn = mysqli_connect($host, $uname, $pass);

$db = mysqli_select_db($conn, $database);

if (mysqli_connect_errno() )
{
    echo 'Failed to connect to MySQLi database: ' . mysqli_connect_error();
}

?>
