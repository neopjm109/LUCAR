<?php
	include("lib.php");
	
	$carMake = $_REQUEST['make'];
	$carYear = $_REQUEST['year'];
	$carCode = $_REQUEST['code'];
	$carTrans = $_REQUEST['trans'];
	$carColor = $_REQUEST['color'];
	$carPrice = $_REQUEST['price'];
	$carMileage = $_REQUEST['mileage'];
	
	$query = "
			select sl.id, sp.photo_url, cl.model, sl.title, sl.date
			from car_list as cl, sell_list as sl, sell_photo as sp
			where cl.code = sl.car_code	and sp.sell_list_id = sl.id
			";
	
	if ($carYear != '0') {
		$query .= " and sl.year >= '$carYear'";
	}
	
	if ($carCode != '') {
		$query .= " and cl.code = '$carCode'";
	} else {
		$query .= " and cl.make = '$carMake'";
	}
	
	if (count($carTrans) > 0) {
		for ($i=0; $i<count($carTrans); $i++) {
			if($i == 0)
				$query .= " and (sl.transmission = '$carTrans[$i]'";
			else
				$query .= " or sl.transmission = '$carTrans[$i]'";
		}
		$query .= ")";
	}
	
	if ($carColor != '') {
		$query .= " and color = '$carColor'";
	}
	
	if ($carPrice != '0') {
		$query .= " and price <= '$carPrice'";
	}
	
	if ($carMileage != '0') {
		$query .= " and mileage <= '$carMileage'";
	}
	
	$carList = mysqli_query($conn, $query);

	$colCount = 0;
	while ($row = mysqli_fetch_row($carList)) {
		echo "<div class=\"column\"><input type=\"hidden\" id=\"sellNum\" value=\"$row[0]\">";
		echo "<img src=\"$row[1]\">$row[2]<br>$row[3]<br>$row[4]";
		echo "</div>";
			$colCount++;
	}
	
	if ($colCount == 0) {
		echo "No search result";
	}
?>