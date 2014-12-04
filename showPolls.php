<?
	include_once('pollgoogle.php');
	include_once('getPollURL.php');

	function showPollGroupStat($group){ 
		echo '<div class="poll_item">';
		echo '<center><h1>'.$group['title'].'</h1></center>';
		echo '<center><p style="padding-bottom: 30px;">'.$group['description'].'</p></center>';
		
		$polls_group = getPollsFromGroup($group['groupId']);

		foreach($polls_group as $poll){			
			echo '<div id="pollsGoogle">';		
			$link = getPollUrl($poll['titleHash']);
			abc($poll['title'], $poll, $link);
			echo '</div>';
		}

		$link = getGroupUrl($group['titleHash']); /*funcao está em getPollURL.php */
		echo '<div class="fb-share-button" data-href="'.$link.'" data-layout="button_count" ></div>';
		echo '</div>';
	}


	function showPollGroupAnswer($group){ 
		echo '<div class="poll_item">';
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


	function showPollGroupManage($group){
		echo '<div class="poll_item" id="'.$group['title'].'"">';
		echo '<center><h1>'.$group['title'].'</h1></center>';
		echo '<center><p style="padding-bottom: 30px;">'.$group['description'].'</p></center>';

		$visibility = $group['visibility'];
		
		/* VISIBILITY FORM */
		echo '<form id="loginform" action="set_group_visibility.php" method="post">';
			echo '<input type="hidden" name="group_id" value="'.$group['groupId'].'">';
			echo '<input type="radio" name="visibility" value="Public" checked=\'checked\'>Public<br>';
			echo '<input type="radio" name="visibility" value="Private"';
			if ($visibility == 'Private') 
				echo "checked='checked'";
			echo '>Private<br>';
			echo '<div id="marginButton">';
			echo '<input type="submit" value="Set Visibility" class="flatbtn-blu">';
			echo '</div>';
		echo '</form>';


		/* DELETE FORM */
		echo '<form id="form" action="delete_poll.php" method="post">';
			echo '<input type="hidden" name="group_id" value="'.$group['groupId'].'">';
			echo '<div id="marginButton">';
			echo '<input type="submit" value="Delete Group" class="flatbtn">';
			echo '</div>';
		echo '</form>';

		/* LINK FOR QUESTIONNAIRE SHARING */
		$link = getGroupUrl($group['titleHash']); /*funcao está em getPollURL.php */
		echo "<a href=\"".$link."\" style=\"color: black\">"."Share Link</a>"; /*this "black" should be in css sheet */
		echo '</div>';
	}


	function showPollGroupAnswerPreview($group){ 
		echo '<div class="poll_item">';
		echo '<center><h1>'.$group['title'].'</h1></center>';
		echo '<center><p style="padding-bottom: 30px;">'.$group['description'].'</p></center>';
				
		$polls_group = getPollsFromGroup($group['groupId']);
		foreach($polls_group as $poll){			
			echo '<div style="width: 100%; overflow: hidden; padding-top: 20px; padding-bottom: 20px;  padding-left: 5px;">';
				echo '<div style="width:70%; float: left;">';
					echo '<h2>'.$poll['title'].'</h2>';
					$poll_options = getPollOptionsByPollId($poll['id']);
					foreach($poll_options as $poll_option){
						//echo '<p>'.'ggggg'.'</p>'.'<br>';
						echo '<p>'.$poll_option['optionText'].'</p>'.'<br>';
					}
				echo '</div>';

			echo '<div class="square" style="margin-left: 70%">';
				$src=getSource($poll['id']);
				echo '<img src="'.$src.'" alt="" width:"auto"; height:"auto;">';
			echo '</div>';

			echo '</div>';
		}
		echo '</div>';
	}
/*	foreach( $codes as $index => $code ) {
   echo '<option value="' . $code . '">' . $names[$index] . '</option>';
}*/
?>
