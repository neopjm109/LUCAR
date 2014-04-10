<?php

include 'lib.php';

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

$row = mysqli_fetch_row(
		mysqli_query ( $conn,
			"SELECT id
			FROM 	`naddola`.`sell_list`
			WHERE	title='$SellTitle'" )
);

echo $row[0];
echo $SellTitle;


mysqli_query ( $conn,
"INSERT INTO  `naddola`.`sell_photo` (
`id` ,`sell_list_id` ,`photo_url`)
VALUES (
NULL ,  '$row[0]',  'img/pjm_audi_2013_a3.jpg'
);" );
?>