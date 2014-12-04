<? 
	include('templates/header.php');
	include('database/polls_fetch.php') ;
	include_once ('database/connection.php');
	

	if(isset($_POST['create']) && isset($_POST['title']) && isset($_POST['description'])) {

		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$userId = getUserIDbyUsername($_SESSION['username']);

		//adds the poll
		if($title !='')
		{
			if ($description == '') $description = "No description";
			$stmt = $db->prepare('INSERT INTO groupPoll(groupId,title,description,userId,visibility, titleHash) VALUES (?,?,?,?,?,?)');
			/*$titleHash = create_hash($title);*/
			$titleHash = md5('groupPoll'.$title.$description);
			$stmt->execute(array(NULL,$title,$description,$userId,"Public", $titleHash));
			print_r($db->errorInfo());
			header("Location:new_poll2.php?questionnaire=$titleHash");
		}
		else header("Location: new_poll_group.php");
	}
	include('templates/footer.php');
?>

