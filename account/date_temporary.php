<?php 
include 'connect.php';
if(!empty($_POST)) {
 $s_date = $_POST['s_date'];
 $e_date = $_POST['e_date'];
 
$s_date_1=date("Y-m-d", strtotime($s_date)); 
$e_date_1=date("Y-m-d", strtotime($e_date)); 


 mysqli_query($conn, "insert into date_temp (id,start_date, end_date, work_days) values ('','$s_date_1', '$e_date_1','')"); 
 
}

else {
  // echo "0 results";
}

$sql = "SELECT id,start_date,end_date from date_temp where id=(select max(id) from date_temp)";
		$result = mysqli_query($conn, $sql);
		;

		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  while($row = mysqli_fetch_assoc($result)) {
		  	$id=$row["id"];
		  	$start_date=$row["start_date"];
		  	$end_date=$row["end_date"];
		  }
		} 


		$weekdays= '0';
		$type = CAL_GREGORIAN;
		$DateFrom=date_create($start_date);
		$DateTo=date_create($end_date);
		$day_count=date_diff($DateFrom, $DateTo);
		$day_countstring=$day_count->format("%a");
		$num_days=$day_countstring + 1;

		//loop through all days

		for ($i = 1; $i <= $num_days; $i++) {



			        if ($i>1)
			        {
			         
					          $get_name = date('l', strtotime($start_date_1)); //get week day
					          $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
					          
					          
					          if($day_name != 'Sun' && $day_name != 'Sat')
					          {
					            
					             $weekdays=$weekdays+1;
					             $start_date_1=date("m/d/y",strtotime($start_date_1 . "+1 days"));

			          		  }  

			          		  else
			          		  {

                   				 $start_date_1=date("Y-m-d",strtotime($start_date_1 . "+1 days"));

                  			  } 

			           
			        }


			        else
			        {
					          $get_name = date('l', strtotime($start_date)); 
					          $day_name = substr($get_name, 0, 3); 
					         
					          if($day_name != 'Sun' && $day_name != 'Sat')
					          {
					              
					             $weekdays=$weekdays+1;
					             $start_date_1=date("m/d/y",strtotime($start_date . "+1 days"));
			          		  }

		        	}
		        



			}
				 
				 // echo "days in date range:  " .$num_days."</br>";
				 // echo $weekdays;
				 mysqli_query($conn, "update date_temp set work_days ='$weekdays' where id='$id'"); 
				 include 'array_id.php';



?>