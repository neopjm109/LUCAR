<?php
	include("lib.php");
	
	$carMake = $_REQUEST['make'];
	$carYear = $_REQUEST['year'];
	$carModel = $_REQUEST['model'];
	
	$carList = mysqli_query($conn, "
			select m.name, sp.img, sl.*
			from car_list as cl, sell_list as sl, member as m, sell_photo as sp
			where (cl.make = '$carMake' and cl.year ='$carYear' and cl.model ='$carModel')
			and (cl.id = sl.car and sl.seller = m.email)
			and (sp.sell = sl.id)
			");
	
	$colCount = 0;
	while ($row = mysqli_fetch_row($carList)) {
		echo "<div class=\"column\"><input type=\"hidden\" id=\"carNum\" value=\"$row[0]\">";
		echo "<img src=\"$row[1]\">Name: $row[0]<br>$row[5]<br>$row[7]";
		echo "</div>";
				$colCount++;
	}
	if ($colCount == 0) {
		echo "No search result";
	}
?>