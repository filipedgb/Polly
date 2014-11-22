<?

	include_once ('database/polls_fetch.php');
	//console.log( 'fora1');
	$title = htmlspecialchars($_POST['title']);
	echo $title;
	$poll = getPollByTitle($title);
	$poll_id = $poll['id'];
	$options = $_POST['option'];
//	console.log( 'fora2');
	foreach($options as $option){
		//console.log( 'heelo 1');
		$optionT = htmlspecialchars($option);
		$db->exec("INSERT INTO pollOption VALUES(NULL,'$poll_id', '$optionT', 0)");	
	}
	echo 'fim';
	header("Location:polls_all.php");
	

?>


