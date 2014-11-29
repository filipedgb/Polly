<?php
  include_once('database/polls_fetch.php');
  //$all_polls = getAllPolls();
?>

<? include('templates/header.php'); 
	include('user.php');
	
	
	$all_polls = getUnansweredPolls(getUserIDbyUsername($_SESSION['username']));
?>



 <form action="search_poll.php" method="post">
  Search poll: <input type="text" name="theSearch"><br>
  <input type="submit" value="Search!"> 
</form>

	<? $groupIdtemp = -1;  ?>


	<? foreach($all_polls as $item) { ?>




			<? if($item['groupId'] != $groupIdtemp) {
				$group = getGroupPoll($item['groupId']);
			 ?>
			 	</div>
				<div class="poll_item" id='<?=$item['title']?>'>

				<h2><?=$group['title']?></h2>
				<h3><?=$group['description']?></h3>

			<? }  ?>


			<h3><?=$item['title']?></h3>
				<p><?=$item['description']?></p>


			<div style="width: 100%; overflow: hidden;">

				
			    <div style="width:70%; float: left;"> 
					<?	$poll_options = getPollOptions($item['title']); ?>

					<form id="form" action="answer_poll_action.php" method="post">
						
						<input type="hidden" name="poll_title" value="<?=$item['title']?>" >

						<?	foreach($poll_options as $poll_option){?>
								<input type="radio" name="answer" value="<?=$poll_option['optionText']?>"><?=$poll_option['optionText']?><br>
						<?	}  ?>
							<input type="submit" name="submit">
					</form>

			    </div>



			    <div class="square" style="margin-left: 70%"> 
			    	<?$idPoll=$item['id'];
					$src=getSource($idPoll);?>
					<img src="<?=$src?>" alt="" width:"auto"; height:"auto;"> 
			    </div>
			</div>
			
		
				
			
		<? if($item['groupId'] != $groupIdtemp) {
				$groupIdtemp = $item['groupId'];

			 ?>

	

		<? } ?>
		


	<? 
		}
	?>

	


<?	include('templates/footer.php'); ?>