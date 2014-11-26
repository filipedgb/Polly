<? 
	include('database/polls_fetch.php');
	$all_polls = getAllPolls();
	include('templates/header.php'); 
?>


<? include("pollgoogle.html"); ?>
<? foreach($all_polls as $item){ ?>
	ola
<?}?>


<?	include('templates/footer.php'); ?>