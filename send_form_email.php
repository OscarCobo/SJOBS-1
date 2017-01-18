<?php
if(isset($_POST['email'])) {
    //Which email is going to recive the email and the subject.
    $email_to = "fransarciat@gmail.com";
    $email_subject = "Contact SJOBS";
    function died($error) {
        //Error message
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    $Name = $_POST['name']; // required
    $Email = $_POST['email']; // required
    $Message = $_POST['message']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$Email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$Name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($Message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "Name: ".clean_string($Name)."\n";
    $email_message .= "Email: ".clean_string($Email)."\n";
    $email_message .= "Message: ".clean_string($Message)."\n";
// create email headers
$headers = 'From: '.$Email."\r\n".'Reply-To: '.$Email."\r\n" .'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
Thank you for contacting us.
<?php
}
?>
