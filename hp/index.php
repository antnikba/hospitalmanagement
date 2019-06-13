<?php

    require_once ('connect.php');

    session_start();

    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] == true){
            $query = mysqli_query($conn, "SELECT * FROM users where id='{$_SESSION['id']}'");
            if(mysqli_affected_rows($conn) == 1){
                while($result = mysqli_fetch_assoc($query)){
                    $user_name = $result['fullname'];
                }
            }
            $error = 'You are alredy logged in! Welcome: '. $user_name .'.';
            echo "<script type='text/javascript'>alert('$error'); location.href='home.php';</script>";
    }}

?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN - Venom HMS</title>
    <link href="stylesheet/logincss.css" rel="stylesheet" type="text/css">
</head>
<body>
<form class="loginform" action="validation.php" method="post">
    <h1 id="header">LOGIN - Venom Hospital Management System</h1>
    <h1>USERNAME</h1>
    <input type="text" name="username" placeholder="Enter your username">
    <h1>PASSWORD</h1>
    <input type="password" placeholder="Enter your password" name="password">
    <input type="submit" value="LOGIN" name="submit">
</form>
</body>
</html>