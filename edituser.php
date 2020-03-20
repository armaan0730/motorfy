<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
button{
background-color:white;
color:black;
font-weight:bold;
margin-top:10%;
font-size:20px;
}
td, th{
padding:10px;
}
.l
{
	border:2px solid black;
		font-weight:bold;
		margin-top:2%;
		margin-left:19px;
	outline:none;
	height: 50px;
	width:150px;
	color:white;
	font-size:14px;
	background: black;
	cursor:pointer;
	border-radius:10px;
}
h2{
text-align:center;
margin-top:30%;
margin-bottom:20%;
}
table{
font-size:20px;
left:0;
right:0;
display:flex;

}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
  transition: 0.3s;
  border:2px solid black;
  border-radius:10px;
  border-color:white;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}
.container {
	
  padding: 2px 16px;
}

	
input[type="text"], input[type="password"], input[type="number"]
{
	padding: 10px;
	border: 2px solid black;
	background: transparent;
	outline:none;
	
	height:50px;
	width:100%;
	color:black;
	font-size: 16px;
	
}


input[type="submit"]
{
	border:2px solid black;
	outline:none;
	height: 50px;
	width:150px;
	margin-top:10%;
	color:white;
	font-weight:bold;
	font-size:14px;
	margin-left:50%;
	background: black;
	cursor:pointer;
	border-radius:10px;
}

</style>
</head>
<body>
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
if ($result = mysqli_query($conn, "SELECT * from user WHERE user_id='$a'")) {
	while ($row = $result->fetch_assoc()) {
   $ba=$row['firstname'];
   $bb=$row['secondname'];
   $bc=$row['phone_no'];
   $bd=$row['no_ofcars'];
	}
}
?>
<!--<button onclick="app2.showToast();"> < Back</button>
--><h2>Update Your Details</h2>
<div class="card">
<!-- <img src="car.png" alt="car icon">
  -->
  <div class="container" >
    <form action="update.php" method="POST">
	First Name :<br>
	<input type="text" name="ufname" value="<?php echo $ba;?>"><br>
	Second Name :<br>
			<input type="text" name = "usname" value="<?php echo $bb;?>">
			<br>
			Phone Number :<br>
			<input type="number" name = "upno" value="<?php echo $bc;?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
			<br>
			
			
	<input type="submit" onclick="app1.showToast();" value="Submit" name="submit">
	</form>
	</div>
  
</div>	
<!--
-->


</body>
</html>