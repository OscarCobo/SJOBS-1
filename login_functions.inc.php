<?php
	//this page define two functions used by the login/logout process.

	function redirect_user($page = 'index.php') {

		//start defining the url
		$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

		//remove any trailing slashes
		$url = rtrim($url, '/\\');

		//add the page
		$url .= '/' . $page;

		//redirect user
		header("Location: $url");
		exit();//quit the script
	}

	function check_login($dbc, $user_email='', $password='') {

		//validate the email
		if (empty($user_email)) {
			$errors[] = 'You forgot to enter your email.';
		}
		
		else {
			$m = mysqli_real_escape_string($dbc, trim($user_email));
		}

		//validate the pass
		if (empty($password)) {
			$errors[] = 'You forgot to enter your pass.';
		}

		else {
			$p = mysqli_real_escape_string($dbc, trim($password));
		}

		if (empty($errors)) { //everything's ok
			
			//retrive the mail with pass combination
			$q = "SELECT user_id, user_name FROM users WHERE user_email='$m' AND password=SHA1('$p')";
			$r = @mysqli_query($dbc, $q); //run the query

			//check the result
			if (mysqli_num_rows($r) == 1) {
				
				// Fetch the record:
				$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

				//fetch the record
				return array(true, $row);
			}

			else {
				$errors[] = 'The mail and pass entered do not match those on file.';
			}
		}

		//return false and the errors
		return array(false, $errors);		
	}


?>