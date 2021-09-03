
<?php 
session_start();

    include("dbcon.php");
    include("functions.php");

    if($user_data = check_login($con))
    {
        $user_id = $user_data['user_id'];
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $diary = $_POST['diary'];

            if(!empty($diary) && !empty($user_data['user_id']))
            {
                $query = "UPDATE table SET diary=".$diary."WHERE user_id =".$user_data['user_id'];
                mysqli_query($con, $query);
                header("Location: index.php");
                die;
            }
            else
            {   

                header("Location: login.php");
                die;

            }

        }
    else
    {
        header("Location: login.php");
        die;
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style1.css">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Secret Dairy</title>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" class="post">
                <div class="input-group">
                    <button class="btn"><a href="logout.php">Logout</a></button>
                </div>
                <p>Write the Secret...</p>
                <hr>
                <div class="post_area">
                    <textarea name="diary" id="" ></textarea>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn-1">Save</button>
                </div>
            </form>
        </div>
    </body>
</html><?php
    }
    ?>