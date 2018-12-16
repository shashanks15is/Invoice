<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $output = '';  

 $sql = "SELECT * FROM invc ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                      <th class="text-center" width="5%">Sl no</th>
                      <th class="text-center" width="15%">Model</th>
                      <th class="text-center" width="30%">Product Description</th>
                      <th class="text-center" width="10%">M.R.P</th>
                      <th class="text-center" width="10%">Unit Price</th>
                      <th class="text-center" width="10%">Qty</th>
                      <th class="text-center" width="10%">Total</th>  
                        
                </tr>';      
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="text-center" data-id1="'.$row["id"].'" contenteditable>'.$row["model"].'</td>  
                     <td class="text-center" data-id2="'.$row["id"].'" contenteditable>'.$row["desp"].'</td>
                     <td class="text-center" data-id3="'.$row["id"].'" contenteditable>'.$row["mrp"].'</td>
                     <td class="text-center" data-id4="'.$row["id"].'" >'.$row["unit"].'</td>
                     <td class="text-center" data-id5="'.$row["id"].'" contenteditable>'.$row["qty"].'</td>
                     <td class="text-center" data-id6="'.$row["id"].'" >'.$row["total"].'</td>  
                       
                </tr>  
           ';  
      }  
         
   
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>