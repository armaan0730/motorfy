<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
h3{
text-align:center;
margin-top:10%;
}
.r{
	
	border:2px solid black;
		font-weight:bold;
	outline:none;
	height: 20%;
	width:40%;
	color:black;

	font-size:14px;
	background: white;
	cursor:pointer;
	border-radius:10px;
}
.e{
	
	border:2px solid black;
		font-weight:bold;
		margin-left:10%;
	outline:none;
	height: 20%;
	width:40%;
	color:black;
	font-size:14px;
	background: white;
	cursor:pointer;
	border-radius:10px;
}
.a{
	
	border:2px solid black;
		font-weight:bold;
		margin-left:10%;
	outline:none;
	height: 20%;
	width:40%;
	color:black;
	font-size:14px;
	background: white;
	cursor:pointer;
	border-radius:10px;
}
.c{
	
	border:2px solid black;
		font-weight:bold;
	outline:none;
	height: 20%;
	width:40%;
	color:black;

	font-size:14px;
	background: white;
	cursor:pointer;
	border-radius:10px;
}
.m{
	
	margin-top:10%;
	margin-left:10%;
	

	border:2px solid black;
		font-weight:bold;
	outline:none;
	height: 10%;
	width:82%;
	color:black;

	font-size:14px;
	background: white;
	cursor:pointer;
	border-radius:10px;
}

</style>
</head>

<body>
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$dates=$_GET['d'];
$a=$_SESSION["login_user"];
$b=$_SESSION['car_no'];

//display the title name of user
if ($result = mysqli_query($conn, "SELECT * from user WHERE user_id='$a'")) {
	while ($row = $result->fetch_assoc()) {
   $ba=$row['firstname'];
   $bb=$row['secondname'];
   $bc=$row['phone_no'];
   
	}
}
?><hr><div class="u" onclick=app4.user();><div class="d"><h3><p><?php echo "Welcome ";?><?php echo $ba; ?><?php echo " ";?><?php echo $bb;?></p></h3>


</div>
</div>
<hr>
<div style="margin-left:10%; margin-top:30%;">
<button class="r" onclick="app1.main();">Registered Cars</button>
<button class="e" onclick="app2.explore();">Explore Cars</button>
</div>
<div style="margin-left:10%; margin-top:10%;">
<button class="c" onclick="app3.comp();">Compare Cars</button>
<button class="a" onclick="app1.about();">About Us</button>
</div>
<button class="m" onclick="app1.acc();">Manage Your Account</button>

<?php		
//to get the details for survey notification
if ($result = mysqli_query($conn, "SELECT * from vehicle WHERE user_id='$a'")) {
	while ($row = $result->fetch_assoc()) {
   $na=$row['vehicle_id'];
   $nb=$row['car_name'];
   $nc=$row['car_make'];
   
	if ($result1 = mysqli_query($conn, "SELECT * from record WHERE user_id='$a' and vehicle_id='$na'")) {
	while ($row = $result1->fetch_assoc()) {
	$vd=$row['dorc'];
	}
	$date1= strtotime($vd);
	$date2= strtotime($dates);
	$sub=$date2-$date1;
	$day=$sub/86400;
	$vd=0;
	if($day>30)
	{
			?><script>app1.notifs("<?php echo $nc; ?>","<?php echo $nb; ?>");</script><?php
	}

	}
}
}
?>
</body>
</html>