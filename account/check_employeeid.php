<?php
include 'connect.php';
$q = "$_POST[q]";
$sql = "SELECT id FROM employee where id=".$q."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	echo "yes";
  }
} else {
  // echo "0 results";
}

mysqli_close($conn);
?>