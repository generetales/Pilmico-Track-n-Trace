<?php
include('conn.php');

$arrChk = $_POST["arrChk"];

$count = count($arrChk); 
for ($i=0; $i < $count; $i++) { 
  $sql = "
  UPDATE product_tracking set status = 'RM Issuance' where id = $arrChk[$i]"; 
  mysqli_query($con, $sql);
}
    echo "Update record successfully";

//LOGS
$date = date('Y-m-d h:i:sa');
$sql = "
INSERT INTO logs (log,activity, date)VALUES ('Production Department', 'Proceed orders for raw material issuance', '$date')"; 
mysqli_query($con, $sql);
?>

