<? 
	include('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	
	echo getUserIDbyUsername($_SESSION['username']);
	
	$my_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));

?>

<? include("pollgoogle.php"); ?>

<? foreach($my_polls as $item){ ?>
	<?abc($item['title'],$item);?>
<?}?>


<?	include('templates/footer.php'); ?>