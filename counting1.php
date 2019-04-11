<?php
$q = $_REQUEST["q"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE counting SET counter=counter + 1 WHERE party='$q'";

$conn->query($sql);
$conn->close();
?>