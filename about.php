<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
<style>
body{
font-family: 'Playfair Display', serif;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
  transition: 0.3s;
  border:2px solid black;
  border-radius:10px;
  border-color:white;
  background-color:rgb(255,255,255);
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}
.container {
  padding: 2px 16px;
  
}
table{
	text-align:left;
	}
th{
	padding-left:1%;
	font-size:20px;
	
padding-bottom:5%;
}
h2{
	text-align:center;
	margin-top:50%;
	border:1px solid black;
	border-radius:10px;
	margin-left:20%;
	margin-right:20%;
	padding-top:5%;
	padding-bottom:5%;
	background-color:rgb(210,210,210);
	
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
} ?>
<h2>About Us</h2>
<div class="card">
  <div class="container" >
   <table>
   <tr><th>Armaan Shaikh</th>
   <th>Frontend and Backend developer</th>
   </tr>
   <tr>
   <th>Pushparaj Keluskar</th>
   <th>Backend developer</th>
   </tr>
   <tr>
   <th>Rubel Andrade</th>
   <th>Design</th>
   </tr>
   <tr>
   <th>Maria Mesquitta</th>
   <th>Research and Information</th>
   </tr>

   </table>
  </div>
  
</div>	
</body>
</html>