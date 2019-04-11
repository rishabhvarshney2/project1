<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
if($_POST['Submit']=="Submit")
{
$user=$_POST['user'];
$pass=$_POST['pass'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT mobile, password FROM candidate";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$count=1;

    // output data of each row
    while($row = $result->fetch_assoc()) {
       if ( $row["mobile"] == $user && $row["password"] == $pass){
		   $count++;
		   header("Location:candi.html");
    }
}
if ($count==1){
	echo "Voter id Or Password Mismatched";
}
} else {
    echo "Database is empty";
}
$conn->close();
}
?>