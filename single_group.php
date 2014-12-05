<?
	include('templates/header.php'); 
	include('user.php');
	
	include('database/polls_fetch.php');
	include("utilities/pollgoogle.php");
	include('templates/showPolls.php');
	if (isset($_GET['group'])){
		$group_hash = $_GET['group'];
		$group = getGroupByHash($group_hash);
		showPollGroupStat($group);
	}
	else echo '<p>Questionnaire not found...</p>';
	include('templates/footer.php');
?>