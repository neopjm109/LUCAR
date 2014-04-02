<?php
	include("header.php");
?>

<div id="contents">
	
	<div id="logoImg">
		<span>L U C A R</span>
	</div>
	<form id="carSearch" action="searchResult.php" method="post">
	<div id="searchbar">
		<select id="car_make" name="car_make">
			<option value="0">Any Make</option>
			<option>Audi</option>
			<option>BMW</option>
			<option>Lexus</option>
			<option>Mercedez-Benz</option>
			<option>Porsche</option>
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
	</form>
	<br>
	<div class="alert">alert</div>
</div>

<?php 
	include("footer.php");
?>