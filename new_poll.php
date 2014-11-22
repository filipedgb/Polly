<?php
  include_once('database/connection.php');
?>

<? include('templates/header.php'); ?>

<div class="basePanel" id="new_poll">
	<form id="new_poll_form" action="new_poll_action.php" method="post">
		Poll Title:<input type="text" name="title"><br><br>
		Poll Description:<input type="text" name="description"><br><br>
		
		<input type="submit" name="submit" />
		
	</form>
</div>

<?	include('templates/footer.php'); ?>