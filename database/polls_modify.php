<?
	include_once('connection.php');

	function setGroupVisibility($group_id, $visibility){
		if ($visibility != "Public" && $visibility != "Private")
			return;

		global $db;
		//echo $visibility."<br>".$poll_id."<br>"; 
		$stmt = $db->prepare('UPDATE groupPoll SET visibility=? WHERE groupId=?');
		$stmt->execute(array($visibility, $group_id));
		//echo $visibility."<br>".$poll_id."<br>";
		//print_r($db->errorInfo());
	}

	function deletePoll($poll_id){
		global $db;
		$stmt = $db->prepare('DELETE FROM poll WHERE id=?');
		$stmt->execute(array($poll_id));
	}

	function deleteGroup($group_id){
		global $db;
		$stmt = $db->prepare('DELETE FROM groupPoll WHERE groupId=?');
		$stmt->execute(array($group_id));
	}


?>