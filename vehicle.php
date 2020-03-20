<html>
	<head>
		<title> Transparent Login form </title>
		<link rel="stylesheet" href="style2.css">
				<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>

		<script>
function showT()
{
		
		app1.showToast();
}

</script>

 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   
    
    <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'car_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                   
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Car Model</option>');
          
        }
    });
    
   
});
</script>
<style>
button{
background-color:white;
color:black;
font-weight:bold;
margin-top:10%;
font-size:20px;
}
</style>
		</head>
	<body>
	<div class="loginBox">
		<!--<button onclick="app2.showToast2();"> < Back</button>
-->
		
		<h2>Enter your Vehicle details</h2>
		<form name="userform" method="POST">
	
			 <?php
    //Include database configuration file
   //db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'motorfy';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
    
    //Get all country data
    $query = $db->query("SELECT * FROM cars2 ORDER BY car_make ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="cmake" id="country" >
        <option value="">Select Car Make</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['car_id'].'">'.$row['car_make'].'</option>';
            }
        }else{
            echo '<option value="">Car not available</option>';
        }
        ?>
    </select>
    
    <select name="cname" id="state">
        <option value="">Select Car Model</option>
    </select>
    
   
    <br>
	<br>

			<input type="text" name = "cno"   pattern="^[A-Z]{2}\s[0-9]{2}\s[A-Z]{2||1}\s[0-9]{4}$" onKeyPress="if(this.value.length==10) return false;" placeholder="Enter Car Number" onkeyup="this.value = this.value.toUpperCase();">
	
			<input type="text" name = "dop" placeholder="Enter Date of purchase" onfocus="(this.type='date')">
				<input type="text" name = "cn" placeholder="Enter Chasis number (OPTIONAL)">
	
			<input type="text" name = "mc" placeholder="Enter Modification (OPTIONAL)">
		<!--	<button  onclick="showT()">Submit</button>
			--><input type=submit name="submit" >
		</form>
	</div>
	<?php
	if(isset($_POST['submit']))
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorfy";
session_start();
$a=$_SESSION["login_user"];
//echo $a;

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
    //echo '<p style="color:white ; text-align:center">' ."New record created successfully" .'</p>' .  "<br>" ;
?><script>app1.showToast();</script>
		<?php
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else
	{
		?><script>app2.showToast1();</script>
		<?php
	}
}
 ?>

	</body>
</html>