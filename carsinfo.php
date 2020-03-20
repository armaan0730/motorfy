<html>
<head>
	<style>
		body{
			
			background-size: 100% 100%;
			font-family: libya;
			background-color: white;
			
		}


	</style>
<body>
	<?php
	
	$ab=$_POST['cname'];
?>	

<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'motorfy';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql="select * from cars where car_name ='$ab'";
$result = mysqli_query($db, $sql) or die("error".mysqli_error($db));

while($row=$result->fetch_assoc()) {
	$a=$row['car_engine'];
	$b=$row['fuel_efficiency'];
	$c=$row['braking_system'];
	$d=$row['wheels_&_steering'];
	$e=$row['performance'];
	$f=$row['Transmission(gears & clutch type)'];
	$g=$row['Suspension(Front & Rear)'];
	$h=$row['Seating Capacity'];
	$i=$row['Dimensions(length,width,height)'];
	$j=$row['picture'];
}
?><img src="<?php echo  $j; ?>" height=250px" width="400px"><br>
<?php echo $_POST['cmake'];
echo " ";
	echo $_POST['cname']; ?>
<p><br>Engine :<?php echo $a;
?></p><br> Fuel Efficiency : <?php echo $b;
?><p><br> Braking System : <?php echo $c;
?></p><br> Wheels & Steering : <?php echo $d;
?><p><br> Perfomance : <?php echo $e;
?></p><br> Transmission(gears & clutch type) : <?php echo $f;
?><p><br> Suspension(Front & Rear) : <?php echo $g;
?></p><br> Seating Capacity : <?php echo $h;
?><p><br> Dimensions(length,width,height) : <?php echo $i;



?><br>
</body>
</html>