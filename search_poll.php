<?php
  include_once('database/polls_fetch.php');
  //$all_polls = getAllPolls();
?>

<? include('templates/header.php'); 
	include('user.php');
	
	
	$all_polls = getUnansweredPolls(getUserIDbyUsername($_SESSION['username']));
	
	$search = array();
	
	foreach($all_polls as $poll) {
		if ((strpos($poll['title'],$_POST['theSearch']) !== false) || (strpos($poll['description'],$_POST['theSearch']) !== false))  {
			array_push($search, $poll);
		}
		
		/*
		if ($poll['title'] == $_POST['theSearch'] || $poll['description'] == $_POST['theSearch']) {
			array_push($search, $poll);
		}
		*/
	}
	
?>



 <form action="polls_answer.php">
    <input type="submit" value="Back to all polls"> 
</form>

	<? 
	
	foreach($search as $item){ ?>
		
		<div class="poll_item" id='<?=$item['title']?>'>

			<h3><?=$item['title']?></h3>
			<p><?=$item['description']?></p>
	

			<?	$poll_options = getPollOptions($item['title']); ?>

			<form id="form" action="answer_poll_action.php" method="post">
				
				<input type="hidden" name="poll_title" value="<?=$item['title']?>" >

				<?	foreach($poll_options as $poll_option){?>
						<input type="radio" name="answer" value="<?=$poll_option['optionText']?>"><?=$poll_option['optionText']?><br>
				<?	}  ?>
					<input type="submit" name="submit">
			</form>
			
		</div>
	<?}?>

	


<?	include('templates/footer.php'); ?>