<?php
	
	$page_title = 'Login';
	include('./Menu.html');
	include('./Head.html');

	//print any error messages, if they exist
	if (isset($errors) && !empty($errors)) {
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) ocurred:<br />';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	}

	//display the form
?><h1>Login</h1>
<form action="login.php" method="post">
	<p>Email: <input type="text" name="user_email" size="20" maxlength="30" /></p>
	<p>Password: <input type="password" name="password" size="20" maxlength="20"></p>
	<p><input type="submit" name="submit" value="Login"></p>
</form>