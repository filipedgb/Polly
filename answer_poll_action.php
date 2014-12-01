<?/*
	include_once('database/polls_add.php');
	include_once('database/polls_fetch.php');
	
	include('templates/header.php'); 

	include('user.php');

	
	$user = getUserIDbyUsername($_SESSION['username']);
	
	$answer_title = $_POST['answer'];
	$poll_title = $_POST['poll_title'];
	
	$poll_id = getPollByTitle($poll_title)['id'];
	//echo $poll_id; echo "<br>";

	$poll_option = getPollOption($poll_id, $answer_title)['id'];
	//echo $poll_option; echo "<br>";

	//echo "<script>alert(".$poll_id.")</script>";
	addAnswer($poll_id, $poll_option, $user); //este 0 tem de sair, irá corresponder ao user_id
	//echo 'fim';
	header("Location:polls_answer.php");
*/
?>



<?
	include_once('database/polls_add.php');
	include_once('database/polls_fetch.php');
	
	include('templates/header.php'); 

	include('user.php');
	
	$user = getUserIDbyUsername($_SESSION['username']);

	$groupid=$_POST['groupid'];
	echo "$groupid";

	$polls=getPollsFromGroup($groupid);
	echo "PUTAS--------";
	echo count($polls);
	?><br><?
	
	foreach ($polls as $poll) {
	
	echo " ENTRA";
	
	$answer_title = $_POST[$poll['id']];


	$poll_id = $poll['id'];
	echo "id"; echo $poll_id; 

	$poll_option = getPollOption($poll_id, $answer_title)['id'];
	 echo "poll_option"; echo $poll_option; 

	addAnswer($poll, $poll_option, $user); //este 0 tem de sair, irá corresponder ao user_id
	//echo 'fim';
?><br><?
	}
	//header("Location:polls_answer.php");

?>