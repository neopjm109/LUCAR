<?php
	include("header.php");
	

	$makeListQuery = mysqli_query($conn, "
			select distinct make
			from car_list
			");
?>

<div id="contents">
	<div id="seller_header">
		<h1>For Seller</h1>
	</div>
	<div id="vehicle_info">
	<h2>Vehicle Info</h2>
		<table>
			<tr>
				<td>Year</td>
				<td><select id="vehicle_year" name="vehicle_year">
<?php
	$y = 2014;
	while ($y >= 1970) {
		echo "<option>$y</option>";
		$y--;
	}
?>
						<option value="0">직접 입력</option>
					</select>
					<input type="text" id="vehicle_year_0"/>
				</td>
			</tr>
			<tr>
				<td>Make</td>
				<td><select id="vehicle_make" name="car_make">
						<option value="0">Any Make</option>
<?php 
	while ($row = mysqli_fetch_row($makeListQuery)) {
		echo "<option>$row[0]</option>";
	}
?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Model</td>
				<td>
					<select id="vehicle_model" name="car_model">
						<option value="0">Any Model</option>
					</select>
				</td>
			</tr>
		
			<tr>
				<td>Mileage</td>
				<td><input type="text" id="vehicle_model"></td>
			</tr>
			
			<tr>
				<td>Price</td>
				<td><input type="text" id="vehicle_model"></td>
			</tr>
			
			<tr>
				<td>Transmission</td>
				<td><input type="text" id="vehicle_model"></td>
			</tr>
			
			<tr>
				<td>Description</td>
				<td><textarea id="vehicle_model" style="resize:none;"></textarea></td>
			</tr>
			
			<tr>
				<td>Photo</td>
				<td></td>
			</tr>
		</table>
	</div>
	
	<div id="contact_info">
		<h2>Contact Info</h2>
		<table>
			<tr>
				<td>Cell Phone</td>
				<td><input type="text"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
		</table>
	</div>
</div>

<?php
	include("footer.php");
?>