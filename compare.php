<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		table{
  border: 1px solid black;
  border-collapse: collapse;
  font-family: arial;
   table-layout: fixed;
    width: 100%;
 
}
th
{
	padding-top:20px;
	background-color:rgb(240,240,240);
	padding-bottom:20px;
}
td{
	padding-top:10px;
	padding-bottom:10px;
	text-align:center;
}
</style>
</head>
<body>
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
$a=$_POST['cmake'];
$b=$_POST['cname'];
$c=$_POST['cmake1'];
$d=$_POST['cname1'];
?>
	<?php
$sql="select * from cars where car_name ='$b'";
$result = mysqli_query($db, $sql) or die("error".mysqli_error($db));

while($row=$result->fetch_assoc()) {
	$c1=$row['car_engine'];
	$c2=$row['fuel_efficiency'];
	$c3=$row['braking_system'];
	$c4=$row['wheels_&_steering'];
	$c5=$row['performance'];
	$c6=$row['Transmission(gears & clutch type)'];
	$c7=$row['Suspension(Front & Rear)'];
	$c8=$row['Seating Capacity'];
	$c9=$row['Dimensions(length,width,height)'];
	$c10=$row['picture'];
}


$sql1="select * from cars where car_name ='$d'";
$result = mysqli_query($db, $sql1) or die("error".mysqli_error($db));

while($row=$result->fetch_assoc()) {
	$d1=$row['car_engine'];
	$d2=$row['fuel_efficiency'];
	$d3=$row['braking_system'];
	$d4=$row['wheels_&_steering'];
	$d5=$row['performance'];
	$d6=$row['Transmission(gears & clutch type)'];
	$d7=$row['Suspension(Front & Rear)'];
	$d8=$row['Seating Capacity'];
	$d9=$row['Dimensions(length,width,height)'];
	$d10=$row['picture'];
}
?>
<table border="1px" >
	<tr>
		
		<th><?php echo $a; ?><?php echo " "?><?php echo $b?></th>
		

	    <th><?php echo $c; ?><?php echo " "?><?php echo $d?></th>
		
	</tr>
	<tr>
		
		<td><img src="<?php echo  $c10; ?>" height=15%" width="100%"></td>
		<td><img src="<?php echo  $d10; ?>" height=15%" width="100%"></td>
	</tr>

	<tr>
		<th colspan="2">Car Engine</th>
		</tr>
		<tr>
		<td><?php echo $c1?></td>
		<td><?php echo $d1?></td>
	</tr>
 
 <tr>
		<th colspan="2">Fuel Efficiency</th>
		</tr>
		<tr>
		<td><?php echo $c2?></td>
		<td><?php echo $d2?></td>
	</tr>
<tr>
		<th colspan="2">Braking System</th>
		</tr>
		<tr>
		
		<td><?php echo $c3?></td>
		<td><?php echo $d3?></td>
	</tr>

	<tr>
		<th colspan="2">Wheels & Steering</th>
		</tr>
		<tr>
		
		<td><?php echo $c4?></td>
		<td><?php echo $d4?></td>
	</tr>

	<tr>
		<th colspan="2">Performance</th>
		</tr>
		<tr>
		
		<td><?php echo $c5?></td>
		<td><?php echo $d5?></td>
	</tr>

	<tr>
		<th colspan="2">Transmission(gears&clutch type)</th>
		</tr>
		<tr>
		
		<td><?php echo $c6?></td>
		<td><?php echo $d6?></td>
	</tr>

	<tr>
		<th colspan="2">Suspension(Front & Rear)</th>
		</tr>
		<tr>
		
		<td><?php echo $c7?></td>
		<td><?php echo $d7?></td>
	</tr>

	<tr>
		<th colspan="2">Seating Capacity</th>
		</tr>
		<tr>
		
		<td><?php echo $c8?></td>
		<td><?php echo $d8?></td>
	</tr>

	<tr>
		<th colspan="2">Dimensions(length,width,height)</th>
		</tr>
		<tr>
		
		<td><?php echo $c9?></td>
		<td><?php echo $d9?></td>
	</tr>

</table>

</body>
</html>