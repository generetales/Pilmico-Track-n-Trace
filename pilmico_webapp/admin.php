<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
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
		<div class="tbCon">
			<table>
				<tr style="background-color: transparent">
					<td style="border: none;text-align: left;"><h3>Logs History</h3></td>
					<td style="border: none;width: 40%">
						<input type="text" name="search">
						<button style="color: #2980B9">Search</button>
					</td>
				</tr>
			</table>			
			<table id="">

				<tr>
					<th>Log</th>
					<th>Activity</th>
					<th>Date</th>
					<TH></TH>
				</tr>
					<?php
					$query = "Select * from logs order by date desc";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {  
								$id=$row["id"]; 
								$log=$row["log"];
								$act=$row["activity"];
								$date=$row["date"];
								?>
								<tr id="">
									<td id=<?php echo "so".$id;?>><?php echo "$log";?></td>
									<td id=<?php echo "prod_t".$id;?>><?php echo "$act";?></td>
									<td id=<?php echo "prod".$id;?>><?php echo "$date";?></td>
									<td><button style="font-weight: bold;color: #808B96;font-size: 20px;" id="<?php echo 'rm'.$id;?>" onclick="rm(<?php echo $id;?>);">&#128438;</button></td>
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
	});
</script>