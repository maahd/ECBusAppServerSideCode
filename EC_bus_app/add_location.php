<?php
$con=mysqli_connect("localhost","root","","bus");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Variables Zeeshan is sending from front end
$bus_number = $_POST['bus_number'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$table_name = "bus".(int)$bus_number;

// For new buses. Because of this you can add them from front end. 
mysqli_query($con,"CREATE TABLE IF NOT EXISTS $table_name(id int NOT NULL AUTO_INCREMENT,latitude decimal(10,8),longitude decimal(11,8),PRIMARY KEY(id));");

// Replace location so without history
mysqli_query($con,"DELETE FROM $table_name");
mysqli_query($con,"INSERT INTO $table_name (latitude, longitude) VALUES ($latitude, $longitude)");
// This shit doesn't work
//$rows = mysql_result(mysqli_query('SELECT COUNT(*) FROM $table_name'), 0);
//if (!$rows) { mysqli_query($con,"INSERT INTO $table_name (latitude, longitude) VALUES ($latitude, $longitude)"); }
//else { mysqli_query($con,"UPDATE $table_name SET latitude=$latitude AND lognitude=$longitude WHERE id=1"); }

// Append location so with history
//mysqli_query($con,"INSERT INTO $table_name (latitude, longitude) VALUES ($latitude, $longitude)");

//echo json_encode("success!");

?>
