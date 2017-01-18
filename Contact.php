<?php 
include ('../REUSE CODE/Menu.html'); 
include ('../REUSE CODE/Head.html');
?>
<!DOCTYPE html>
<head>
    <title>Contact</title>
</head>
<html lang="en" spellcheck="true">
<body class="hero contact-page">
    <div class="w-container heading-wrapper">
        <h1 class="main-heading">Want to contact us? Complete this form!</h1>
    </div>
        <div class="w-container">
            <div class="w-form form">
                <form name="contactform" action="send_form_email.php" method="post">
                <label class="field" for="name">Name</label>
                <input class="w-input input" name="name" type="text" placeholder="Enter your name" maxlength="100" required="required">
                <label class="field" for="email">Email Address</label>
                <input class="w-input input" name="email" type="text" placeholder="Enter your email address" maxlength="200" required="required">
                <label class="field" for="field">Message</label>
                <textarea class="w-input input text-area" name="message" placeholder="Write your message" maxlength="5000"></textarea>
                <input class="w-button button submit" type="submit" value="Submit"></form>
            </div>
        </div>
</body>
</html>
