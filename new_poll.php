<?php
  include_once('database/connection.php');
?>

<? include('templates/header.php'); 
include('user.php');


?>



<div id="newPollmodal" class="centered">
	<form id="loginform"  action= "new_poll_action.php" method="post" enctype="multipart/form-data">
		<label for="username">Question Title:</label>
		<input type="text" name="title" id="text" class="txtfield" tabindex="1">
		<label for="username">Question Description:</label>
		<input type="text" name="description" id="text" class="txtfield" tabindex="2">
		<label for="username">Select Image:</label>
		<input type="file" name="image" id="text"  tabindex="3">
		
	 	<div>
	 		<input type="button" id="addOption"  value="Add Poll Option" class="flatbtn-blu" />
	 		<input type="submit" name="newQuestion" id="addQuestion"  value="Next Question" class="flatbtn-blu" />
	 		<div style=" float: right">
	 		<input type="submit" name="submit" id="loginbtn" class="flatbtn hidemodal" value="Create Poll" tabindex="5">
	 	</div>


</div>

		<script type="text/javascript">
 			addOptionRequest();
			addOptionRequest();
		</script>
		
	</form>
</div>

<?	include('templates/footer.php'); ?>