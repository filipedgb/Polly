<?
//falta por aqui algum html para perguntar se o gajo quer mm apagar a poll

	include('database/polls_fetch.php');
	include('database/polls_modify.php');

	$group_id = $_POST['group_id'];
	deleteGroup($group_id);

	header("Location:manage_polls.php");



?>