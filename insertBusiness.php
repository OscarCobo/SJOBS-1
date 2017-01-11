<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     require ('./connection.php');
     $errors = array();
     if (empty($_POST['business_name'])){
          $errors[] = "You forgot to enter the business name!";
     } else{
          $business_name= mysqli_real_escape_string($dbc, trim($_POST['business_name']));
     }
     if (empty($_POST['email'])){
          $errors[] = "You forgot to enter the business email!";
     } else{
          $business_email= mysqli_real_escape_string($dbc, trim($_POST['email']));
     }
     if(empty($_POST['image'])){
          $errors[] = "You forgot to enter the business image!!";
     }else{
          $business_image=mysqli_real_escape_string($dbc, trim($_POST['image']));
     }
     if(empty($_POST['description'])){
          $errors[] = "You forgot to enter the business description!!";
     }else{
          $business_description=mysqli_real_escape_string($dbc, trim($_POST['description']));
     }
     
     if (empty($errors)){
          $query = "INSERT INTO business (business_name, business_email, business_description, business_image) VALUES ('$business_name', '$business_email','$business_description','$business_image')";
          $result = @mysqli_query ($dbc, $query);
		if ($result) {
			echo '<h1>The business was added succesfully!</h1>';	
		} else { 
			echo '<h1>Error!</h1>
			<p class="error">The business couldn t be registered, sorry!</p>'; 
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query . '</p>';
		} 
		mysqli_close($dbc);
		exit();
	} else {
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	}
	mysqli_close($dbc);
          
}
?>
<form action="insertBusiness.php" method="post">
     <p>
        Business Name
     </p>
     <p>
          <input type="text" name="business_name" size="15" maxlength="50" value="<?php if (isset($_POST['business_name'])) echo $_POST['business_name']; ?>" />
     </p>
     <p>
        Business Email
     </p>
     <p>
          <input type="text" name="email" size="15" maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
     </p>
     <p>
          Business Image
     </p>
     <p>
          <input type="text" name="image" size="15" maxlength="500" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>" />          
     </p>
     <p>
          Business Description
     </p>
     <p>
          <textarea rows="7" cols="60" name="description"><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
     </p>
     <p>
          <input type="submit" name="submit" value="Register" />
     </p>
</form>