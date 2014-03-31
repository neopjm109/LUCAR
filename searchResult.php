<?php
	include("header.php");
	
	$carMake = $_REQUEST['car_make'];
	$carYear = $_REQUEST['car_year'];
	$carModel = $_REQUEST['car_model'];

	$carList = mysqli_query($conn, "
			select *
			from car_list
			where make = '$carMake'
			");
?>

<div id="contents">

	<div id="car_list">
<?php 
	while ($row = mysqli_fetch_row($carList)) {
		echo "<div class=\"column\"><input type=\"hidden\" id=\"carNum\" value=\"$row[0]\">";
		echo "Make: ".$row[1]."<br>Year: ".$row[2]."<br>Model: ".$row[3];
		echo "</div>";
	}
?>
	</div>

</div>

	
<div id="car_page">

</div>
<?php 
?>