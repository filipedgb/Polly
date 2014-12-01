<?php
  include_once('database/polls_fetch.php');
  //$all_polls = getAllPolls();
?>

<? include('templates/header.php'); 
	include('user.php');
	
	
	$all_polls = getUnansweredPolls(getUserIDbyUsername($_SESSION['username']));
?>


	<? include('search_poll.php'); ?>




	<? $groupIdtemp = -1;  
$BOOLEANO = 0; 
$ESTADO=1;
	?>



	<? foreach($all_polls as $item) { ?>




			<? if($item['groupId'] != $groupIdtemp) {
				$group = getGroupPoll($item['groupId']);
				$BOOLEANO=$BOOLEANO+1;
				IF($ESTADO==3){
				 ?><input type="submit" value="Answer" class="flatbtn-blu">
				 	</form>
				 <?
				}
				$ESTADO=1;

			 ?>

			 	 

			 	</div>
			 	<?$ESTADO=2?>
				<div class="poll_item">
				<form id="form" action="answer_poll_action.php" method="post">
				<input type="hidden" name="groupid" value="<?=$item['groupId']?>" >
				<center><h1><?=$group['title']?></h1></center>
				<center><h1><?=$item['groupId']?></h1></center>
				<center><p style="padding-bottom: 30px;"><?=$group['description']?></p></center>

			<? }  ?>


						<h2> <?=$item['title']?></h2>
						<p style="font-size:1em; padding-bottom: 10px;"><?=$item['description']?></p>


						<div style="width: 100%; overflow: hidden;">

							
									    <div style="width:70%; float: left;"> 
											<?	$poll_options = getPollOptions($item['title']); ?>

											
												
												

												<?	foreach($poll_options as $poll_option){?>
														<input type="radio" name="<?=$item['id']?>" value="<?=$poll_option['optionText']?>"><?=$poll_option['optionText']?><br>
												<?	}  ?>
													
											
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

		<? } $ESTADO=3;?>

	<? 
	
		}

	if($BOOLEANO>1)
	{
		 ?><input type="submit" value="Answer" class="flatbtn-blu"><?
	}
	?>




<?	include('templates/footer.php'); ?>