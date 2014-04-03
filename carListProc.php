<?php
	include("lib.php");
	
	$carMake = $_REQUEST['make'];
	$carYear = $_REQUEST['year'];
	
	if ($_REQUEST['code'] != '0') {
		$carCode = $_REQUEST['code'];		

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