<?

	include('database/polls_fetch.php');
	include('database/polls_modify.php');

	$group_id = $_POST['group_id'];
	$visibility = $_POST['visibility'];
	setGroupVisibility($group_id, $visibility);

	header("Location:manage_polls.php");

?>