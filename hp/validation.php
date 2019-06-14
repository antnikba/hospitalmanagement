<?php
session_start();
    require_once ('connect.php');


    if(isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $mess = 'Please enter your login credentials!';
            echo "<script type='text/javascript'>alert('$mess'); location.href='index.php';</script>";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = mysqli_query($conn, "SELECT * FROM users WHERE name='$username'");

            while ($result = mysqli_fetch_assoc($query)) {
                $hash = $result['password'];
                if (password_verify($_POST['password'], $hash)) {
                    $_SESSION['loggedin'] = true;

                    $_SESSION['id'] = $result['id'];
                    header('Location:home.php');
                } else {
                    $message = "Incorrect login credentials!!";
                    echo "<script type='text/javascript'>alert('$message'); location.href='index.php';</script>";
                }
            }


        }

    }





?>