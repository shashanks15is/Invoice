<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $sql = "INSERT INTO invc(model,desp,mrp,unit,qty,total) VALUES('".$_POST["model"]."', '".$_POST["desp"]."','".$_POST["mrp"]."','".$_POST["unit"]."','".$_POST["qty"]."','".$_POST["total"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 