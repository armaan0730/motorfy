<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$a=$_SESSION['login_user'];

$sqlo = "update user set firstname = '".$_POST['ufname']."', secondname= '".$_POST['usname']."', phone_no= '".$_POST['upno']."' where user_id='$a'";

if ($conn->query($sqlo) === TRUE) {
	echo "done";
}?>
