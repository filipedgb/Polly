<?
	include_once('database/polls_add.php');
	include_once('database/polls_fetch.php');
	$answer_title = $_POST['answer'];
	$poll_title = $_POST['poll_title'];
	
	$poll_id = getPollByTitle($poll_title)['id'];
	//echo $poll_id; echo "<br>";

	$poll_option = getPollOption($poll_id, $answer_title)['id'];
	//echo $poll_option; echo "<br>";

	//echo "<script>alert(".$poll_id.")</script>";
	addAnswer($poll_id, $poll_option, 0); //este 0 tem de sair, irá corresponder ao user_id
	//echo 'fim';
	header("Location:polls_all.php");

?>