<?php
	include("header.php");

	$makeListQuery = mysqli_query($conn, "
			select distinct make
			from car_list
			");
	
	$carMake = $_REQUEST['car_make'];
	$carYear = $_REQUEST['car_year'];
	
	if ($_REQUEST['car_model']) {
		$carCode = $_REQUEST['car_model'];

		$carList = mysqli_query($conn, "
				select sl.id, sp.photo_url, cl.model, sl.title, sl.date
				from car_list as cl, sell_list as sl, sell_photo as sp
				where cl.code='$carCode' and sl.year = '2013'
				and cl.code = sl.car_code
				and sp.sell_list_id = sl.id
				");
	} else {
		
		$carList = mysqli_query($conn, "
				select sl.id, sp.photo_url, cl.model, sl.title, sl.date
				from car_list as cl, sell_list as sl, sell_photo as sp
				where cl.make = '$carMake' and sl.year ='$carYear'
				and cl.code = sl.car_code and (sp.sell_list_id = sl.id)
				");
	}
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
<?php 
	while ($row = mysqli_fetch_row($makeListQuery)) {
		echo "<option>$row[0]</option>";
	}
?>
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
	필터, 조건변경 => 옆메뉴<br>
	Model, Year, Make<br>
	Color, Transmission(수동/자동), Mile(내 위치와의 거리), Mileage(차의 이동거리), Price
	<div id="car_list">
<?php 
	$colCount = 0;
	while ($row = mysqli_fetch_row($carList)) {
		echo "<div class=\"column\"><input type=\"hidden\" id=\"sellNum\" value=\"$row[0]\">";
		echo "<img src=\"$row[1]\">$row[2]<br>$row[3]<br>$row[4]";
		echo "<br>가격, 올린날짜, 조회수(IP or 1일)";
		echo "<br></div>";
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