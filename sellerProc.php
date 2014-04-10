<!-- 
색깔이랑 레포트 유무 아직
-->
<?php
include 'lib.php';


?>

<?php

$SellTitle = $_REQUEST['Title'];
$SellerID = $_SESSION['session_id'];
$Model = $_REQUEST['Model'];
$SellYear = $_REQUEST['Year'];
$Color = "#ffffff";
$SellPrice = $_REQUEST ['Price'];
$SellTransmission = $_REQUEST ['Transmission'];
$SellMileage = $_REQUEST ['Mileage'];
$SellDescription = $_REQUEST ['Description'];
$Date = $_REQUEST['Date'];
$Report;

mysqli_query ( $conn,
		 "INSERT INTO  `naddola`.`sell_list` 
VALUES (
NULL ,  '$SellTitle',  '$SellerID',  '$Model',  '$SellYear',  '$Color',  '$SellPrice',  '$SellTransmission',  '$SellMileage',  '$SellDescription',  '$Date',  '$report'
);
		" );
if($conn->affected_rows == 1){
	echo true;
} else {
	echo false;
}

?>