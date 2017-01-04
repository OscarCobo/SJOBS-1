<?php 
 if(isset($_POST['email'])) {
 	$email_to = "fransarciat@gmail.com";
 	$email_subject = "Contact SJOBS";
 	$email_from = $_POST['Email'];

 	if(!isset($_POST['Name']) || !isset($_POST['Email']) || !isset($_POST['Message'])){
 		echo "ERROR!!";
 		die();
 	}

 	$email_message = "Detalles";

 	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);
	echo "WORK WELL!!!!";
}
else{
	echo "Don't Work!!!";
}


/*$name = $_POST['Name'];
$email = $_POST['Email'];
$message = $_POST['Message'];
if (!empty($name) && !empty($email) && !empty($message)){
	echo 'Ha funcionado';
}
else{
	echo "Algo Falla";
}*/

?>