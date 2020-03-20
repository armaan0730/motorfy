
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> Transparent Login form </title>
		<link rel="stylesheet" href="style.css">
		<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
	
	<script>

</script>


	</head>
	<body>
	<div class="cn">
	<div class="loginBox">
		
		<img src="user1.png" class="user">
		<h2>Enter Your Details</h2>
		<br>
		<br>
		<form name="userform" action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
			<input type="text" name = "fname" placeholder="Enter First Name" >
			<br>
			<br>
			<input type="text" name = "sname" placeholder="Enter Second Name">
			<br>
			<br>
			<input type="number" name = "pno" placeholder="Enter Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
			<br>
			<br>
			
			<input type="text" name = "user" placeholder="Enter Username">
<br>
			<br>
			<input type="password" name = "pass" placeholder="Enter Password">
			<br>
			<br>
			
			<input type="submit" name="submit" value="Register">
		</form>
	</div>
	</div>
	<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";
$fname = '';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['submit']))
{
setcookie("fname", $_POST['fname']);
if(!empty($_POST['fname']) && !empty($_POST['sname']) && !empty($_POST['pno']) && !empty($_POST['user']) && !empty($_POST['pass']))
{
	
	$sql = "INSERT INTO user (firstname, secondname, phone_no, username, password)
VALUES ('".$_POST["fname"]."', '".$_POST["sname"]."', '".$_POST["pno"]."','".$_POST["user"]."','".$_POST["pass"]."')";

if ($conn->query($sql) === TRUE) {
   // echo '<p style="color:white ; text-align:center">' ."New record created successfully" .'</p>' .  "<br>" ;
?>
<script>
			app.showToast();
</script>
<?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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

//$conn->close();
}


else
{
	
?>
		<script>
		app8.showToast8();
		</script>
		<?php 

}
}
?>

	</body>
</html>
