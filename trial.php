<html>
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
	
	$sql = "select * from cars";
	$result=mysqli_query($conn, $sql);

?>

<select>
<option>Select</option>

<?php

if($result)
{
while ($row = $result->fetch_assoc())
{
$ab=$row['car_make'];
?>
<option><?php echo $ab ?></option>
<?php
}
}

?>
</select>
</body>
</html>
