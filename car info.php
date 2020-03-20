
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>CAR INFORMATION</title>
<style>
.c{
  margin-top:60%;
  text-align: center;
  margin-left:5%;

}
body {

  font-size:40px;
  font-family:arial;
  font-weight: bold;
  background-size: 100% 100%;
  }


  select{
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
  }

  #submit{
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
  }


   #reset{
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
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

</head>
<body>
 

 <form action="carsinfo.php" method="POST">
 <?php
 error_reporting(0);
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
    <div class="c">
<h4>Car Make :</h4> 
    <select name="cmake" id="country" >
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
    <h4>Car Model : </h4>
    <select name="cname" id="state">
        <option value="">Select Car Model</option>
    </select>
    
<br>
       
      <input id="submit" type=submit ><!-- <input id="reset" type=reset >
    --></form>
  </div>

</body>
<html>