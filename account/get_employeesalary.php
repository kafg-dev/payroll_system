<?php
include 'connect.php';

//GET MAXIMUM
$sql = "SELECT max(id) as id from date_temp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$date_id=$row['id'];
  }
} 


$sql = "SELECT emp_payroll.id as payroll_id,emp_payroll.emp_id as emp_id, CONCAT(employee.firstname,' ',employee.middlename,' ',employee.lastname) as name,emp_payroll.basic_salary as basic_salary,emp_payroll.absent as absent,emp_payroll.late as late,emp_payroll.add_pay as add_pay,emp_payroll.add_day as add_day,emp_payroll.deduction as deduction,emp_payroll.gross_pay as gross_pay FROM emp_payroll, employee where emp_payroll.emp_id=employee.id and emp_payroll.date_id='$date_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row

	  while($row = mysqli_fetch_assoc($result)) 
	  {
	 	echo "<tr>
	  		
	  		<td>".$row['name']."</td>
	  		<td> RM ".number_format($row['basic_salary'],2)."</td>
	  		<td>".$row['absent']."</td>
	  		<td>".$row['late']."</td>
	  		<td>".$row['add_day']."</td>
	  		<td>".$row['add_pay']."</td>
	  		<td>".$row['deduction']."</td>
	  		<td> RM ".number_format($row['gross_pay'],2)."</td>
	  		</tr>";
	  }  

  
} 


else {
  echo "";
}


 // $result = mysqli_query($con, $query);
    // echo json_encode($result); 

// mysqli_close($conn);
?>

                                                    
                                                