<?php
	session_start();

	//if no session value is present, redirect the user
	if (!isset($_SESSION['user_id'])) {
		
		//need the function
		require('./login_function.inc.php');
		redirect_user();
	}

	$page_title = 'Logged In!';
	include ('./Menu.html');

	//print a mesage
	echo "<h1>Logged in!</h1>
	<p>You are now logged in, {$_SESSION['user_name']}!</p>
	<p><a href=\"logout.php\">Logout</a></p>";
?>