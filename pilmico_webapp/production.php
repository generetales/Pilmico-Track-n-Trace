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
		<div class="tbCon" style="margin-top: 100px;">
			<h3>Orders for Production</h3>
			<button style="float: right;margin-right: 8%;margin-bottom: 10px; padding: 15px;background-color: #D35400;color: white;border-radius: 5px;padding-top: 8px;padding-bottom: 8px;" id="proceed">Proceed to RM Issuance &#8594;</button>
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
					$query = "Select * from product_tracking where status = 'Production Planning'";
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
	url:"proceed_rm.php",
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