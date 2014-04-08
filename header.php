<?php
	include("lib.php");
	
	$Email;
	if($_SESSION['session_id']){
		$ID = $_SESSION['session_id'];
		$EmailQuery = mysqli_query($conn, "
			select email
			from member
			where id=$ID
			");
		while ($row = mysqli_fetch_row($EmailQuery)) {
			$Email = $row[0];
		}
	}
?>

<!DOCTYPE html>

	<head>
		<title>L U C A R</title>
	</head>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
	<link rel="stylesheet" href="css/header.css"/>
	<link rel="stylesheet" href="css/car.css"/>
	<link rel="stylesheet" href="css/seller.css"/>
	<body>
	<div id="menubar">
		<ul id="menu">
			<li><a href="/">HOME</a></li>
			<li><a href="inspector.php">For Inspector</a></li>
			<li><a href="seller.php">For Seller</a></li>
			<?php 
			if($_SESSION['session_id']){
				echo "<li><a href=\"logoutProc.php\">$Email</a></li>";
				echo "<li><a href=\"logoutProc.php\">Logout</a></li>";
			}
			else{
				echo "<li><a href=\"login.php\">Login</a></li>";
				echo "<li><a href=\"signup.php\">Sign Up</a></li>";
			}
			?>
		</ul>
	</div>

<?php 
?>