<? include('templates/header.php'); ?>
<? include('database/polls_fetch.php') ?>

<?
	include_once ('database/connection.php');
	

	if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$userId = getUserIDbyUsername($_SESSION['username']);
		if($title !=''&& $description !='')
		{
			$stmt = $db->prepare('INSERT INTO poll(id,title,description,userId) VALUES (?,?,?,?)');
			$stmt->execute(array(NULL,$title,$description,$userId));
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
