<?php
	$page_title = 'Register';
	include ('./Menu.html');
	include ('./head.html');

	// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require ('./mysqli_connect.php'); // Connect to the db.
			
		$errors = array();
		
		// Check for a first name:
		if (empty($_POST['user_name'])) {
			$errors[] = 'You forgot to enter your first name.';
		} else {
			$fn = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
		}
		
		// Check for a last name:
		if (empty($_POST['surname'])) {
			$errors[] = 'You forgot to enter your surname.';
		} else {
			$ln = mysqli_real_escape_string($dbc, trim($_POST['surname']));
		}
		
		// Check for an email address:
		if (empty($_POST['user_email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['user_email']));
		}
		
		// Check for a password and match against the confirmed password:
		if (!empty($_POST['pass1'])) {
			if ($_POST['pass1'] != $_POST['pass2']) {
				$errors[] = 'Your password did not match the confirmed password.';
			} else {
				$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			}
		} else {
			$errors[] = 'You forgot to enter your password.';
		}
		
		if (empty($errors)) { // If everything's OK.
		
			// Register the user in the database...
			
			// Make the query:
			$q = "INSERT INTO users (user_name, surname, user_email, password) VALUES ('$fn', '$ln', '$e', SHA1('$p') )";		
			$r = @mysqli_query ($dbc, $q); // Run the query.
			if ($r) { // If it ran OK.
			
				// Print a message:
				echo '<h1>Thank you!</h1>
			<p>You are now registered.</p><p><br /></p>';	
			
			} else { // If it did not run OK.
				
				// Public message:
				echo '<h1>System Error</h1>
				<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
							
			} // End of if ($r) IF.
			
			mysqli_close($dbc); // Close the database connection.

			
			exit();
			
		} else { // Report the errors.
		
			echo '<h1>Error!</h1>
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</p><p>Please try again.</p><p><br /></p>';
			
		} // End of if (empty($errors)) IF.
		
		mysqli_close($dbc); // Close the database connection.

	} // End of the main Submit conditional.
	?>
	<h1>Register</h1>
	<form action="register_user.php" method="post">
		<p>First Name: <input type="text" name="user_name" size="15" maxlength="20" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>" /></p>
		<p>Last Name: <input type="text" name="surname" size="15" maxlength="40" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" /></p>
		<p>Email Address: <input type="text" name="user_email" size="20" maxlength="60" value="<?php if (isset($_POST['user_email'])) echo $_POST['user_email']; ?>"  /> </p>
		<p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
		<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
		<p><input type="submit" name="submit" value="Register" /></p>
	</form>