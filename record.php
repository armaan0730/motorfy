<html>
<head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
	background-color:white;
}
input[type="submit"]
{
	border:2px solid black;
		font-weight:bold;
	outline:none;
	height: 60px;
	width:90%;
	margin-left:5%;
	
	color:black;
	font-size:14px;
	background: red;
	cursor:pointer;
	border-radius:10px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
  transition: 0.3s;
  border:2px;
  background-color:red;
  border-radius:10px;
  border-color:white;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}
img{
height:170px;
width:100%;
}
.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
<?php
error_reporting(0);
session_start();
$dates=$_GET['d'];
$carId = $_GET['carid'];
$_SESSION["car_no"] = $carId; 
$login = $_SESSION['login_user'];
//echo $carId ;
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "motorfy";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$gb="";
	$bb="";
	$bc="";
	$bd="";
	$gc="";
	$ga="";
	$gd="";
	
	//vehicle information
$sql = "select * from vehicle where vehicle_id = '$carId'";
$result=mysqli_query($conn, $sql);
		while ($row = $result->fetch_assoc()) {
		
		$ab=$row['vehicle_id'];
		$ac=$row['car_make'];
		$ad=$row['car_name'];
		$ae=$row['car_no'];
		$af=$row['dop'];
		$ag=$row['chasis_no'];
		$ah=$row['modific_com'];
		//echo $ab;
		}
		
   //reminders
$sqla = "select * from record where vehicle_id = '$carId'";
$result=mysqli_query($conn, $sqla);
		while ($row = $result->fetch_assoc()) {
		
		$ba=$row['vehicle_id'];
		$bb=$row['km'];
		$bc=$row['mileage'];
		$bd=$row['engine_oil'];
		$be=$row['wheel_bal'];
		$bf=$row['tyre_damage'];
		$bg=$row['dent'];
		$bh=$row['scratches'];
		$bi=$row['car_noise'];
		
		
		
		//echo $ab;
		}
	//gaugeview to check if data exist
$sqlb = "select * from record where vehicle_id = '$carId' ";
$result=mysqli_query($conn, $sqlb);
		while ($row = $result->fetch_assoc()) {
		
		$ga=$row['record_id'];
		$gb=$row['km'];
		
		
		//echo $ga;
		}

//to get the recent serviced km
$sqlb = "select km from record where vehicle_id = '$carId' AND last_service = 'yes' ";
$result=mysqli_query($conn, $sqlb);
		while ($row = $result->fetch_assoc()) {
		
		
		$gc=$row['km'];
		
		
		//echo $ga;
		}

$gd=$gb-$gc;
		
		if($ga > 0)
		{
			if($gd > 0 && $gd <= 5000)
			{
				?>
			<br>
			<br>
			
			<img src=gaugeviewgood.jpg>
			<br>
			<br>
			<br>
		
			<?php
			}
			else if($gd > 5000 && $gd <=10000)
			{
				?>
			<br>
			<br>
			
			<img src=gaugeviewavg.jpg>
			<br>
			<br>
			<br>
		
			<?php
			}
			else if($gd > 10000)
			{
				?>
			<br>
			<br>
			
			<img src=gaugeviewbad.jpg>
			<br>
			<br>
			<br>
		
			<?php
			}
			else
			{
				?>
			<br>
			<br>
			
			<img src=gaugeviewgood.jpg>
			<br>
			<br>
			<br>
		
			<?php
			}
			}
		
		else
		{?>
			<br>
			<br>
			
			<img src=gaugeviewnoinfo.jpg>
			<br>
			<br>
			<br>
		<?php
		}
		//if there are no records for a new car then the survey display
		$r="p";
 if($result1 = mysqli_query($conn, "SELECT * from record WHERE vehicle_id='$carId'")) {
	while ($row = $result1->fetch_assoc()) {
   $r=$row['vehicle_id'];
   $s=$row['dorc'];
   $t=$row['km'];
	}
	$dates1=strtotime($s);
	$dates2=strtotime($dates);
	$subs=$dates2-$dates1;
	$days=$subs/86400;
 }
 
 if($r=="p")
 {
	 ?><script>app.showToast();</script><?php
 }
 elseif($days>=30)
 {
  ?><script>app.showToast1(<?php echo $t; ?>);</script><?php
 }
 else{}
 
?>

<div class="card">

  <div class="container" style="background-color:red; border-radius:10px" >
    <h4 style="background-color:red"><b style="background-color:red"><?php echo $ac ?><?php echo " " ?><?php echo $ad ?></b></h4> 
    <p style="background-color:red">Vehicle Number : <?php echo $ae ?></p>
    <p style="background-color:red">Date of Purchase : <?php echo $af ?></p>
    <p style="background-color:red">Chasis Number : <?php echo $ag ?></p>
    <p style="background-color:red">Modifications : <?php echo $ah ?></p>
	
  </div>
  
</div>	
<br>
<br>

<div class="card">

  <div class="container" >
    <h4><b>Recent Information</b></h4>
	<p>Kilometers: <?php echo $bb ?> km</p>
	<p>Mileage: <?php echo $bc ?></p>
	<p>Engine Oil : <?php echo $bd ?></p>
	<p>Wheel Balance: <?php echo $be ?></p>
	<p>Tyre Damage : <?php echo $bf ?></p>
	<p>Dents : <?php echo $bg ?></p>
	<p>Scratches : <?php echo $bh ?></p>
	<p>Car Noise : <?php echo $bi ?></p>
	
<br>
	
   
	
  </div>
  
</div>	
<br>
<form method="post"> 
        <input type="submit" name="dc"
                value="DELETE CAR"/> 
				</form>	
				<?php
				
		$temp=$carId;

         if(isset($_POST['dc'])) { 
				?><script>app.endac();</script><?php
if ($result = mysqli_query($conn, "select * from record where vehicle_id='$carId'")) {
		while ($row = $result->fetch_assoc()) {
			$rcid=$row['record_id'];
		}
		if($rcid>=1){
		$sql = "DELETE vehicle , record  FROM vehicle  INNER JOIN record WHERE vehicle.vehicle_id='$carId' and record.vehicle_id='$temp'";		 
		$result=mysqli_query($conn, $sql);
			while ($row = $result->fetch_assoc()) {}
		}
		elseif($rcid==0)
		{
		$sqla = "DELETE from vehicle where vehicle_id='$temp'";		 
		$result=mysqli_query($conn, $sqla);
			while ($row = $result->fetch_assoc()) {}
		}
		else{}
		 }
		 }?>
        

<script>
window.onload=function()
{
	var userid = <?php echo $login; ?>;
	var vehicle = <?php echo $carId; ?>;
	app1.setId(userid,vehicle);
}
</script>
<script>
function hi(){
  //setTimeout(function(){ app.showToast(); }, 1000);
}
</script>


</body>
</html>