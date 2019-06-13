<?php
session_start();
    require_once ('connect.php');


    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin' == true]){
            header('Location:home.php');
        }
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $mess = 'Please enter your login credentials!';
            echo "<script type='text/javascript'>alert('$mess'); location.href='index.php';</script>";
        }

        else

        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = mysqli_query($conn, "SELECT * FROM users WHERE name='$username' AND password='$password'");
            $rows = mysqli_affected_rows($conn);

            while($result = mysqli_fetch_assoc($query)){
                $user_id = $result['id'];
                $_SESSION['id'] = $user_id;
            }

            if($rows == 1){
                $_SESSION['loggedin'] = true;
                header('Location:home.php');
            } else{
                $message = "Incorrect login credentials!!";
                echo "<script type='text/javascript'>alert('$message'); location.href='index.php';</script>";
            }
        }
    }





?>