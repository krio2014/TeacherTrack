<?php
require ('../co.php');
include ('header.html');
//echo '<html>';
//echo '<head>';
//echo '</head>';
//echo '<body>';

echo '
<div class="col-2">Hi</div>
<div class="col-2">HI</div>
  <div class="card-block">
	<form action="/action_page.php">
	 <div class="form-group">
		<label for="fname">First name: </label>
		<input class="form-control" type="text" name="fname"><br>
		<label>
  		Last name: <input class="form-control" type="text" name="lname"><br>
  		<input type="submit" value="Submit">
  
  	</div>
</form>
</div>
</div>



';

//echo '</body>';
//echo '</html>';

include('../footer.html');

?>