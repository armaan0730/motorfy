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

$car=$_GET['vid'];
$user=$_GET['uid'];
$km = $_GET['km'];
$dent = $_GET['dent'];
$sc = $_GET['sc'];
$noise = $_GET['noise'];
$td = $_GET['td'];
$wb = $_GET['wb'];
$eo = $_GET['eo'];
$serv = $_GET['serv'];
$mile = $_GET['mile'];
$c=$_GET['c'];

$sql1 = "select * from record where vehicle_id = '$car' and user_id='$user'";
$result=mysqli_query($conn, $sql1);
		while ($row = $result->fetch_assoc()) {
		$rid=$row['record_id'];
		}
if($rid<=0)
{
$ls='yes';
}
else{
$ls=$serv;
}	

$sql = "INSERT INTO record (user_id, vehicle_id, km, mileage, engine_oil, wheel_bal, tyre_damage, dent, scratches, car_noise, last_service, dorc)
VALUES ('$user', '$car', '$km','$mile','$eo','$wb','$td','$dent','$sc','$noise','$ls','$c')";

if ($conn->query($sql) === TRUE) {
   // echo '<p style="color:white ; text-align:center">' ."New record created successfully" .'</p>' .  "<br>" ;
 //this stmt is not working -->  ?><!--<script>app3.restartac();</script>--><?php


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
?>