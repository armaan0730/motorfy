
<html>
	<head>
		<title> Transparent Login form </title>
				<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="style1.css">
		<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
	
	<script>
function showT()
{
		
		app3.signup();
}

</script>

	</head>
	<body style="background-color:white">
	<div class="loginBox">
		<img src="user1.png" class="user">
		
		<h2>Login</h2>
		<br>
		<form name="userform" action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
			
			<input type="text" name = "user" placeholder="Username">
			
			<input type="password" name = "pass" placeholder="Password">
			<br>
			<br>
			

			<input type="submit" name="submit" value="LOGIN">

		</form>
	</div>
		<?php

		error_reporting(0);

if(isset($_POST['submit'])) 
{ 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "motorfy";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	if(isset($_POST['user']) && isset($_POST['pass']) && !empty($_POST['user']) && !empty($_POST['pass']))
	{
		$sql= "SELECT user_id from user WHERE username='".$_POST['user']."' AND password='".$_POST['pass']."'";
		$result=mysqli_query($conn, $sql);
		while ($row = $result->fetch_assoc()) {
   
	$ab=$row['user_id'];
	session_start();

	$_SESSION['login_user']=$ab; 
}
// Store Session Data
$a=$_SESSION['login_user'];
echo $a ;
		if ($a>0)
		{
		?>
		<script>
		app.showToast();
		</script>
		<?php 
		 
		}
		else
	{?>
		<script>
		app1.showToast1();
		</script>
		<?php
	}

	}
else
{

	?>
	<script>
		app2.showToast2();
		</script>
	<?php
}
}
?>

	</body>
</html>