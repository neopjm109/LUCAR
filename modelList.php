<?php
	include("lib.php");
	
	$make = $_REQUEST['make'];
	
	$result = mysqli_query($conn, "
			select *
			from car_list
			where make = '$make';
			");

	echo "<option value=\"0\">Any Model</option>";
	while ($row = mysqli_fetch_row($result)) {
		echo "<option>$row[3]</option>";
	}
?>