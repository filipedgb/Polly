<? 
	include('database/polls_fetch.php');
	$all_polls = getAllPolls();
	include('templates/header.php'); 
	include('user.php');
?>

<? include("pollgoogle.php"); ?>

<? foreach($all_polls as $item){ ?>
	<?abc($item['title'],$item);?>
<?}?>


<?	include('templates/footer.php'); ?>