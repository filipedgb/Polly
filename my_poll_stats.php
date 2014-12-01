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

				<center><h1><?=$group['title']?></h1></center>
				<center><p style="padding-bottom: 30px;"><?=$group['description']?></p></center>

			<? }  ?>
		
			<div id="pollsGoogle" >
		<?
			$link = getPollUrl($item['titleHash']);
			abc($item['title'],$item, $link);
		?>

			<? if($item['groupId'] != $groupIdtemp) {
				$groupIdtemp = $item['groupId'];

			 ?>
<? } ?>

</div>

		


	<? 
		} include('templates/footer.php');
	?>