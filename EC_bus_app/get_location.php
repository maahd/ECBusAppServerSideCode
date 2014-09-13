<?php
header("Access-Control-Allow-Origin: *");
$con=mysqli_connect("localhost","root","","bus");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$number_of_buses=mysqli_query($con,"SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'bus'");

while($row = mysqli_fetch_array($number_of_buses)) {
  $number_of_buses=$row['COUNT(*)'];
  //echo $number_of_buses;
  //echo "\n";
}

//Zeeshan is not sending me bus number so comment this out
//$bus_number = $_POST['bus_number'];

//$table_name = "bus".(int)$bus_number;

echo $number_of_buses . " ";
for ($x=0; $x<=$number_of_buses; $x++) {
$table_name = "bus".(int)$x;
$qury = mysqli_query($con,"SELECT latitude,longitude FROM $table_name ORDER BY id DESC LIMIT 1");

while($row = mysqli_fetch_array($qury)) {
  echo $row['latitude'] . " " . $row['longitude'] . " " . $x . " ";
  }
}

mysqli_close($con);

?>
