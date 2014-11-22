<? 
	include('database/polls_fetch.php');
	$all_polls = getAllPolls();
	include('templates/header.php'); 
?>
	
<? 
foreach($all_polls as $item){ ?>
	
	<div class="poll_item_stat" id='<?=$item['title']?>'>

		<h2><?=$item['title']?></h2>
		<h3><?=$item['description']?></h3><br>


		<?	

			$poll_options = getPollOptions($item['title']);
			$options_array = array();

			//echo "<script>alert('Hello World');</script>";
		?>

		<!--<script>
			var elementName = <?php echo (json_encode($item['title'])) ?>;
			elementName = elementName.replace("\"","\\\"");
			var thisElement = $("#"+elementName).find('div.poll_item');
			var arrayFromPHP = <?php echo json_encode($options_array); ?>;
		    $(function(){
		        
		    });
		 </script>-->
		<? 
			$totalRespostas = 0;
			foreach($poll_options as $poll_option)
				$totalRespostas += $poll_option['counter'];
			//deviamos pôr um couter em cada poll, com o numero de respostas
		?>




		<?	
		if ($totalRespostas == 0) $totalRespostasT=1; else $totalRespostasT = $totalRespostas;
		foreach($poll_options as $poll_option){
				$factor = $poll_option['counter']/$totalRespostasT;
				$factor = round( $factor, 2, PHP_ROUND_HALF_UP); /*factor é a percentagem da barra [0; 1] */
				$bar_width = $factor*500;
			?>
				<?echo "<p>".$poll_option['optionText']."</p>";?>
				<canvas id="<?=$poll_option['optionText']?>" width="500" height="20"></canvas>
				<script> printStatsBar(<?php echo (json_encode($bar_width)) ?>, 20,
					<?php echo (json_encode($poll_option['optionText'])) ?>, <?=$factor*100?>); </script>
				<br>
		<?	}  ?>
		
		<br>
		<p>Total number of answers: <?=$totalRespostas?></p><br>	
		
	</div>
<?}?>



<?	include('templates/footer.php'); ?>