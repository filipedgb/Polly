<?php
  include('database/polls_fetch.php');
?>

<? include('templates/header.php'); ?>

<div id="poll_list">
	<? $all_polls = getAllPolls();
	foreach($all_polls as $item){ ?>
		<h3><?=$item['title']?></h3>
		<p><?=$item['description']?></p>
	<?}?>
</div>

<?	include('templates/footer.php'); ?>