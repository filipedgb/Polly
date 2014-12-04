<?php
	include_once('database/connection.php');
	include('templates/header.php'); 
	include('user.php');
?>

<div id="newPollmodal" class="centered">
	<form id="loginform"  action= "new_poll_group_action.php" method="post" enctype="multipart/form-data">
		<label for="username">Questionnaire Title:</label>
		<input type="text" name="title" id="text" class="txtfield" tabindex="1">
		<label for="username">Questionnaire Description:</label>
		<input type="text" name="description" id="text" class="txtfield" tabindex="2">
		<input type="submit" name="create" id="create"  value="Add Questions" class="flatbtn-blu" />		
	</form>
</div>

<?	include('templates/footer.php'); ?>