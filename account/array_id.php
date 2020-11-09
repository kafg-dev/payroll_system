<?php
include 'connect.php';
//
$sql = "SELECT count(id) as ctr FROM employee";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 

  		{
  		$ctr=$row['ctr']-1;
  		}
    
  }


//
$sql = "SELECT id FROM employee";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  		// $ctr=$row['ctr'];
  		$ids[]=$row["id"];
  	}
  		

    
  }

  for ($k = 0; $k <= $ctr; $k++) 
  		{
  		echo $id=$ids[$k];
  		include 'try.php';
		}







 



?>