<?
	include_once('connection.php');
	
	function getAllPolls(){
		global $db;
		$stmt = $db->prepare('SELECT * FROM poll');
		$stmt->execute();  
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function getPoll($id){
		global $db;
		$stmt = $db->prepare('SELECT * FROM poll WHERE id = ?');
		$stmt->execute(array($id));
		$item = $stmt->fetch();	
		return $item;
	}

	function getPollByTitle($title){
		global $db;
		$stmt = $db->prepare('SELECT * FROM poll WHERE title = ?');
		$stmt->execute(array($title));
		$item = $stmt->fetch();	
		return $item;
	}

	function getPollOptions($title){
		global $db;
	
		$poll_id = getPollByTitle($title)['id'];


		$stmt = $db->prepare('SELECT * FROM pollOption WHERE poll_id = ?');
		$stmt->execute(array($poll_id));
		$result = $stmt->fetchAll();	
		return $result;
	}

	function getPollOption($poll_id, $title){
		global $db;
	
//		$poll_id = getPoll($poll_id)['id'];

		$stmt = $db->prepare('SELECT * FROM pollOption WHERE poll_id = ? AND optionText = ?');
		$stmt->execute(array($poll_id, $title));
		$result = $stmt->fetch();	
		return $result;
	}

?>