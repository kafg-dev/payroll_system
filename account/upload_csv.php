<?php  
include 'connect.php';
 if(!empty($_FILES["upload_file"]["name"]))  
 {  
      
      $allowed_ext = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');  
      $extension = explode(".", $_FILES["upload_file"]["name"]);  
      if(in_array($_FILES['upload_file']['type'], $allowed_ext))  
      {  
           $file_data = fopen($_FILES["upload_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
                $att_date = mysqli_real_escape_string($conn, $row[0]);  
                $att_id = mysqli_real_escape_string($conn, $row[1]);  
                $att_time = mysqli_real_escape_string($conn, $row[2]);  
                $query = "  
                INSERT INTO attendance  
                     (id, att_date, att_time)  
                     VALUES ('$att_id', '$att_date', '$att_time')  
                ";  
                mysqli_query($conn, $query); 

               
           }  

           echo "File Uploaded.";
            
      }  
      else  
      {  
           echo 'Invalid File';  
      }  
 }  
 else  
 {  
      echo "Please select a file.";  
 }  
 ?>  