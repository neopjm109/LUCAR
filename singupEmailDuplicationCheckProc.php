<?php
include 'lib.php';
?>
	
<?php
$Email = $_REQUEST ['Email'];

$useEmail = mysqli_query ( $conn,
 "SELECT email
  FROM member
  WHERE email='$Email'" );

  if($useEmail->num_rows == 0){
  	echo true;
  }
  else{
  	echo false;
  	}
?>

