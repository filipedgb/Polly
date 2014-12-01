<? 
	include('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include('showPolls.php');

	$all_polls = getAnsweredGroups(getUserIDbyUsername($_SESSION['username']));

	include('search_poll.php'); 

	foreach($all_polls as $item1){ 
		showPollGroupStat($item1);
	} 

	include('templates/footer.php');
?>