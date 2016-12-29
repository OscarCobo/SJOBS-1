<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     require ('./connection.php');
     $errors = array();
     if (empty($_POST['offer_title'])){
          $errors[] = "You forgot to enter the offer title";
     } else{
          $offertitle= mysqli_real_escape_string($dbc, trim($_POST['offer_title']));
     }
     if (empty($_POST['business'])){
          $errors[] = "You forgot to enter the business";
     } else{
          $business= mysqli_real_escape_string($dbc, trim($_POST['business']));
     }
     if (empty($_POST['description'])){
          $errors[] = "You forgot to enter the offer description";
     } else{
          $description= mysqli_real_escape_string($dbc, trim($_POST['description']));
     }
     
     if (empty($errors)){
          $query = "INSERT INTO offers (offer_title, offer_description, publication_date, end_date, business_id) VALUES ('$offertitle', '$description','CAST(SYSDATETIME() AS DATETIME)',NULL,'$business')";
          $result = @mysqli_query ($dbc, $query);
		if ($result) {
			echo '<h1>The offer was added succesfully!</h1>';	
		} else { 
			echo '<h1>Error!</h1>
			<p class="error">The offer couldn t be registered, sorry!</p>'; 
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
<form action="insertoffer.php" method="post">
     <p>
        Offer Title
     </p>
     <p>
          <input type="text" name="offer_title" size="15" maxlength="50" value="<?php if (isset($_POST['offer_title'])) echo $_POST['offer_title']; ?>" />
     </p>
     <p>
        Business
     </p>
     <p>
          <?php
          mysql_connect("localhost", "emiyakresnik", "");
          mysql_select_db("SJOBS");
          $sql=mysql_query("SELECT business_id, business_name FROM business");
          if(mysql_num_rows($sql)){
               $select= '<select name="business">';
               while($rs=mysql_fetch_array($sql)){
                     $select.='<option value="'.$rs['business_id'].'">'.$rs['business_name'].'</option>';
                }
          }
          $select.='</select>';
          echo $select;
          ?>
     </p>
     <p>
          Description
     </p>
     <p>
          <textarea rows="7" cols="60" name="description"><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
     </p>
     <p>
          <input type="submit" name="submit" value="Register" />
     </p>
</form>