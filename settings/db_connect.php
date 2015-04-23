<?php
$servername = "88.164.174.21";
$username = "Andreas";
$password = "andreas22";
$dbname = "materimac";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>