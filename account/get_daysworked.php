<?php
//load the hours worked by the employee
include 'connect.php';
                  $sql2 = "SELECT * from attendance where id='20200817' and att_date='2020-09-02'";
                  $result2 = mysqli_query($conn, $sql2);
                  

                  if (mysqli_num_rows($result2) > 0) {
                    // output data of each row
                    
                    while($row = mysqli_fetch_assoc($result2)) 
                    {

                      $att_date[]=$row["att_date"];
                      $att_time[]=$row["att_time"];                 
                    }

                    for ($i = 0; $i <= 1; $i++) 
                    {
                        echo $att_time[$i];
                    }
                    
                    // $date1 = new DateTime($att_date[0]." ".$att_time[0]);
                    // $date2 = $date1->diff(new DateTime($att_date[1]." ".$att_time[1]));
                    // $a=$date2->h.".".$date2->i;
                    // $hours_worked=$a-1;
                    // echo $hours_worked;
                    }


// $sql = "SELECT id, firstname, lastname, middlename,salary FROM employee";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {

//     echo "<tr><td>".$row["id"]."</td><td>".$row["lastname"]."</td><td>".$row["firstname"]."</td><td>".$row["middlename"]."</td><td>".$row["salary"]."</td></tr>";
//   }
// } else {
//   echo "0 results";
// }   
?>