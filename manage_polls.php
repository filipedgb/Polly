<?
	include('templates/header.php');
	include('database/polls_fetch.php');
	include_once('getPollURL.php');
	$my_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));




?>


	<? 
	foreach($my_polls as $item){ ?>
		
		<div class="poll_item" id='<?=$item['title']?>'>

			<h2><?=$item['title']?></h2>
			<h3><?=$item['description']?></h3>
	
			<? $visibility = $item['visibility']; ?>
			<form id="loginform" action="set_poll_visibility.php" method="post">
				<input type="hidden" name="title" value="<?=$item['title']?>">
				<input type="radio" name="visibility" value="Public" checked='checked'>Public<br>
				<input type="radio" name="visibility" value="Private" 
					<? if ($visibility == 'Private') echo "checked='checked'"?> >Private<br>
				<div id="marginButton">
				<input type="submit" value="Set Visibility" class="flatbtn-blu">
				</div>
			</form>

			<form id="form" action="delete_poll.php" method="post">
				<input type="hidden" name="title" value="<?=$item['title']?>">
				<div id="marginButton">
				<input type="submit" value="Delete Poll" class="flatbtn">
				</div>
			</form>
			<form id="form" action="set_poll_visibility.php" method="post">
			</form>

			
			<?
				/*$url = parse_url(curPageURL());
				$path = dirname($url['path']);
				$host = $url['host'];
				$poll_hash = getPollTitleHash($item['id']);
				$link = $path."/single_poll.php?poll=".$poll_hash;*/
				$link = getPollUrl(getPollTitleHash($item['id'])); /*funcao está em getPollURL.php */
				echo "<a href=\"".$link."\">"."Link para partilha</a>" ;
			?>


	
		</div>
	<?}?>





<?	include('templates/footer.php'); ?>