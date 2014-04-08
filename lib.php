<?php session_start ();
$_SESSION['session_id'];
$conn = mysqli_connect ( "localhost", "naddola", "wjs!gus!cjf!", "naddola" );
mysqli_query ( $conn, "SET NAMES UTF8" );
?>