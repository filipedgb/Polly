<? 
	include('database/polls_fetch.php');
	$all_polls = getAllPolls();
	include('templates/header.php'); 
	include('user.php');
	include_once('getPollURL.php');
	
	echo getUserIDbyUsername($_SESSION['username']);

	
	
	$all_polls = getAnsweredPolls(getUserIDbyUsername($_SESSION['username']));
	
?>

<? include("pollgoogle.php"); ?>

<? foreach($all_polls as $item){ ?>
	<div  class="poll_item">
		<?
			$link = getPollUrl($item['titleHash']);
			abc($item['title'], $item, $link);
			
		?>
	</div>

<?}?>


<?	include('templates/footer.php'); ?>

