<? 
	include('database/polls_fetch.php');
	include('templates/header.php'); 
	include('user.php');
	include_once('getPollURL.php');
	
	echo getUserIDbyUsername($_SESSION['username']);
	
	$all_polls = getPollByUser(getUserIDbyUsername($_SESSION['username']));

?>

<? include("pollgoogle.php"); ?>


<? include('search_poll.php'); ?>



<? $groupIdtemp = -1;  ?>

<? foreach($all_polls as $item){ ?>
	
			<? if($item['groupId'] != $groupIdtemp) {
				$group = getGroupPoll($item['groupId']);
			 ?>
			 	</div>
					<div  class="poll_item">

				<h2>Poll:<?=$group['title']?></h2>
				<p><?=$group['description']?></p>

			<? }  ?>
		


		<?
			$link = getPollUrl($item['titleHash']);
			abc($item['title'],$item, $link);
		?>

			<? if($item['groupId'] != $groupIdtemp) {
				$groupIdtemp = $item['groupId'];

			 ?>
<? } ?>
		


	<? 
		} include('templates/footer.php');
	?>