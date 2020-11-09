<?php
include 'connect.php';

$q = "$_POST[id]";
$d = "$_POST[date_a]";
$sql = "SELECT count(id) as ctr FROM attendance where id='$q' and att_date like '$d%' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
 	$ctr=$row["ctr"]-1;

  }
}

$sql = "SELECT * FROM attendance where id='$q' and att_date like '$d%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row

echo "
<table id=\"datatable\" class=\"table table-bordered table-striped\" cellspacing=\"0\" width=\"100%\">
              <thead>
              </tbody>
                <tr>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>";

	  while($row = mysqli_fetch_assoc($result)) 
	  {
	 	$att_date[]=$row["att_date"];
	 	$att_time[]=$row["att_time"];
	  }
	  for ($i=0;$i<=$ctr;$i++)
	  {
	  	if ($i%2==0)
	  	{
	  		echo "<tr>
	  		<td>".$att_date[$i]."</td>
	  		<td>".$att_time[$i+1]."</td>
	  		<td>".$att_time[$i]."</td>
	  		</tr>";
	  	}	
	  }
	  echo "</tr>
            </thead>
            </tbody>
            </table>";

  
} 


else {
  echo "NO DATA.";
}


 // $result = mysqli_query($con, $query);
    // echo json_encode($result); 

// mysqli_close($conn);
?>

                                                    
                                                