<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_register_pure_coding";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con)
{
    die("failed to connect!");
}

?>