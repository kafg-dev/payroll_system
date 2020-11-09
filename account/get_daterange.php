<?php
include 'connect.php';
$sql = "SELECT id,start_date,end_date FROM date_temp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "<option value=".$row["id"].">".$row["start_date"]." - ".$row["end_date"]."</option>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
