<?

	include_once('connection.php');

	function addAnswer($poll_id, $poll_option_id, $user_id){

		global $db;
		//$db->beginTransaction();
		/*$stmt = $db->prepare('INSERT INTO pollAnswer VALUES(NULL, ?, ?, ?)');
		$stmt->execute(array($poll_id, $poll_option_id, $user_id));*/


		$stmt = $db->prepare('INSERT INTO pollAnswer (id, poll_id, pollOption_id, user_id)
					VALUES (NULL, :poll_id, :pollOption_id, :user_id)');
		$stmt->bindParam(':poll_id', $poll_id);
		$stmt->bindParam(':pollOption_id', $poll_option_id);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		//$db->rollBack();

	}
	



?>