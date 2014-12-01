<?
	include_once('pollgoogle.php');

	function showPollGroupStat($group){ 
		echo '<div  class="poll_item">';
		echo '<center><h1>'.$group['title'].'</h1></center>';
		echo '<center><p style="padding-bottom: 30px;">'.$group['description'].'</p></center>';
		
		$polls_group = getPollsFromGroup($group['groupId']);

		foreach($polls_group as $poll){			
			echo '<div id="pollsGoogle">';		
			$link = getPollUrl($poll['titleHash']);
			abc($poll['title'], $poll, $link);
			echo '</div>';
		}
		echo '</div>';
	}


	function showPollGroupAnswer($group){ 
		echo '<div  class="poll_item">';
		echo '<center><h1>'.$group['title'].'</h1></center>';
		echo '<center><p style="padding-bottom: 30px;">'.$group['description'].'</p></center>';
		echo '<form id="form" action="answer_poll_action.php" method="post">';
		echo '<input type="hidden" name="groupid" value="'.$group['groupId'].'">';
		
		$polls_group = getPollsFromGroup($group['groupId']);
		foreach($polls_group as $poll){			
			echo '<div style="width: 100%; overflow: hidden; padding-top: 20px; padding-bottom: 20px;  padding-left: 5px;">';
				echo '<div style="width:70%; float: left;">';
					echo '<h2>'.$poll['title'].'</h2>';
					$poll_options = getPollOptionsByPollId($poll['id']);
					foreach($poll_options as $poll_option){
						echo '<input type="radio" name="'.$poll['id'].'" value="'.$poll_option['optionText'].'">'.$poll_option['optionText'].'<br>';
					}
				echo '</div>';

			echo '<div class="square" style="margin-left: 70%">';
				$src=getSource($poll['id']);
				echo '<img src="'.$src.'" alt="" width:"auto"; height:"auto;">';
			echo '</div>';

			echo '</div>';
		}
		echo '<input type="submit" value="Answer" class="flatbtn-blu">';
		echo '</form>';
		echo '</div>';
	}


?>