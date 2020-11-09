<?php
$sql = "SELECT id, firstname, lastname, middlename,salary FROM employee";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "<tr><td>".$row["id"]."</td><td>".$row["lastname"]."</td><td>".$row["firstname"]."</td><td>".$row["middlename"]."</td><td>".$row["salary"]."</td></tr>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
