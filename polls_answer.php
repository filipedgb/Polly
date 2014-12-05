<?php
	include_once('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include_once('templates/showPolls.php');
	include('search_poll.php');
	$all_groups = getUnansweredGroups(getUserIDbyUsername($_SESSION['username']));
	
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['err'])){
        $message_err = $_GET['err'];
        if ($message_err == "notallanswered")
    	    echo '<center>Not all polls from questionnaire were answered... Please, answer all the questinnaire polls before submitting.</center>';
    }

	foreach ($all_groups as $group) {
		showPollGroupAnswer($group);
	}
	include('templates/footer.php'); 
?>