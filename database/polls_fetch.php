<?
	include_once ('connection.php');
	
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
		$stmt->execute($id);
		$item = $stmt->fetch();	
		return $item;
	}

?>