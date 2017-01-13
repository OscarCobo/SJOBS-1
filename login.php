<?php
	//This pages processes the login form submission
	
	//Check if the form has been sunmitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		//need two files
		require('./login_functions.inc.php');
		require('./mysqli_connect.php');

		//check the login
		list($check, $data) = check_login($dbc, $_POST['user_email'], $_POST['password']);

		if ($check) { // ok!
			
			//set the session data
			session_start();
			$_SESSION['user_id'] = $data['user_id']; 
			$_SESSION['user_name'] = $data['user_name'];
			
			//redirect
			redirect_user('loggedin.php');
		}

		else {

			//asign $data to $errors for login_page.inc.php
			$errors=$data;
		}

		msqli_close($dbc); //close the database connection
	} //end of the main submit conditional
?>