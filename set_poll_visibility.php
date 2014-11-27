<?

	include('database/polls_fetch.php');
	include('database/polls_modify.php');

	$title = $_POST['title'];
	$visibility = $_POST['visibility'];
	$poll_id = getPollByTitle($title)['id'];
	setPollVisibility($poll_id, $visibility);

	header("Location:manage_polls.php");

?>