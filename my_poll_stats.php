<? 
	include('templates/header.php'); 
	include('user.php');
	
	include('database/polls_fetch.php');
	include("utilities/pollgoogle.php");
	include_once('templates/showPolls.php');
	
	$groups_user = getGroupsByUserId(getUserIDbyUsername($_SESSION['username']));
	include('search_poll.php');
	foreach ($groups_user as $group) {
		showPollGroupStat($group);
	}
	include('templates/footer.php');
?>