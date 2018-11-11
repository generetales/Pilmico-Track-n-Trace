<?php
include('conn.php');
$id = intval($_GET['q']);
$val = intval($_GET['val']);

$query = "Select * from product where type_id = $id";
$result = $con->query($query);
?>
<select id="drpProd"> 
	<?php
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