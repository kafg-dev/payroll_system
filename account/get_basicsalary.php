<?php
include 'connect.php';
$q = "$_POST[q]";
// $q = "20200817";
//GET SALARY
$sql = "SELECT salary FROM employee where id='$q'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$a=$row["salary"];
  	// echo $a;
  }
} 


else {
  // echo "0 results";
}

//GET MAXIMUM
$sql = "SELECT id,work_days from date_temp where id=(select max(id) from date_temp)";
$result = mysqli_query($conn, $sql);
;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$date_id=$row['id'];
  	$c=$row['work_days'];
  }
} 

else {
  // echo "0 results";
}

//GET ABSENT
$sql = "SELECT COUNT(hours_worked) as absent from attendance_filtered where hours_worked='ABSENT' and date_temp_id='$date_id' and emp_id='$q'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$b=$row["absent"];
  	// echo $a;
  }
} 


else {
  // echo "0 results";
}

//GET late
$sql = "SELECT sum(late) as late from attendance_filtered where date_temp_id='$date_id' and emp_id='$q'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while($row = mysqli_fetch_assoc($result)) {
  	$d=$row["late"];

  	if($d<="59")
  	{
  		$d=$d;
  	}
  	elseif($d>="60")
  	{
  		$d=$d/.60;
  	}
  
  	

  	// echo $a;
  }
} 


else {
  // echo "0 results";
	
}

//

echo $a.",".$b.",".$c.",".$d.",".$date_id;

mysqli_close($conn);
?>
