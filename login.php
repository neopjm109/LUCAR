<?php
	include("header.php");
?>

<div id="loginbox">
	<form id="formLogin" action="index.php" method="post">
	E-mail<br>
	<input type="text" id="loginID" name="loginID"/><br>
	Password<br>
	<input type="password" id="loginPW" name="loginPW"/><br>
	<input type="button" id="login" value="LOGIN"/>	<p>
	<div class="alert">alert</div>
	</form>
</div>

<?php
	include("footer.php");
?>