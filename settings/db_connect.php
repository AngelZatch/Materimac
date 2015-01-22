<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "materimac_test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo("connected successfully !");

?>