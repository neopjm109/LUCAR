<?php
include ("lib.php");
?>

<?php
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
}
if ($colCount == 0) {
	echo "please check your Email or Password";
} else {
	echo "Success";
}

?>

