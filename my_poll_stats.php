<? 
	include('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include_once('getPollURL.php');
	
	echo getUserIDbyUsername($_SESSION['username']);
	
	$my_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));

?>

<? include("pollgoogle.php"); ?>

<? foreach($my_polls as $item){ ?>
	<div  class="poll_item" >
		<?
			$link = getPollUrl($item['titleHash']);
			abc($item['title'],$item, $link);
		?>
	</div>
<?}?>


<?	include('templates/footer.php'); ?>