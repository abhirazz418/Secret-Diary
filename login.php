<?php 
session_start();

    include("dbcon.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {   

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) )
        {
            
            $query = "select * from users where email = '$email' limit 1";
            
            $result = mysqli_query($con, $query);
            echo "<script>alert('Hi')</script>";
            if ($result)
            {
                
                if($result && mysqli_num_rows($result) >0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: Index.php");
                        die;
                    }

                }
            }
            echo "<script>alert('wrong username or password! 1')</script>";
        }
        else
        {   

            echo "<script>alert('wrong username or password!')</script>";

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
        <title>Login Page - Secret Dairy</title>
    </head>
    <body>
        <div class="login-container">
            <form action="" method="POST" class="login-email">
                <img src="images/sd.png">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">
                    Don't have an account? &emsp;<a href="register.php">Register Here</a>
                </p>
            </form>
        </div>
    </body>
</html>