<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
if($_POST['Submit']=="Submit")
{
$fname=$_POST['fullname'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$password1=$_POST['password'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$dis=$_POST['district'];
$cons=$_POST['constituency'];
$mobile=$_POST['mobile'];
$party="SamajwadiParty";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO candidate (fullname,dob,email,password,address,gender,image,district,constituency,mobile,party)
VALUES('$fname','$dob','$email','$password1','$address','$gender','$file','$dis','$cons','$mobile','$party')";

if ($conn->query($sql) === TRUE) {
    echo '<script>	window.alert("ThankYou for registration");
window.location.href = "index.htm";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

}
?>