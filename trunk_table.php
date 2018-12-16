<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $sql = "TRUNCATE TABLE  invc";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Done!!';  
 }  
 ?> 