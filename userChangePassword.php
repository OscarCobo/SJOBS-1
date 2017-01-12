<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('./connection.php');
	$errors = array();
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	if (empty($_POST['password'])) {
		$errors[] = 'You forgot to enter your current password';
	} else {
		$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	}
	if (!empty($_POST['new_password1'])) {
		if ($_POST['new_password1'] != $_POST['new_password2']) {
			$errors[] = 'The password\'s doesn\'t match!';
		} else {
			$new_password = mysqli_real_escape_string($dbc, trim($_POST['new_password1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password';
	}
	if (empty($errors)) {
		$query = "SELECT user_id FROM users WHERE (user_email='$email' AND password=SHA1('$password') )";
		$result = @mysqli_query($dbc, $query);
		$num = @mysqli_num_rows($result);
		if ($num == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$query = "UPDATE users SET password=SHA1('$new_password') WHERE user_id=$row[0]";		
			$result = @mysqli_query($dbc, $query);
			if (mysqli_affected_rows($dbc) == 1) {
				echo '<p>Your password has been updated<br>';	
			} else {
				echo '<p>System Error your password could not be changed due to an error.</p>'; 
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query . '</p>';
			}
			mysqli_close($dbc);
			exit();
				
		} else { 
			echo '<p> Error! The email address and password doesn\'t match </p>';
		}
	} else { 
		echo '<p>Error! The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	}
	mysqli_close($dbc);
}
?>
<h1>Change Your Password</h1>
<form action="userChangePassword.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Current Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /></p>
	<p>New Password: <input type="password" name="new_password1" size="10" maxlength="20" value="<?php if (isset($_POST['new_password1'])) echo $_POST['new_password1']; ?>"  /></p>
	<p>Confirm New Password: <input type="password" name="new_password2" size="10" maxlength="20" value="<?php if (isset($_POST['new_password2'])) echo $_POST['new_password2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Change Password" /></p>
</form>