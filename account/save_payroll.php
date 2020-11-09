<?php 
include 'connect.php';
if(!empty($_POST)) {

 $emp_id = $_POST['emp_id'];
 $date_id = $_POST['date_id'];
 $basic_salary = $_POST['basic_salary']; 
 $absent = $_POST['absent']; 
 $late = $_POST['late']; 
 $add_day = $_POST['add_day']; 
 $add_pay = $_POST['add_pay']; 
 $deduction = $_POST['deduction'];
 $gross_pay = $_POST['gross_pay']; 

$sql = "SELECT id FROM emp_payroll where emp_id='$emp_id' and date_id='$date_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "0";
} 
else {
  mysqli_query($conn, "insert into emp_payroll (id,emp_id,date_id,basic_salary,absent,late,add_day,add_pay,deduction,gross_pay) values ('','$emp_id', '$date_id', '$basic_salary','$absent','$late','$add_day','$add_pay','$deduction','$gross_pay')"); 
}

 
 	
}
?>