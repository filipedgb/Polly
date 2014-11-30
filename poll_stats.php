<? 
	include('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include_once('getPollURL.php');
	
	echo getUserIDbyUsername($_SESSION['username']);

	
	
	$all_polls = getAnsweredPolls(getUserIDbyUsername($_SESSION['username']));
	
?>

<? include("pollgoogle.php"); ?>


	<? include('search_poll.php'); ?>



	<? $groupIdtemp = -1;  ?>


<? foreach($all_polls as $item1){ ?>
	


			<? if($item1['groupId'] != $groupIdtemp) {
				$group = getGroupPoll($item1['groupId']);
			 ?>
			 	</div>
					<div  class="poll_item">

				<h2>Poll:<?=$group['title']?></h2>
				<p><?=$group['description']?></p>

			<? }  ?>

		
	


		<?
			$link = getPollUrl($item1['titleHash']);
			abc($item1['title'], $item1, $link);
			
		?>

			<? if($item1['groupId'] != $groupIdtemp) {
				$groupIdtemp = $item1['groupId'];

			 ?>

	

	

		<? } ?>
		


	<? 
		} include('templates/footer.php');
	?>


