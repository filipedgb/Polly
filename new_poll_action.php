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
		$options = $_POST['option'];

		//verifies if all the options are filled
		foreach($options as $option){
			if($option=='')
			{
				//por um pop up
				header("Location: new_poll.php");
				return;
			}
		}

		//adds the poll
		if($title !=''&& $description !='')
		{
			$stmt = $db->prepare('INSERT INTO poll(id,title,description,userId) VALUES (?,?,?,?)');
			$stmt->execute(array(NULL,$title,$description,$userId));
		}
		else
		{
			//por um pop up
			header("Location: new_poll.php");
			return;
		}

		$poll = getPollByTitle($title);
		$poll_id = $poll['id'];
		
	//	adds the options to the poll
		foreach($options as $option){
			$optionT = htmlspecialchars($option);
			$db->exec("INSERT INTO pollOption VALUES(NULL,'$poll_id', '$optionT', 0)");	
		}
		echo 'fim';
		header("Location:polls_all.php");

	}
?>




<?	include('templates/footer.php'); ?>
