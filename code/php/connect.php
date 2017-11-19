<?php
//credentials for connecting to your database
$host = 'localhost'; //database host
$user = 'root'; //database username
$pass = NULL; //database password
$dbname = 'users'; //database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: ", mysqli_connect_error());
    die();
}
?>