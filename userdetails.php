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
input[type="submit"]
{
	margin-top:10%;
	border:1px solid black;
	border-radius:10px;
	font-size:20px;
	margin-left:10%;
	background-color:white;
	
	
}
td{
	margin-left:2px;
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
<!--<button onclick="app2.showToast2();"> < Back</button>
--><h2>Your Details</h2>
<div class="card">
<!-- <img src="car.png" alt="car icon">
  -->
  <div class="container" >
    <table>
	<tr>
	<th>Category</th>
	<th>Specifications</th>
	</tr>
	<tr>
	<td>First Name</td>
	<td><?php echo $ba?></td>
	</tr>
	<tr>
	<td>Second Name</td>
	<td><?php echo $bb?></td>
	</tr>
	<tr>
	<td>Phone No.</td>
	<td><?php echo $bc?></td>
	</tr>
	<tr>
	<td>No. of Cars</td>
	<td><?php echo $bd?></td>
	<tr>
	</table>
	</div>
  
</div>	
<!--
-->

<form method="post"> 
        <input type="submit" name="button1"
                value="LOGOUT"/> 
				</form>	
				<?php
         if(isset($_POST['button1'])) { 
        
			?>
		<script>
		
		app1.showToast();
		</script>
		<?php
		session_destroy();

		}
?>
<button class="l" onclick="app2.showToast1();">EDIT</button>
</body>
</html>