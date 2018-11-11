<?php
include('conn.php');

$arrChk = $_POST["arrChk"];

$count = count($arrChk); 
for ($i=0; $i < $count; $i++) { 
  $sql = "
  UPDATE product_tracking set status = 'Production Planning' where id = $arrChk[$i]"; 
  mysqli_query($con, $sql);
}
    echo "Update record successfully";

//LOGS
$date = date('Y-m-d h:i:sa');
$sql = "
INSERT INTO logs (log,activity, date)VALUES ('Order Taking Department', 'Proceed orders from production planning department', '$date')"; 
mysqli_query($con, $sql);
?>

