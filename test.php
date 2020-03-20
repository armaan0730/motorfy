<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['fname']) && !empty($_POST['fname']))
{
	$sql = "INSERT INTO user (firstname, secondname, phone_no, no_ofcars, username, password)
VALUES ('".$_POST["fname"]."', '".$_POST["sname"]."', '".$_POST["pno"]."','".$_POST["noc"]."','".$_POST["user"]."','".$_POST["pass"]."')";

if ($conn->query($sql) === TRUE) {
    echo '<p style="color:white ; text-align:center">' ."New record created successfully" .'</p>' .  "<br>" ;
?>
<script>
			app.showToast();
</script>
<?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else
{
	
?>
		<script>
		app8.showToast8();
		</script>
		<?php 

}
if ($result = mysqli_query($conn, "SELECT user_id FROM user WHERE username='".$_POST["user"]."'")) {
	while ($row = $result->fetch_assoc()) {
   
	$ab=$row['user_id'];
}
}

 session_start();
// Store Session Data
$_SESSION['login_user']=$ab;  // Initializing Session with value of PHP Variable
$a=$_SESSION['login_user'];
echo $a ;

$conn->close();


?>

<html>
<body>
<!--<button  onclick="window.location.href='http://192.168.43.49/www/vehicle.php';">add car</button>
--></body>
</html>