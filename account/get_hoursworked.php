<?php
//you will get here the hours worked per day
include 'connect.php';
$sql = "SELECT id from employee";
$result = mysqli_query($conn, $sql);
;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
		  while($row = mysqli_fetch_assoc($result)) 

		  {
		  		$id=$row['id'];
		  		 //load the attendance of the employee
                  $sql2 = "SELECT * from attendance where id='$id' and att_date='2020-09-02)";
                  $result2 = mysqli_query($conn, $sql2);
                  ;

                  if (mysqli_num_rows($result2) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result2)) {
                      $att_date[]=$row["att_date"];
                      $att_time[]=$row["att_time"];
                      $times=array($row["att_time"][0],$row["att_time"][1]);
                      echo $times;
                    }
                  }   
		  }

} 

else {
  // echo "0 results";
}
?>