<?php

session_start();
require_once ('connect.php');
require_once ('checklogin.php');

    if(isset($_POST['uname'])) {

        $query = mysqli_query($conn, "SELECT * FROM users WHERE name='{$_POST['uname']}'");

        $numrows = mysqli_num_rows($query);

        $password = password_hash($_POST['upass'], PASSWORD_BCRYPT);

        if ($numrows == 1) {
            $message = "This username is exsists!!";
            echo "<script type='text/javascript'>alert('$message'); location.href='register.php';</script>";
        } else {
            $insert = "INSERT INTO `users` (id, name, password, fullname, hospitalid, workid, level, departmentid)
                VALUES (NULL, '{$_POST['uname']}', '$password', '{$_POST['ufname']}', '{$_POST['uhospital']}', 8, '{$_POST['urank']}', '{$_POST['udepart']}')";
            if (mysqli_query($conn, $insert)) {
                echo "New record created successfully";
                header("Location: admin.php");
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        REGISTER A NEW USER
    </title>
    <link href="stylesheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="stylesheet/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <script src="stylesheet/js/bootstrap.min.js"></script>
    <script src="stylesheet/jquery-1.11.1.js"></script>
    <script src="stylesheet/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="jumbotron bg-info">
    <h1>REGISTER A NEW USER</h1>
</div>
<form action="register.php" method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="asdf" name="uname" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput2" name="upass" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">Full name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="asdf" name="ufname" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Rank</label>
        <select class="form-control" id="exampleFormControlSelect1" name="urank">
            <option value="1">Nurse</option>
            <option value="2">Doctor</option>
            <option value="3">Department manager</option>
            <option value="4">Administrator</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Hospital</label>
        <select multiple class="form-control" id="exampleFormControlSelect2" name="uhospital">
            <option value="1">Test Hospital</option>
            <option value="2">Jahn Ferenc Dél-Pesti KH.</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Department</label>
        <select class="form-control" id="exampleFormControlSelect2" name="udepart">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-danger">Add!</button>
        <button type="button" class="btn btn-danger" onclick="location.href='home.php'">BACK!</button>
    </div>
</form>
</body>
</html>

