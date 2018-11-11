<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Multiple Inline Insert into Mysql using Ajax JQuery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="30%">Product Type</th>
      <th width="10%">Product</th>
      <th width="45%">Quantity</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="prod_type"></td>
      <td contenteditable="true" class="prod"></td>
      <td contenteditable="true" class="qnty"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='prod_type'></td>";
   html_code += "<td contenteditable='true' class='prod'></td>";
   html_code += "<td contenteditable='true' class='qnty'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var prod_type = [];
  var prod = [];
  var qnty = [];
  $('.prod_type').each(function(){
   prod_type.push($(this).text());
  });
  $('.prod').each(function(){
   prod.push($(this).text());
  });
  $('.qnty').each(function(){
   qnty.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{prod_type:prod_type, prod:prod, qnty:qnty},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>