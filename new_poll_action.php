<? include('templates/header.php'); ?>

<?
	include_once ('database/connection.php');
	

	if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		if($title !=''&& $description !='')
		{
			$db->exec("INSERT INTO poll VALUES(NULL,'$title', '$description')");	
			//header("Location:new_poll.php");
		}
	}
?>


<div class="basePanel">
	<h3>Form Title: <?=$title?></h3>
	<p>Form Description: <?=$description?></p>
	<form id="add_options_poll" action="add_poll_options.php" method="post">
		<input type="hidden" name="title" value="<?=$title?>" />
		<input type="button" id="addOption"  value="Add Poll Option" />
		<input type="submit" name="submit" />
	</form>
</div>


<?	include('templates/footer.php'); ?>
