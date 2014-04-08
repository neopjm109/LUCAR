<?php
	include("lib.php");
	
	$make = $_REQUEST['make'];
	
	$result = mysqli_query($conn, "
			select *
			from car_list
			where make = '$make';
			");

	$modelCount = 0;
	while ($row = mysqli_fetch_row($result)) {
		if($carCode == $row[0]){
			echo "<input type=\"radio\" name='result_model' id='model_$modelCount' value='$row[0]' checked/>";
		} else {
			echo "<input type=\"radio\" name='result_model' id='model_$modelCount' value='$row[0]'/>";
		}
		echo "<label for='model_$modelCount'>$row[2]</label><br>";
		$modelCount++;
	}
?>