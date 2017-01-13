<?php
	//this page lets the user logout

session_start();

//if no session variable exists, redirects user:
if (!isset($_SESSION['user_id'])) {
	//need the function:
	require('./login_functions.inc.php');
	redirect_user();
} else {
	//cancel the session

	$_SESSION = array(); //clear the variables
	session_destroy(); //destroy the session itself
	setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0); //destroy cookies
}

//set the page title and include the html header
$page_title = 'Logged Out!';
include('./Menu.html');

//print a customized message
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";

?>