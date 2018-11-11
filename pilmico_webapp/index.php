<!DOCTYPE html>
<html>
<head>
	<title>PILMICO Main</title>
	<link href="image/M_icon.png" rel="icon" />
</head>
<link href="css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<body>
	<div class='topN'>
	  	<img src="image/pilmico_logo_white.png" class="imgLogin" style="width: 180px;height: auto;padding: 15px;margin-left: 5%;">
	  	<a href='logout.php'>Logout</a>
	</div>
	<div class='container'>
		<div class="tbCon">
			<h3>Order Taking Form</h3>
			<label style="margin-left: 25px;">Name of the Buyer: &nbsp&nbsp
				<input type="text" name="name" id="name">
			</label>
			<table id="tbOrdersForm">
				<tr>
					<th class="drpType">Product Type:</th>
					<th>Product</th>
					<th>Quantity</th>
					<th></th>
				</tr>
				<tbody>
				<tr id="rowTemplate">
					<td>
						<select onclick="drpProduct(1)" id="drpType">
						<?php 
							include('conn.php');
							$query = "Select * from type where status = 'available'";
							$result = $con->query($query);
							if ($result->num_rows > 0) {
					    		while($row = $result->fetch_assoc()) {  
					      			$id=$row["id"]; 
					      			$name=$row["type_name"];
					      			?>
					      			<option value=<?php echo $id?>><?php echo "$name";?></option>
					      			<?php
					      		}
					      	}
					    ?>
						</select>
					</td>
					<td class='prod'>
						<select id="drpProd">
							<?php
							$query = "Select * from product where type_id = 1";
							$result = $con->query($query);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {  
										$id=$row["id"]; 
										$name=$row["prod_name"];
										?>
										<option value=<?php echo $id?>><?php echo "$name";?></option>
										<?php
									}
								}
							?>
						</select>
					</td>
					<td class="prod_qnt">
						<input type="number" name="qnt" id="qnt" min='1' value="1">
					</td>
											<button class="" id="remove" style="color: red;display: none;" onclick="remove()">X</button>

					<td>
						<button class="" id="addMore" style="color: green;" onclick="addMore()">&#10004;</button>
					</td>
				</tr>
				</tbody>
			</table>
			<div style="display: inline-block;"></div>

			<div style="width: 100%;background-color: green;margin-top: 50px;margin-bottom: 70px;">
				<button class="ftRight" id="save" style="text-decoration: none;margin-right: 8%;margin-bottom: 10px; padding: 15px;background-color: #1E8449;color: white;border-radius: 5px;padding-top: 8px;padding-bottom: 8px;">Save</button>
			</div>
			<div style="display: inline-block;"></div>
		</div>
		<div class="tbCon">
			<h3>Orders Data</h3>
			<button style="float: right;margin-right: 8%;margin-bottom: 10px; padding: 15px;background-color: #D35400;color: white;border-radius: 5px;padding-top: 8px;padding-bottom: 8px;" id="proceed">Proceed to Production &#8594;</button>
			<table id="">
				<tr>
					<th>Sales Order</th>
					<th>Product Type:</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Date Ordered</th>
					<th></th>
				</tr>
					<?php
					$query = "Select * from product_tracking where status = 'Order Taking'";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {  
								$id=$row["id"]; 
								$so=$row["sales_order"];
								$prodType=$row["prod_type"];
								$prod=$row["product"];
								$qnt=$row["quantity"];
								$date_order=$row["date_order"];
								?>
								<tr id="">
									<td><?php echo "$so";?></td>
									<td><?php echo "$prodType";?></td>
									<td><?php echo "$prod";?></td>
									<td><?php echo "$qnt";?></td>
									<td><?php echo "$date_order";?></td>
									<td><input type="checkbox" id=<?php echo "chk".$id;?> class="theClass" onchange="chk(<?php echo $id;?>)"></td>
								</tr>
								<?php
							}
						}
					?>
			</table>

		</div>
	</div>
	<div style="display: inline-block;margin-bottom: 20px;"></div>
</body>
</html>
<style type="text/css">
.tbCon{
	border:1px solid #808B96;
	margin-top: 30px;
	padding: 20px;
	padding-right: 35px;
	padding-left: 35px;
	border-radius: 3px;
	height: auto;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.2);
}
.topN {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    width: 100%;
    background-color: #3DBADA;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.2);
}
a{
	color: white;
	float: right;
	padding: 15px;
	margin-top: 18px;
	margin-right: 30px;
}
a:hover{
	color: #D7DBDD;
	text-decoration: none;
}
.tbCon > table{
	width: 90%;
	margin-left: 25px;
} 
button{
	margin-top: -15px;
	font-weight: bold;
	color: red;
	background-color: transparent;
	border:none;
} 
.ftRight{
	float: right;
	color: #2471A3;
	margin-right: 3%;
	margin-top: 0px;
	outline: none;
}
.ftRight:hover{
	text-decoration: underline;
	outline: none;
}
#submit{
	background-color: #2980B9;
	padding: 15px;
	padding-top: 10px;
	padding-bottom: 10px;
	color: white;
	border-radius: 5px;
}
table tr td {
	border:1px solid #808B96;
	padding: 10px;
}
table{
	border-radius: 30px;
}
td{
	text-align: center;
}
th{
	border:1px solid #808B96;
	padding: 10px;
	background-color: #5499C7;
	color: white;
}
tr:nth-child(odd) {
	background-color: #EBF5FB;
}

