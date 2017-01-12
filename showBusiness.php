<?php
require ('./connection.php');
$query = "SELECT * FROM business";		
$result = @mysqli_query ($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0) {
	echo '<table align="center" cellspacing="2" cellpadding="2" width="100%">';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left">' . $row['business_name'] . '</td>
			<td align="left"><img width="50%" height="50%" src="' . $row['business_image'] . '"></td>
			</tr>
		';
	}
	echo '</table>';
	mysqli_free_result ($result);
} else {
	echo '<p class="error">There are currently no registered business.</p>';
}
mysqli_close($dbc);
?>