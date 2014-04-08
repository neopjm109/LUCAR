<?php
include ("lib.php");

?>

<?php
//member - id, email, password, name, phone
$loginID = $_REQUEST ['ID'];
$loginPW = $_REQUEST ['PW'];
$loginMember = mysqli_query ( $conn, "
			select *
			from member
			where email='$loginID' and password='$loginPW'
			" );

$colCount = 0;
while ( $row = mysqli_fetch_row ( $loginMember ) ) {
	$colCount ++;
	$_SESSION['session_id'] = $row[0];
}
if ($colCount == 0) {
	echo false;
} else {
	echo true;
}

?>
