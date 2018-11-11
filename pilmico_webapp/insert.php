<?php
include('conn.php');

$drpT = $_POST["drpT"];
$so = $_POST["so"];
$date = date('Y-m-d h:i:sa');
$count = count($drpT) - 1; 
$product = $_POST["product"];
$qnt= $_POST["qnt"];
for ($i=1; $i < $count; $i++) { 

  $sql = "
  INSERT INTO product_tracking (sales_order,date_order, prod_type, product, quantity, status)VALUES ('$so', '$date', '$drpT[$i]', '$product[$i]', $qnt[$i], 'Order Taking')"; 
  mysqli_query($con, $sql);
}
  echo "New record created successfully";

//LOGS
$sql = "
INSERT INTO logs (log,activity, date)VALUES ('Order Taking Department', 'Add new orders from $so', '$date')"; 
mysqli_query($con, $sql);

?>
