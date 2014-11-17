

<?
	include_once ('database/connection.php');
	

	if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		global $db;
		$title = $_POST['title'];
		$description = $_POST['description'];
		if($title !=''&& $description !='')
		{
			$db->exec("INSERT INTO poll VALUES(NULL,'$title', '$description')");	
			header("Location:new_poll.php");
		}
	}
?>

