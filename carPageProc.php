<?php
	include("lib.php");
	$sellNum = $_REQUEST['sell_num'];
	
	$carResult = mysqli_query($conn, "
			select sp.img, sl.*
			from sell_list as sl, sell_photo as sp
			where sl.id = '$sellNum' and sl.id = sp.sell 
			");
	
	while ($row = mysqli_fetch_row($carResult)) {
		echo "<div id=\"car_page_close\"><img src=\"img/close.png\" width=\"20\"></div>";
		echo "<div id=\"car_page_img\">";
		echo "<img src=\"$row[0]\"></div>";
		echo "<div id=\"car_page_contents\">$row[1]<br>$row[2]<br>$row[4]<br>$row[5]<br>$row[6]<br>$row[7]</div>";
	}
?>