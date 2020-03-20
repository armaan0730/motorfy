<?php
$show = true;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";
session_start();
$a=$_SESSION["login_user"];
echo $a;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(!empty($_POST["cn"]))
{
	$cn=$_POST['cn'];
}
else{
	$cn="Not Specified";
}

if(!empty($_POST["mc"]))
{
	$mc=$_POST['mc'];
}
else{
	$mc="Not Specified";
}

$b=$_POST["cmake"];

$sqla="select * from cars2 where car_id = '$b'  ";
$result=mysqli_query($conn, $sqla);
		while ($row = $result->fetch_assoc()) {
		
		$ga=$row['car_make'];
		
		}
if(!empty($a) && !empty($ga) && !empty($_POST['cname']) && !empty($_POST['cno']) && !empty($_POST['dop']) && !empty($cn) && !empty($mc))
{
$sql = "INSERT INTO vehicle (user_id, car_make, car_name, car_no, dop, chasis_no, modific_com) VALUES ('$a', '$ga', '".$_POST["cname"]."', '".$_POST["cno"]."','".$_POST["dop"]."','$cn','$mc')";

if ($conn->query($sql) === TRUE) {
    echo '<p style="color:white ; text-align:center">' ."New record created successfully" .'</p>' .  "<br>" ;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else
	{ $show=false;
		?><script>app2.showToast1();</script>
		<?php
	}
 ?>
 <html>
 <head>
 
 <script>
 if(<?php echo $show?>==true)
 {
 window.onload=function ()
{
		
		app1.showToast();
}
 }
 </script>
 </head>
 <html>