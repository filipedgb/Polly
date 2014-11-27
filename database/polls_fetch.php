<?
	include_once('connection.php');
	
	function getAllPolls(){
		global $db;
		$stmt = $db->prepare('SELECT * FROM poll');
		$stmt->execute();  
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function getAnsweredPolls($user) {
		global $db;
		$stmt = $db->prepare('SELECT poll.id,poll.title,poll.description FROM poll, pollAnswer
		  where pollAnswer.user_id = ? AND
		   poll.id = pollAnswer.poll_id;
		  
		  ');
		$stmt->execute(array($user));  
		$result = $stmt->fetchAll();
		return $result;
 
	}
	
	
	function getUnansweredPolls($user) {
		global $db;
		$stmt = $db->prepare('
		
		select * from poll where poll.id NOT IN 
		( select poll_id from pollAnswer where user_id = ?);');
		$stmt->execute(array($user));  
		$result = $stmt->fetchAll();
		return $result;
 
	}
	
	
	
	function getPollByUser($user){
		global $db;
		$stmt = $db->prepare('SELECT * FROM poll WHERE userId = ?');
		$stmt->execute(array($user));
		$item = $stmt->fetchAll();	
		return $item;
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

	function getUserIDbyUsername($user) {
		global $db;


		$stmt = $db->prepare('SELECT * FROM Utilizador WHERE Username = ?');
		$stmt->execute(array($user));
		$result = $stmt->fetch();

		return $result['IdUser'];


	}

	function getSource($id) {
		global $db;


		$stmt = $db->prepare('SELECT * FROM pollImage WHERE poll_id = ?');
		$stmt->execute(array($id));
		$result = $stmt->fetch();

		return $result['src'];


	}



?>