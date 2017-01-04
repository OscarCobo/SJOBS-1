<!--Menu-->
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
        <h1 class="main-heading">Reach out! Let's start something together</h1>
    </div>
        <div class="w-container">
            <div class="w-form form">
                <!--Conseguir que funcione bien y envie el mail,
                Ya está el codigo php hecho pero no funciona, REVISAR
                -->

                <!--Fields to complete-->
                <form action="../FORMULARIOS/ContactForm.php">
                <label class="field" for="name">Name</label>
                <input class="w-input input" name="Name" type="text" placeholder="Enter your name" maxlength="100" required="required">

                <label class="field" for="email">Email Address</label>
                <input class="w-input input" name="Email" type="text" placeholder="Enter your email address" maxlength="200" required="required">

                <label class="field" for="field">Message</label>
                <textarea class="w-input input text-area" name="Message" placeholder="Write your message" maxlength="5000"></textarea>

                <input class="w-button button submit" type="submit" value="Submit"></form>

                <div class="w-form-done success">
                    <p class="success-message">Thank you! We'll be in touch shortly.</p>
                </div>

                <div class="w-form-fail">
                    <p> Oops! Something went wrong while submitting the form</p>
                </div>

            </div>
        </div>
</body>
</html>