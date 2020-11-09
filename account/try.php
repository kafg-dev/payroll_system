<?php
//you will get here the total working days of the selected date range
// include 'connect.php';
$sql = "SELECT id,start_date,end_date from date_temp where id=(select max(id) from date_temp)";
$result = mysqli_query($conn, $sql);
;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$start_date=$row["start_date"];
  	$end_date=$row["end_date"];
    $date_temp_id=$row["id"];
  }
} 

else {
  // echo "0 results";
}

$weekdays= '0';
$workingdays="0";
$type = CAL_GREGORIAN;
$DateFrom=date_create($start_date);
$DateTo=date_create($end_date);
$day_count=date_diff($DateFrom, $DateTo);
$day_countstring=$day_count->format("%a");
$num_days=$day_countstring + 1;
$absent="0";

//loop through all days
for ($i = 1; $i <= $num_days; $i++) {



        if ($i>1)
        {
              $late="0";
              $att_date=array();
              $att_time=array();
              $date_up=date("Y-m-d",strtotime($start_date_1));
              $var_date_1=date("Y-m-d",strtotime($start_date_1));
              $get_name = date('l', strtotime($start_date_1)); //get week day
              $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
             
              //if not a weekend add day to array
              if($day_name != 'Sun' && $day_name != 'Sat'){
                  $sql = "SELECT * from attendance where id='$id' and att_date='$date_up'";
                  $result = mysqli_query($conn, $sql);
                  
                 
                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                      
                      $att_date[]=$row["att_date"];
                      $att_time[]=$row["att_time"];

                    }
                    $date1 = new DateTime($att_date[0]." ".$att_time[0]);
                    $date2 = new DateTime($att_date[1]." ".$att_time[1]);

                    //difference of time in and timeout 
                    $diff= $date1->diff($date2);

                    $grace_period= new DateTime($att_date[1]." 09:05:00");
                    $today_in= new DateTime($att_date[1]." 09:00:00");
                    //difference of 9:05 am or earlier time in and timeout
                    $default_diff=$date1->diff($today_in);

                     if ($grace_period>=$date2)
                      {
                        $late="0";
                        $a=$default_diff->h.".".$default_diff->i;
                        $hours_worked=$a-1;
                        echo "hours worked :".$hours_worked."</br>";

                      }
                      //if the employee is late
                      else
                      {
                        $a=$diff->h.".".$diff->i;
                        $hours_worked=$a-1;
                        $late=7.60-$hours_worked;
                        echo "hours worked ".$hours_worked."</br>";
                        echo "late :".$late."</br>";
                        
                      }

                    // if ($hours_worked>=8)
                    // {
                        
                    //   $late="0";
                    //   echo "hours worked :".$hours_worked."</br>";
                    // }
                    // elseif($hours_worked<8)
                    // {
                    //   $late=7.6-$hours_worked;
                    //   echo "hours worked :".$hours_worked."</br>";
                    // }
                    mysqli_query($conn, "insert into attendance_filtered (date_temp_id,emp_id,att_date,att_timein,att_timeout, hours_worked,late) values ('$date_temp_id', '$id', '$att_date[0]','$att_time[1]','$att_time[0]','$hours_worked','$late')"); 

                    }
                      
                     else
                     {
                        $absent=$absent+1;
                        echo "absent </br>";
                        mysqli_query($conn, "insert into attendance_filtered (date_temp_id,emp_id,att_date,att_timein,att_timeout, hours_worked,late) values ('$date_temp_id', '$id', '$date_up','0','0','ABSENT','0')"); 
                     }

                    //end of query
                    
                      $weekdays=$weekdays+1;
                     $start_date_1=date("Y-m-d",strtotime($start_date_1 . "+1 days"));



                  } 

                  else{

                    $start_date_1=date("Y-m-d",strtotime($start_date_1 . "+1 days"));
                    
                      
                  } 
                  
             

           
        }

        else
        {
          $att_date=array();
          $att_time=array();
          $date_down=date("Y-m-d",strtotime($start_date));
          $var_date=date("Y-m-d",strtotime($start_date));
          $get_name = date('l', strtotime($start_date)); //get week day
          $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
          
          //if not a weekend add day to array
          if($day_name != 'Sun' && $day_name != 'Sat'){

                 
                 $weekdays=$weekdays+1;
                 $start_date_1=date("Y-m-d",strtotime($start_date . "+1 days"));
          }

          else{
             $start_date_1=date("Y-m-d",strtotime($start_date . "+1 days"));
          }
                  ///this gets the hours worked per day

                  $sql2 = "SELECT * from attendance where id='$id' and att_date='$date_down'";
                  $result2 = mysqli_query($conn, $sql2);
                  ;

                  if (mysqli_num_rows($result2) > 0) {
                    // output data of each row
                    
                    while($row = mysqli_fetch_assoc($result2)) 
                    {

                      $att_date[]=$row["att_date"];
                      $att_time[]=$row["att_time"];

                    }

                    $date1 = new DateTime($att_date[0]." ".$att_time[0]);
                    $date2 = new DateTime($att_date[1]." ".$att_time[1]);
                    //difference of time in and timeout 
                    $diff= $date1->diff($date2);

                    $grace_period= new DateTime($att_date[1]." 09:05:00");
                    $today_in= new DateTime($att_date[1]." 09:00:00");
                    //difference of 9:05 am or earlier time in and timeout
                    $default_diff=$date1->diff($today_in);


                    // $a=$diff->h.".".$diff->i;
                    // $hours_worked=$a-1;
                   
                    // if ($hours_worked>=8)
                    // {
                    //   $late="0";
                    //   echo "hours worked :".$hours_worked."</br>";
                    // }
                    // elseif($hours_worked<8)
                    // {
                    //   $late=7.6-$hours_worked;
                    //   echo "hours worked :".$hours_worked."</br>";
                    // }

                    //if the employee is not late
                    if ($grace_period>=$date2)
                    {
                      $late="0";
                      $a=$default_diff->h.".".$default_diff->i;
                      $hours_worked=$a-1;
                      echo "hours worked :".$hours_worked."</br>";

                    }
                    //if the employee is late
                    else
                    {
                      $late=7.60-$hours_worked;
                      $a=$diff->h.".".$diff->i;
                      $hours_worked=$a-1;
                      echo "hours worked :".$hours_worked."</br>";
                      
                    }
                    // mysqli_close($conn);
                    mysqli_query($conn, "insert into attendance_filtered (date_temp_id,emp_id,att_date,att_timein,att_timeout, hours_worked,late) values ('$date_temp_id', '$id', '$att_date[0]','$att_time[1]','$att_time[0]','$hours_worked','$late')"); 
                    }

                    else{
                      $absent=$absent+1;
                      echo "absent";
                      mysqli_query($conn, "insert into attendance_filtered (date_temp_id,emp_id,att_date,att_timein,att_timeout, hours_worked,late) values ('$date_temp_id', '$id', '$date_down','0','0','ABSENT','0')"); 
                    }

                  



                    // end of query

        }
        



}


?>