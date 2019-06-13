<?php

$mysqli = new mysqli('db4free.net', 'antonibarnabas', 'password', 'antoniftp');

if($mysqli->connect_errno){
    echo $mysqli->connect_error;
    die();
}

?>
