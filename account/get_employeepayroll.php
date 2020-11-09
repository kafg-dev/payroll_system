<?php
include 'connect.php';
$q = "$_POST[q]";
$sql = "SELECT att_date,att_time FROM attendance where id=".$q."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$a=$row["lastname"];
  	$b=$row["firstname"];
  	$c=$row["middlename"];
  	$d=$row["salary"];
  	echo $a.",".$b.",".$c.",".$d;
  }
} else {
  // echo "0 results";
}

mysqli_close($conn);
?>
