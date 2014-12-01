<?php
	include_once('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include_once('showPolls.php');
	include('search_poll.php');
	$all_groups = getUnansweredGroups(getUserIDbyUsername($_SESSION['username']));
	foreach ($all_groups as $group) {
		showPollGroupAnswer($group);
	}
	include('templates/footer.php'); 
?>