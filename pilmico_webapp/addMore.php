<tr>
	<td>
		<label>Type: 
		<select>
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
		</label>
	</td>
	<td>
		<label>Product: 
		<select id="drpProd" disabled=""></select>
	</td>
	<td>
		<label>Quantity: 
		<input type="number" name="qnt" min='1' value="1">
	</td>
	<td >
		<button style="color: transparent;cursor: default;" disabled>Remove</button>
	</td>
</tr>