<?
	include('templates/header.php');
	include('database/polls_fetch.php');
	include('pollgoogle.php');
	include_once('getPollURL.php');

	$poll_hash = $_GET['poll'];
	$poll = getPollByHash($poll_hash);
?>	
	<div  class="poll_item" style="overflow: hidden;">
		<script>alert(<?=$poll_hash?>)</script>
		<?
			$link = getPollUrl($poll_hash);
			abc($poll['title'], $poll, $link);
		?>
	</div>
	

<?	include('templates/footer.php'); ?>