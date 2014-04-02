<?php
	include("header.php");
	
	$carMake = $_REQUEST['car_make'];
	$carYear = $_REQUEST['car_year'];
	$carModel = $_REQUEST['car_model'];

	$carList = mysqli_query($conn, "
			select m.name, sp.img, sl.*
			from car_list as cl, sell_list as sl, member as m, sell_photo as sp
			where (cl.make = '$carMake' and cl.year ='$carYear' and cl.model ='$carModel')
			and (cl.id = sl.car and sl.seller = m.email)
			and (sp.sell = sl.id)
			");
?>

<div id="contents">
	<div id="car_menu">
		<ul>
			<li>Transmission</li>
			<li>Exterior</li>
			<li>Mileage</li>
			<li>Price</li>
			<li>Seller Type</li>
		</ul>
	</div>

	<div id="car_searchbar">
		<select id="car_make" name="car_make">
			<option value="0">Any Make</option>
			<option>Audi</option>
			<option>BMW</option>
			<option>Lexus</option>
			<option>Mercedez-Benz</option>
			<option>Porsche</option>
		</select>
		<select id="car_year" name="car_year">
			<option value="0" >Year</option>
<?php
	$y = 2014;
	while ($y >= 1970) {
		echo "<option>$y</option>";
		$y--;
	} 
?>
		</select>
		<select id="car_model" name="car_model">
			<option value="0">Any Model</option>
		</select>
		<input type="button" id="search" value="Search"/>
	</div>
	
	<div id="car_list">
<?php 
	$colCount = 0;
	while ($row = mysqli_fetch_row($carList)) {
		echo "<div class=\"column\"><input type=\"hidden\" id=\"sellNum\" value=\"$row[2]\">";
		echo "<img src=\"$row[1]\">Name: $row[0]<br>$row[5]<br>$row[7]";
		echo "</div>";
		$colCount++;
	}
	if ($colCount == 0) {
		echo "No search result";
	}
?>
	</div>

</div>

	
<div id="car_page"></div>
<div id="black_overlay">1</div>

<?php 
?>