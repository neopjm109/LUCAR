<?php
include 'lib.php';
?>

<?php
$SellTitle = $_REQUEST['Title'];
$SellerID;
$CarCode;
$SellYear = $_REQUEST['Year'];
$Color;
$SellPrice = $_REQUEST ['Price'];
$SellTransmission = $_REQUEST ['Transmission'];
$SellMileage = $_REQUEST ['Mileage'];
$SellDescription = $_REQUEST ['Description'];
$Date = $_REQUEST['Date'];
$Report;

mysqli_query ( $conn,
		 "INSERT INTO  `naddola`.`sell_list` 
VALUES (
NULL ,  '$SellTitle',  '$SellerID',  '$CarCode',  '$SellYear',  '$Color',  '$SellPrice',  '$SellTransmission',  '$SellMileage',  '$SellDescription',  '$Date',  '$report'
);
		" );
if($conn->affected_rows == 1){
	echo true;
} else {
	echo false;
}

?>