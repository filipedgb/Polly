<? 
	include('templates/header.php'); 
	include('user.php');
	
	include('database/polls_fetch.php');
	include("utilities/pollgoogle.php");
	include_once('templates/showPolls.php');
	
	$all_groups = getGroupsByUserId(getUserIDbyUsername($_SESSION['username']));
	include('search_poll.php');
	foreach ($all_groups as $group) {
		showPollGroupStat($group);
	}
	include('templates/footer.php');
?>