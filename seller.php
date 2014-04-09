<?php
	include("header.php");
	
	
	//login 안되있으면 로그인 하러 가기
	if($_SESSION['session_id']==NULL){
		echo "<script>alert(\"Please Login\");</script>";
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}
	
	$UserID = $_SESSION['session_id'];

	$makeListQuery = mysqli_query($conn, "
			select distinct make
			from car_list
			");
	
	$UserQuery = mysqli_query($conn, "
			select email, phone
			from member
			where id = $UserID
			");
	
	

?>

<div id="contents">
	<div id="seller_header">
		<h1>For Seller</h1>
	</div>
	
	<div id="sell_title">
	<h2>Title</h2>
	<input type="text" id="sellTitle" size="100">
	</div>
	<div id="vehicle_info">
	<h2>Vehicle Info</h2>
		<table>
			<tr>
				<td>Year</td>
				<td><select id="sellYear" name="vehicle_year">
<?php
	$y = 2014;
	while ($y >= 1970) {
		echo "<option>$y</option>";
		$y--;
	}
?>
						<option value="0">직접 입력</option>
					</select>
					<input type="text" id="sellYear_0"/>
				</td>
			</tr>
			<tr>
				<td>Make</td>
				<td><select id="sellMake" name="car_make">
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
					<select id="sellModel" name="car_model">
						<option value="0">Any Model</option>
					</select>
				</td>
			</tr>
		
			<tr>
				<td>Mileage</td>
				<td><input type="text" id="sellMileage"></td>
			</tr>
			
			<tr>
				<td>Price</td>
				<td><input type="text" id="sellPrice"></td>
			</tr>
			
			<tr>
				<td>Transmission</td>
				<td>
					<select id="sellTransmission">
						<option value="auto">Auto</option>
						<option value="stick">Stick</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Description</td>
				<td><textarea id="sellDescription" style="resize:none;"></textarea></td>
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
				<?php 
	$row = mysqli_fetch_row($UserQuery) ;
		echo "<td><input type=\"text\" value=$row[1]";
?>
			</tr>
			<tr>
				<td>Email</td>
				<?php 
		echo "<td><input type=\"text\" value=$row[0]";
?>
			</tr>
			<tr>
				<td></td>
			</tr>
		</table>
	</div>
	<input type="button" id="registerSell" value="Register"/>
</div>

<?php
	include("footer.php");
?>