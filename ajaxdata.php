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

if(isset($_POST["car_id"]) && !empty($_POST["car_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM cars3 WHERE car_id = ".$_POST['car_id']."  ORDER BY car_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Car Model</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option >'.$row['car_name'].'</option>';
        }
    }else{
        echo '<option value="">Car not available</option>';
    }
}



?>