</style>

<script type="text/javascript">
var cnt=1;

function generate_so() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

  for (var i = 0; i < 9; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
function save(){

}
function addMore(){
	var drpType = document.getElementById("drpType").value;
	var drpProd = document.getElementById("drpProd").value;
	var qnt = document.getElementById('qnt').value;
	var name = document.getElementById('name').value;
	//var so = generate_so();
  	var tbl = document.getElementById('tbOrdersForm');
  	document.getElementById('remove').display = 'display';
	var newRow = tbl.insertRow(1);


	var cell1 = newRow.insertCell(0);
	var cell2 = newRow.insertCell(1);
	var cell3 = newRow.insertCell(2);
	var cell4 = newRow.insertCell(3);

	if (drpType == 1) {
		drpType ='Specialty Flour';
	}
	else if(drpType == 2){
		drpType = 'Hard Wheat Flour';
	}
	else if(drpType == 3){
		drpType = 'Soft Wheat Flour';
	}
	else{
		drpType = 'Wheat By-Flour';
	}

	if (drpProd == 1) {
		drpProd ='WOODEN SPOON ALL-PURPOSE-FLOUR';
	}
	else if(drpProd == 2){
		drpProd = 'WOODEN SPOON CAKE FLOUR';
	}
	else if(drpProd == 3){
		drpProd = 'WOODEN SPOON SIOPAO FLOUR';
	}
	else if(drpProd == 4){
		drpProd = 'WOODEN SPOON WHOLE WHEAT FLOUR';
	}
	else if(drpProd == 5){
		drpProd = 'SUN MOON STAR';
	}
	else if(drpProd == 6){
		drpProd = 'SUNSHINE';
	}
	else if(drpProd == 7){
		drpProd = 'GLOWING SUN';
	}
	else if(drpProd == 8){
		drpProd = 'KUTITAP';
	}
	else if(drpProd == 9){
		drpProd = 'GOLD STAR';
	}
	else if(drpProd == 10){
		drpProd = 'MEGASTAR';
	}
	else if(drpProd == 11){
		drpProd = 'WOODEN SPOON TOASTED WHEAT GERM';
	}
	else if(drpProd == 12){
		drpProd = 'HARD SWINE BASED FEEDS';
	}
	else if(drpProd == 13){
		drpProd = 'SOFT SWINE BASED FEEDS';
	}
	else{
		drpProd = 'WHEAT GERM MEAL';
	}

	cell1.innerHTML = '<td class="drpT">'+drpType+'</td>';
	cell2.innerHTML = drpProd;
	cell3.innerHTML = qnt;
	var row = "row"+cnt;
	console.log();
	cell4.innerHTML = '<tr id="'+row+'"><td></td><td><button type="button" name="remove" class="btn_remove" id="'+cnt+'" onclick="delRow(this)">X</button></td></tr>';
	cnt++;
}
function delRow(val){
		var p=val.parentNode.parentNode;
         p.parentNode.removeChild(p);
}
function removeRowFromTable()
{
  var tbl = document.getElementById('tbOrdersForm');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) {
  	tbl.deleteRow(lastRow - 1); 
 }

}
function drpProduct(val) {
	var con = document.getElementById("drpType").value;
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("drpProd").innerHTML = this.responseText; 
            }
        };
        xmlhttp.open("GET","drpProduct.php?q="+con,true);
        xmlhttp.send();  
    document.getElementById("drpProd").disabled = false;
}
$('#save').click(function(){
	var rows = $('#tbOrdersForm tr').length - 2;
	var so = generate_so();
  	var drpT = [];
  	var product = [];
  	var qnt = [];
	var table = $("#tbOrdersForm tbody");

    table.find('tr').each(function (i) {
        var $tds = $(this).find('td'),
            prodT = $tds.eq(0).text(),
            prod = $tds.eq(1).text(),
            Quantity = $tds.eq(2).text();
        // do something with productId, product, Quantity
        		drpT.push(prodT);
        		product.push(prod);
        		qnt.push(Quantity);
    });

	$('.drpT').each(function(){
	});
	console.log(drpT); 
	$.ajax({
	url:"insert.php",
	method:"POST",
	data:{drpT:drpT,so:so, product:product, qnt,qnt},
	success:function(data){
		alert(data);
		location.reload();
	}
	});
	//alert(drpT.push(prodT);)
	});

var arrChk = [];
function chk(val){
	if (document.getElementById("chk"+val).checked) {
		arrChk.push(val);
		console.log(arrChk);
	}
	else{
		arrChk.pop(val);
		console.log(arrChk);
	}
}
$('#proceed').click(function(){
	$.ajax({
	url:"proceed_prod.php",
	method:"POST",
	data:{arrChk:arrChk},
	success:function(data){
		alert(data);
		location.reload();
	}
	});
	//alert(drpT.push(prodT);)
	});
</script>