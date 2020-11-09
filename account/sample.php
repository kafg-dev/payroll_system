<?php
include 'connect.php';
$columns = array( 
// datatable column index  => database column name
    0 => 'id',
    1 => 'firstname',
    2 => 'lastname',
    3 => 'middlename',
    4 => 'salary',
);

$sql = "SELECT * FROM employee";
$res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
$dataArray = array();
while( $row = mysqli_fetch_array($res) ) {


    $dataArray[] = $row["id"];
    $dataArray[] = $row["firstname"];
    $dataArray[] = $row["lastname"];
    $dataArray[] = $row["middlename"];
    $dataArray[] = $row["salary"];

}

echo json_encode($dataArray);

?>