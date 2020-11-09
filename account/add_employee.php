<?php 
include 'connect.php';
if(!empty($_POST)) {
 $id = $_POST['id'];
 $lastname = $_POST['lastname'];
 $firstname = $_POST['firstname']; 
 $middlename = $_POST['middlename']; 
 $salary = $_POST['salary']; 
 mysqli_query($conn, "insert into employee (id,lastname, firstname, middlename, salary) values ('$id', '$lastname', '$firstname','$middlename','$salary')"); 
 	
}
?>