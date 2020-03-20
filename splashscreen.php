<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body{
	background-image:url(startimg.jpg);
	
background-position:center;
                background-attachment:fixed;
				background-size: cover;
				 top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  }
</style>
</head>
<body>

</body>
</html>

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

		if(isset($_SESSION['login_user']))
		{
				?>
				
		<script>
		setTimeout(function(){app4.showToast3()},2000);
		</script>
		<?php
		}
		else
		{
			?>
				
		<script>
		setTimeout(function(){app5.showToast4()},2000);
		</script>
		<?php
		}
	?> 
	