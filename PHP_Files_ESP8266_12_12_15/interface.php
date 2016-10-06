<?php
//all of this code used for refreshing the page
$page = $_SERVER['PHP_SELF'];
$sec = "15";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    
<?php
//connect to database
$con=mysqli_connect("localhost","kevindar_userESP","test1234","kevindar_ESPpart3");// server, user, pass, database

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//grab the table out of the database
$result = mysqli_query($con,"SELECT * FROM ESPtable");//table select


//print some nice text at the top
echo "<div style ='font:24px/21px fantasy,tahoma,sans-serif;color:#000000'> ESP8266 Demo <br> </div>";

//draw the table
echo "<table border='3'>
<tr>
<th>id</th>
<th>LED</th>
<th>SENSOR</th>
</tr>";
//loop through the table and print the data into the table
while($row = mysqli_fetch_array($result)) {

  echo "<tr>";
  $unit_id = $row['id'];
  echo "<td>" . $row['id'] . "</td>";
$column = "LED";
$current_LED = $row['LED'];
echo "<td><form action= change_SQL.php method= 'post'>
<input type='text' name='value' value=$current_LED  size='15' >
<input type='hidden' name='unit' value=$unit_id >
<input type='hidden' name='column' value=$column >
<input type= 'submit' name= 'change_but' style='text-align:center' value='change'></form></td>";
echo "<td>" . $row['SENSOR'] . "</td>";

}//while

echo "</table>";

    ?>
    