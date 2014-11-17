<?php
  include_once('database/connection.php');
?>

<? include('templates/header.php'); ?>

<div id="new_poll">
	<form id="new_poll_form" action="new_poll.php" method="post">
		Poll Title:<input type="text" name="title"><br>
		Poll Description:<input type="text" name="description"><br>
		<input type="submit" name="submit" />
		<input type="button" name="test" />
		<?include('new_poll_action.php');?>
	</form>
</div>

<?	include('templates/footer.php'); ?>