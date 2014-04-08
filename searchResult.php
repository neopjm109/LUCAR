<?php
	include("header.php");
	
	$makeListQuery = mysqli_query($conn, "
			select distinct make
			from car_list
			");
	
	$carMake = $_REQUEST['car_make'];
	$carYear = $_REQUEST['car_year'];
	
	$modelList = mysqli_query($conn, "
			select *
			from car_list
			where make = '$carMake';
			");
	
	if ($_REQUEST['car_model']) {
		$carCode = $_REQUEST['car_model'];
	
		$carList = mysqli_query($conn, "
				select sl.id, sp.photo_url, cl.model, sl.title, sl.date
				from car_list as cl, sell_list as sl, sell_photo as sp
				where cl.code='$carCode' and sl.year = '$carYear'
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

	$carColor = mysqli_query($conn, "
				select code, name
				from color
				");
?>

<div id="contents">

	<div id="car_searchbar">
		<div id="result_make">
<?php 
		$makeCount = 0;
		while ($row = mysqli_fetch_row($makeListQuery)) {
			if($carMake == $row[0]) {
				echo "<input type=\"radio\" name='result_make' id='make_$makeCount' value='$row[0]' checked/>";
			} else {
				echo "<input type=\"radio\" name='result_make' id='make_$makeCount' value='$row[0]'/>";
			}
			echo "<label for='make_$makeCount' >$row[0]</label><br>";
			$makeCount++;
		}
?>
		</div>
		
		<div id="result_model">
<?php
		$modelCount = 0;
		while ($row = mysqli_fetch_row($modelList)) {
			if($carCode == $row[0]){
				echo "<input type=\"radio\" name='result_model' id='model_$modelCount' value='$row[0]' checked/>";
			} else {
				echo "<input type=\"radio\" name='result_model' id='model_$modelCount' value='$row[0]'/>";
			}
			echo "<label for='model_$modelCount'>$row[2]</label><br>";
			$modelCount++;
		}
?>
		</div>
		
		<div>
		<select id="result_year" name="car_year">
			<option value="0" >Year</option>
<?php
	$y = 2014;
	while ($y >= 1970) {
		if($carYear == $y)
			echo "<option selected>$y</option>";
		else
			echo "<option>$y</option>";
		$y--;
	} 
?>
		</select>
		</div>
	</div>
	
	<div id="car_detail">
	
		<div id="result_price">
			<select>
				<option value="0">Any Price</option>
			</select>	
		</div>
		
		<div id="result_color">
<?php
		$colorCount = 0;
		while ($row = mysqli_fetch_row($carColor)) {
			echo "<input type=\"radio\" name='car_color' id='color_$colorCount' value='$row[0]'/>";
			echo "<label for='color_$colorCount'>$row[1]</label><br>";
			$colorCount++;
		}
?>
		</div>
		
		<div id="result_trans">
			<input type="checkbox" id="result_trans_a" name="result_trans" value="Auto"/>
			<label for="result_trans_a">Auto</label><br>
			<input type="checkbox" id="result_trans_m" name="result_trans" value="Manual"/>
			<label for="result_trans_m">Manual</label>
		</div>
		
		<div id="result_mile">
		<select>
			<option value="0">Any Mile</option>	
		</select>
		</div>
		
		<div id="result_mileage">
			<select>
				<option value="0">Any Mileage</option>	
			</select>
		</div>
	</div>
	
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


<div id="side_menu">
	내가 바로 옆메뉴다!
</div>
<?php 
?>