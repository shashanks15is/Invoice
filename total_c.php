<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");   
 
 $sql = "SELECT total FROM invc ";  
 $result = mysqli_query($connect, $sql); 
 
 $sum=0;

 while($row = mysqli_fetch_array($result))
 {
 	$sum=$sum+$row["total"];
 }

 echo $sum;

 ?>