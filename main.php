<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
	background-color:white;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
  transition: 0.3s;
  border:2px solid black;
  border-radius:10px;
  border-color:white;
  background-color:rgb(10,0,0);
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}
img{
height:20%;
width:40%;
margin-top:-10%;
position:absolute;

}
.container {
  padding: 2px 16px;
  
}
p{
font-size:20px;

}
.u{
	margin-top:20%;
	margin-bottom:15%;
margin-left:0;

}
.d{
margin-left:50%;
}
button{
padding:10px 13px 10px 13px;
border-radius:400px;
font-size:20px;
font-weight:bold;
position: sticky;
bottom:4%;
left:80%;
}
.nc{
opacity:0.4;
text-align:center;
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

$a=$_SESSION["login_user"];
if ($result = mysqli_query($conn, "SELECT * from user WHERE user_id='$a'")) {
	while ($row = $result->fetch_assoc()) {
   $ba=$row['firstname'];
   $bb=$row['secondname'];
   $bc=$row['phone_no'];
   
	}
}
?><div class="u" ><img src="user2.png"><div class="d"><h3><p><?php echo $ba; ?><?php echo " ";?><?php echo $bb;?></p></h3>
<p><?php echo $bc; ?></p>	

</div>
</div>
<hr>
<h3>Your Registered Cars</h3>
<hr>
<br>
<?php

if ($result = mysqli_query($conn, "SELECT * from vehicle WHERE user_id='$a'")) {
	$o=0;
	while ($row = $result->fetch_assoc()) {
   $aa=$row['car_no'];
	$ab=$row['vehicle_id'];
	$ac=$row['car_name'];
	$ad=$row['car_make'];
		
		?>
		
		
	<div class="card" value="<?php echo $ab; ?>" onclick=abc(<?php echo "\"$ab\""; ?>)>
<!-- <img src="car.png" alt="car icon">
  -->
  <div class="container" >
    <h4><b><?php echo $ad ?><?php echo " " ?><?php echo $ac ?></b></h4> 
    <p id="head"><?php echo $aa ?></p> 
  </div>
  
</div>	
	<br>
  <br>
	

	<?php
	$o++;}
}
//update the no_ofcars
$sqlo = "update user set no_ofcars = $o where user_id='$a'";

if ($conn->query($sqlo) === TRUE) {
	
}

?>


<button onclick=app3.showToast6();>+</button>
<script>
function abc(carId) {
app6.showToast5(carId);
//alert(carId);
}

</script>

<?php
if ($result = mysqli_query($conn, "SELECT * from vehicle WHERE user_id='$a'")) {
	while ($row = $result->fetch_assoc()) {
   $na=$row['vehicle_id'];
	}
	
	if($na == 0)
	{?>
		<script>
		
		app2.showToast2();
		</script>
		<?php }
}?>
</body>
</html> 

