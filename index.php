<html>  
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ebill</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

        <link rel="stylesheet" type="text/css" href="dependencies/sem.css">
        <link rel="stylesheet" type="text/css" href="dependencies/bootstrap.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <script type="text/javascript">

          function show_hide_column(col_no, do_show) {
             var tbl = document.getElementById('id_of_table');
             var rows = tbl.getElementsByTagName('tr');

             for (var row = 0; row < rows.length; row++) {
                 var cols = rows[row].children;
                 if (col_no >= 0 && col_no < cols.length) {
                     var cell = cols[col_no];
                     if (cell.tagName == 'TD') cell.style.display = do_show ? 'block' : 'none';
                 }
             }
         }         

          function HideBorder()
          {
             var myInput1 = document.getElementById("myInput1").style;
             var myInput2 = document.getElementById("myInput2").style;
             var myInput3 = document.getElementById("myInput3").style;
             var myInput4 = document.getElementById("myInput4").style;
             var myInput5 = document.getElementById("myInput5").style;
             var myInput6 = document.getElementById("myInput6").style;
             var myInput7 = document.getElementById("myInput7").style;
             var myInput8 = document.getElementById("myInput8").style;
             var myInput9 = document.getElementById("myInput9").style;
             var myInput10 = document.getElementById("myInput10").style;

                          
             myInput1.borderStyle="none";
             myInput2.borderStyle="none";
             myInput3.borderStyle="none";
             myInput4.borderStyle="none";
             myInput5.borderStyle="none";
             myInput6.borderStyle="none";
             myInput7.borderStyle="none";
             myInput8.borderStyle="none";
             myInput9.borderStyle="none";
             myInput10.borderStyle="none";
          }

          function addRow(){
      var row= "<tr><td class=\"text-center\" contenteditable=\"true\"></td><td id=\"model\" class=\"text-center\" contenteditable=\"true\"></td><td id=\"desp\" class=\"text-center\" contenteditable=\"true\"></td><td class=\"text-center\" id=\"mrp\" contenteditable=\"true\"></td><td id=\"unit\" class=\"text-center\"></td><td id=\"qty\" class=\"text-center\" contenteditable=\"true\"></td> <td class=\"text-center\" id=\"total\"></td> </tr> ";
      $("#myTable").append(row);
    }

          function pdf()
          {
            $('#create_pdf').slideUp();
          }

          function trunk_table()
          {
            $.ajax({  
                url:"trunk_table.php",  
                method:"POST",  
                success:function(data){  
                     alert(data);
                }  
           });
          }

          function total_c()
          {
            $.ajax({  
                url:"total_c.php",  
                method:"POST", 
                success:function(data){  
                     x=parseInt(data);
                     y=data*(14/100);
                     z=data*(14/100);
                     sgst=parseInt(y.toFixed(2));
                     cgst=parseInt(z.toFixed(2));
                     sum=parseInt(x+sgst+cgst);
                     text=numberToEnglish(sum);
                     $('#subtotal').html(x);
                     $('#sgst').html(sgst);
                     $('#cgst').html(cgst);
                     $('#net_amount').html(sum);
                     $('#inwords').html(text);
                     trunk_table();
                     HideBorder();
                }  
           });
          }

          
        </script>
      </head>  
      <body>
    
      <div class="ui page grid">
    <div class="wide column">
      <h1 class="ui header aligned center">M M Distributor</h1>
      <div class="ui divider hidden"></div>
      <div class="ui segment">
        <div class="ui button aligned center teal" id="create_pdf">Create PDF</div>
        <button onclick="addRow()" class="btn btn-info">Add Product</button>
      <button id="btn_add" class="btn btn-info">Calculate</button>
      <button class="btn btn-info" onclick="total_c();">Total</button>
      <h5><strong>Discount : </strong> <span contenteditable="true" id="discount">41.4</span></h5>
        <div class="ui divider"></div>
        <form class="ui form">
          <center><h2 class="ui dividing header">Tax Invoice</h2></center>
          <div class="col-md-12">
            <div class="col-md-4 col-md-offset-8">
            <br>
              <h5><strong>GSTIN : </strong><span contenteditable="true"> 85461252566556</span></h5>
            </div><br><br><br>
            <div class="col-md-4">
            <br>
              <h4><strong>Billed To:</strong></h4>
              <h5 contenteditable="true">Customer Name</h5>
              <h5><strong>Address : </strong> <span contenteditable="true">xxx xxxx xxxx</span></h5>
              <h5><strong>Contact No : </strong> <span contenteditable="true">9876543210</span></h5>
              <h5><strong>GSTIN : </strong> <span contenteditable="true">9814176543210</span></h5>
              <br>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-5">
            <br>
              <h5><strong>Date : </strong> <span contenteditable="true"> dd/mm/yy</span></h5>
              <h5><strong>Invoice No. : </strong> <span contenteditable="true">MMD021</span></h5>
              <h5><strong>Contact Person : </strong> <span contenteditable="true">Contact Person Name</span></h5>
              <h5><strong>Email : </strong> <span contenteditable="true">person@gmail.com</span></h5>
              <br>
            </div>
          </div>
      
           <div class="col-md-12">
          <br><br>
          <div id="live_data"></div>
          </div>

    <div class="col-md-12">
            <div class="col-xs-7">
                        <address>
                            <p style="line-height: 1.5em">
                                1.Payment should be done within 7 days for CD<br>
                                2.Interest at 21% p.a shall be applicable for overdues<br>
                                3.GSTN<br>
                                4.Make all cheque payable at -MM Distributors<br>
                                5.RTGS or NEFT to following account<br>
                                      Bank Name :State Bank of Mysore<br>
                                      Branch  :Yelahanka New Town<br>
                                      Account Number :64199758142<br>
                                      IFSC   :SBMY0040760<br>
                            </p>
                        </address>
                    </div>
                    <div class="col-md-5">
              <h5><strong>Sub Total : </strong> <span id="subtotal" style="float: right"></span></h5>
              <h5><strong>SGST(14%) : </strong> <span id="sgst" style="float: right"></span></h5>
              <h5><strong>CGST(14%) : </strong> <span id="cgst" style="float: right"></span></h5>
              <h5><strong>Total Amount (Round Off) : </strong> <span id="net_amount" style="float: right"></span></h5>
              <br>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-8">
              <h4><strong>Amount in Words : </strong> <br><span id="inwords"></span></h4>
            </div>
            <br><br>
            <div class="col-md-8">
            <br><br>
              <h5><strong> Thank You for the Business </strong></h5>
            </div>
            <div class="col-md-4">
            <br>

              <h5><strong> for MM Distributors </strong></h5>
              <br>
              <h5><strong> Authorised Signatory </strong></h5>
            </div>
          </div> 


          
        
          <div >.</div>
        </form>
      </div>
    </div>
  </div> 
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data); 
                      
                }  
           });  
      }  
      addRow();
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var model = $('#model').text();  
           var desp = $('#desp').text();
           var mrp = $('#mrp').text();
           var discount=$('#discount').text();
           var unit = parseInt(mrp-(mrp*(discount/100)))+1;
           var qty = $('#qty').text(); 
           var total =parseInt(unit*qty);  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{model:model,desp:desp,mrp:mrp,unit:unit,qty:qty,total:total},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.model', function(){  
           var id = $(this).data("id1");  
           var model = $(this).text();  
           edit_data(id, model, "model");  
      });  
      $(document).on('blur', '.desp', function(){  
           var id = $(this).data("id2");  
           var desp = $(this).text();  
           edit_data(id,desp, "desp");  
      }); 

      $(document).on('blur', '.mrp', function(){  
           var id = $(this).data("id3");  
           var mrp = $(this).text();  
           edit_data(id,mrp, "mrp");  
      });
      $(document).on('blur', '.qty', function(){  
           var id = $(this).data("id5");  
           var qty = $(this).text();  
           edit_data(id,qty, "qty");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id7");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  

 function numberToEnglish( n ) {

    var string = n.toString(), units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words, and = 'And';

    /* Is number zero? */
    if( parseInt( string ) === 0 ) {
        return 'Zero';
    }

    /* Array of units as words */
    units = [ '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen' ];

    /* Array of tens as words */
    tens = [ '', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety' ];

    /* Array of scales as words */
    scales = [ '', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion', 'Nonillion', 'Decillion', 'Undecillion', 'Duodecillion', 'Tredecillion', 'Quatttuor-decillion', 'Quindecillion', 'Sexdecillion', 'Septen-decillion', 'Octodecillion', 'Novemdecillion', 'Vigintillion', 'Centillion' ];

    /* Split user arguemnt into 3 digit chunks from right to left */
    start = string.length;
    chunks = [];
    while( start > 0 ) {
        end = start;
        chunks.push( string.slice( ( start = Math.max( 0, start - 3 ) ), end ) );
    }

    /* Check if function has enough scale words to be able to stringify the user argument */
    chunksLen = chunks.length;
    if( chunksLen > scales.length ) {
        return '';
    }

    /* Stringify each integer in each chunk */
    words = [];
    for( i = 0; i < chunksLen; i++ ) {

        chunk = parseInt( chunks[i] );

        if( chunk ) {

            /* Split chunk into array of individual integers */
            ints = chunks[i].split( '' ).reverse().map( parseFloat );

            /* If tens integer is 1, i.e. 10, then add 10 to units integer */
            if( ints[1] === 1 ) {
                ints[0] += 10;
            }

            /* Add scale word if chunk is not zero and array item exists */
            if( ( word = scales[i] ) ) {
                words.push( word );
            }

            /* Add unit word if array item exists */
            if( ( word = units[ ints[0] ] ) ) {
                words.push( word );
            }

            /* Add tens word if array item exists */
            if( ( word = tens[ ints[1] ] ) ) {
                words.push( word );
            }

            /* Add 'and' string after units or tens integer if: */
            if( ints[0] || ints[1] ) {

                /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                if( ints[2] || ! i && chunksLen ) {
                    words.push( and );
                }

            }

            /* Add hundreds word if array item exists */
            if( ( word = units[ ints[2] ] ) ) {
                words.push( word + ' Hundred' );
            }

        }

    }

    return words.reverse().join( ' ' );

}
 </script>

  <script src="dependencies/jquery.js"></script>
  <script type="text/javascript" src="dependencies/html2canvas.js"></script>
  <script type="text/javascript" src="dependencies/jspdf.js"></script>
  <script type="text/javascript" src="dependencies/app.js"></script>