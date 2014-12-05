



<?
	include_once('database/polls_add.php');
	include_once('database/polls_fetch.php');
	
	include('templates/header.php'); 

	include('user.php');
	
	$user = getUserIDbyUsername($_SESSION['username']);

	$groupid=$_POST['groupid'];
	//echo "$groupid";
	$polls=getPollsFromGroup($groupid);
	
	//echo '<br>'.count($polls).'<br>';
	
	foreach ($polls as $poll) {
		if (isset($_POST[$poll['id']])){
			//echo '<br>'.$_POST[$poll['id']].'<br>';
		}
		else{
			echo '<br>nao veio esta<br>';
			header("Location:polls_answer.php?err=notallanswered");
			exit;
		}
	}

	foreach ($polls as $poll) {
		$answer_title = $_POST[$poll['id']];
		$poll_id = $poll['id'];
		//echo "id"; echo $poll_id; 
		$poll_option = getPollOption($poll_id, $answer_title)['id'];
		// echo "poll_option"; echo $poll_option; 
		addAnswer($poll_id, $poll_option, $user); 
		//echo 'fim';
	}
	header("Location:polls_answer.php");

	include('templates/footer.php'); 

?>