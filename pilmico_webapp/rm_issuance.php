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

	<?php 
		include('conn.php');
    ?>
	<div class='topN'>
	  	<img src="image/pilmico_logo_white.png" class="imgLogin" style="width: 180px;height: auto;padding: 15px;margin-left: 5%;">
	  	<a href='logout.php'>Logout</a>
	</div>
	<div class='container'>
		<div class="tbCon" style="">
			<h3>Raw Materials Issuance</h3>
			<button style="float: right;margin-right: 8%;margin-bottom: 10px; padding: 15px;background-color: #D35400;color: white;border-radius: 5px;padding-top: 8px;padding-bottom: 8px;" id="proceed">Proceed to Production &#8594;</button>
			<table id="" style="width: 90%;">
				<tr>
					<th>Sales Order</th>
					<th class="drpType">Product Type:</th>
					<th>Product</th>
					<th>Quantity</th>
				</tr>
				<tr id="rowTemplate">
					<td>
						<input type="text" name="sales_o" id="sales_o">
					</td>
					<td class='prod'>
						<input type="text" name="prod_type" id="prod_type">
					</td>
					<td class='prod'>
						<input type="text" name="prod" id="prod">
					</td>
					<td class="prod_qnt">
						<input type="number" name="qnt" id="qnt" min='1' value="0">
					</td>
				</tr>
			</table>
			<table id="" style="margin-top: 20px;border: none;background-color: transparent;width: 90%;">
				<tr id="rowTemplate" style="border: none;background-color: transparent;">
					<td style="border: none;">
						<label>Manufacturer:
							<select>
								<option>Feedmill 1</option>
								<option>Feedmill 2</option>
							</select>
						</label>
					</td>
					<td style="border: none;">
						<label>Type of material:
							<select>
								<option>Line 1</option>
								<option>Line 2</option>
							</select>
						</label>
					</td>
					<td style="border: none;">
						<label>Location: 
							<select>
								<option>Location 1</option>
								<option>Location 2</option>
								<option>Location 3</option>
							</select>
						</label>
					</td>
				</tr>				
			</table>

		</div>
		<div class="tbCon">
			<h3>Pending for RM Issuance</h3>
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
					$query = "Select * from product_tracking where status = 'RM Issuance'";
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
									<td id=<?php echo "so".$id;?>><?php echo "$so";?></td>
									<td id=<?php echo "prod_t".$id;?>><?php echo "$prodType";?></td>
									<td id=<?php echo "prod".$id;?>><?php echo "$prod";?></td>
									<td id=<?php echo "qnt".$id;?>><?php echo "$qnt";?></td>
									<td><?php echo "$date_order";?></td>
									<td><button style="font-weight: bold;color: #808B96" id="<?php echo 'rm'.$id;?>" onclick="rm(<?php echo $id;?>);">&#128722;</button></td>
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
/*var arrChk = [];
function rm(val){
	var so = document.getElementById("so"+val).innerHTML;
	var prod_type = document.getElementById("prod_t"+val).innerHTML;
	var prod = document.getElementById("prod"+val).innerHTML;
	var qnt = document.getElementById("qnt"+val).innerHTML;
	
	document.getElementById("sales_o").value = so;
	document.getElementById("prod_type").value = prod_type;
	document.getElementById("prod").value = prod;
	document.getElementById("qnt").value = qnt;
}
$('#proceed').click(function(){
	$.ajax({
	url:"proceed_rm.php",
	method:"POST",
	data:{arrChk:arrChk},
	success:function(data){
		alert(data);
		location.reload();
	}
	});
	//alert(drpT.push(prodT);)
	});*/
</script>