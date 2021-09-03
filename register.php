<?php 
session_start();

    include("dbcon.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($f_name) && !empty($l_name) && !empty($gender) && !empty($email) && !empty($password) )
        {
            

            $user_id = random_num(20);
            $query = "INSERT into users (user_id, f_name, l_name, gender, email, password) VALUES ('$user_id', '$f_name', '$l_name', '$gender', '$email', '$password')";
            
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else
        {   

            echo "<script>alert('Please enter some valid information...!')</script>";

        }

    }
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>SignUp Page - Secret Dairy</title>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <img src="images/sd.png">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
                <div class="input-group">
                    <input type="text" placeholder="First name" name="f_name" >
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Last name" name="l_name" >
                </div>
                <div class="input-radio">
                    <input type="radio" id="Male" name="gender"  value="M">
                    <label for="Male">Male</label>
                </div>
                <div class="input-radio">
                    <input type="radio" id="Female" name="gender" value="F" >
                    <label for="Female">Female</label>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" >
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" >
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Sign Up</button>
                </div>
                <p class="login-register-text">
                    Have an account? &emsp;<a href="index.php">Login Here</a>
                </p>
            </form>
        </div>
    </body>
</html>