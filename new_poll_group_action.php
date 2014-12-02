<? include('templates/header.php'); ?>
<? include('database/polls_fetch.php') ?>
<? /*include('PasswordHash.php')*/ ?>
<? include_once ('database/connection.php');
	

	if(isset($_POST['create'])) {


		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$userId = getUserIDbyUsername($_SESSION['username']);

		//adds the poll
		if($title !='' && $description !='')
		{

			/*echo 'TOU AQUI';*/
			$stmt = $db->prepare('INSERT INTO groupPoll(groupId,title,description,userId,visibility, titleHash) VALUES (?,?,?,?,?,?)');
			/*$titleHash = create_hash($title);*/
			$titleHash = md5('groupPoll'.$title);
			$stmt->execute(array(NULL,$title,$description,$userId,"Public", $titleHash));

			header("Location:new_poll.php");

		}
		else
		{
			//por um pop up
			if (isset($_POST['submit'])){
				echo '
				<script type="text/javascript">
				location.reload();
				</script>';
				}
			header("Location: new_poll_group_action.php");
			return;
		}

		//echo 'fim';
			header("Location:new_poll.php");

	}
?>




<?	include('templates/footer.php'); ?>
