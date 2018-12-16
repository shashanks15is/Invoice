<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $id = $_POST["id"];  
 $mrp = $_POST["text"];  
 $column_name = "unit";  
 $unit=$mrp-(41.100);
 $sql = "UPDATE invc SET ".$column_name."='".$unit."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>