<?php
include 'lib.php';
?>

<?php
$SignupEmail = $_REQUEST ['Email'];
$SignupPassword = $_REQUEST ['Password'];
$SignupName = $_REQUEST ['Name'];
$SignupPhone = $_REQUEST ['Phone'];

$SignupMember = mysqli_query ( $conn,
		 "INSERT INTO member (id, email, password, name, phone)
		VALUES (NULL ,  '$SignupEmail',  '$SignupPassword',  '$SignupName',  '$SignupPhone');
		" );
if($conn->affected_rows == 1){
	echo "true";
} else {
	echo "false";
}

?>
