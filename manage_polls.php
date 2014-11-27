<?
	include('templates/header.php');
	include('database/polls_fetch.php');
	$my_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));
?>


	<? 
	foreach($my_polls as $item){ ?>
		
		<div class="poll_item" id='<?=$item['title']?>'>

			<h3><?=$item['title']?></h3>
			<p><?=$item['description']?></p>
	
			<br>
			<? $visibility = $item['visibility']; ?>
			<form id="form" action="set_poll_visibility.php" method="post">
				<input type="hidden" name="title" value="<?=$item['title']?>">
				<input type="radio" name="visibility" value="Public" checked='checked'>Public<br>
				<input type="radio" name="visibility" value="Private" 
					<? if ($visibility == 'Private') echo "checked='checked'"?> >Private<br>
				<input type="submit" value="Set Visibility">
			</form>
			<br>

			<form id="form" action="delete_poll.php" method="post">
				<input type="hidden" name="title" value="<?=$item['title']?>">
				<input type="submit" value="Delete Poll">
			</form>
			
		</div>
	<?}?>





<?	include('templates/footer.php'); ?>