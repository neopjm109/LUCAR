<?php
	include("header.php");
?>

<div id="signupbox">
	E-mail&nbsp;&nbsp;&nbsp;
	<span class="alert">Please write a e-mail</span><br>
	<input type="text" name="signID"/><br>
	
	Password&nbsp;&nbsp;&nbsp;
	<span class="alert">Please write a password</span><br>
	<input type="password" name="signPW"/><br>
	
	Password check&nbsp;&nbsp;&nbsp;
	<span class="alert">Please check a password</span><br>
	<input type="password" name="signPW"/><br>
	
	Name&nbsp;&nbsp;&nbsp;
	<span class="alert">Please write a name</span><br>
	<input type="text" name="signName"/><br>
	
	Phone&nbsp;&nbsp;&nbsp;
	<span class="alert">Please write a phone number</span><br>
	<input type="text" name="signPhone"/><br>
	<input type="button" value="Sign Up"/><br>
</div>

<?php
	include("footer.php");
?>