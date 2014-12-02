<?
	include('templates/header.php');
	include('database/polls_fetch.php');
	include_once('getPollURL.php');
	include_once('showPolls.php');
	$all_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));

	$all_groups = getPollGroupByUser(getUserIDbyUsername($_SESSION['username']));

	include('search_poll.php');

	foreach ($all_groups as $group) {
		showPollGroupManage($group);
	}
	include('templates/footer.php'); 
?>