<?php
	include("lib.php");
	$carNum = $_REQUEST['car_num'];
	
	$carResult = mysqli_query($conn, "
			select *
			from car_list
			where id = '$carNum'
			");
	
	while ($row = mysqli_fetch_row($carResult)) {
		echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>".$row[3];
	}
?>