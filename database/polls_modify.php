<?
	include_once('connection.php');

	function setPollVisibility($poll_id, $visibility){
		if ($visibility != "Public" && $visibility != "Private")
			return;

		global $db;
		$stmt = $db->prepare('UPDATE poll SET visibility=? WHERE id=?');
		$stmt->execute(array($visibility, $poll_id));

	}

	function deletePoll($poll_id){
		global $db;
		$stmt = $db->prepare('DELETE FROM poll WHERE id=?');
		$stmt->execute(array($poll_id));
	}


?>