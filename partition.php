<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
select{
padding:10px;
border:1px solid black;
border-radius:10px;
}
  h1{
    text-align: center;
  }
body {
  font-family: Arial;
  color: black;
  background:linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)),url("car.jpg");
	
	background-color:white;
	background-size:cover;
	background-position:center;
                background-attachment:fixed;
				background-size: cover;
				 top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  
				 
}
.main-container{
  display:flex;
  margin-top:80%;
  padding:30px;
  border:2px solid black;
 border-radius:20px;
 text-align:center;
background-color:rgb(235,235,235);
}

.split-content{
 
 
  align-items:  center;
 
}
.button hover{
  background-color: pink;
  color: white;
}
.btn{
  text-align:center;
  padding: 20px;
  

}
</style>

 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   
    
    <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxdata1.php',
                data:'car_make='+countryID, 
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


 <script type="text/javascript">
$(document).ready(function(){
    $('#country1').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxdata1.php',
                data:'car_make='+countryID, 
                success:function(html){
                    $('#state1').html(html);
                   
                }
            }); 
        }else{
            $('#state1').html('<option value="">Select Car Model</option>');
          
        }
    });
    
   
});
</script>

<title>
CAR COMPARISON
</title>
</head>
<body>
  

  <form action="compare.php" method="POST">
  <div class="main-container">
<div class="split-content">
  <div class="centered">
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
    $query = $db->query("SELECT * FROM car2 ORDER BY car_make ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
Vehicle 1<br>
    <select name="cmake" id="country" required >
        <option value="">Select Car Make</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['car_make'].'">'.$row['car_make'].'</option>';
            }
       }else{
            echo '<option value="">Car not available</option>';
        }
        ?>
    </select><br>
    
    <br>
    <select name="cname" id="state" required>
        <option value="">Select Car Model</option>
    </select>
    
</div>
</div>

<div class="split-content">
<div class="centered">
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
    $query = $db->query("SELECT * FROM car2 ORDER BY car_make ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
Vehicle 2 <br>
    <select name="cmake1" id="country1" required >
        <option value="">Select Car Make</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['car_make'].'">'.$row['car_make'].'</option>';
            }
        }else{
            echo '<option value="">Car not available</option>';
        }
        ?>
    </select><br>
   <br>
    
    <select name="cname1" id="state1" required>
        <option value="">Select Car Model</option>
    </select>
    
  </div>
</div>
</div>
<div class="btn">
<button class="btn button">SUBMIT</button>
</div>
</form>
</body>
</html>
