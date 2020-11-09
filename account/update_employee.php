<?php
include 'connect.php';
if(!empty($_POST)) {
 $c_id = $_POST['c_id'];
 $lastname = $_POST['lastname'];
 $firstname = $_POST['firstname']; 
 $middlename = $_POST['middlename']; 
 $salary = $_POST['salary']; 

$sql = "UPDATE employee SET lastname='".$lastname."',firstname='".$firstname."',middlename='".$middlename."',salary='".$salary."' WHERE id='".$c_id."'";

if (mysqli_query($conn, $sql)) {
  echo "yes";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

}
mysqli_close($conn);


?>