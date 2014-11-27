<?
//falta por aqui algum html para perguntar se o gajo quer mm apagar a poll

	include('database/polls_fetch.php');
	include('database/polls_modify.php');

	$title = $_POST['title'];
	$poll_id = getPollByTitle($title)['id'];
	deletePoll($poll_id);

	header("Location:manage_polls.php");



?>