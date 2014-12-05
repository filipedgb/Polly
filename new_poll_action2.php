<?
	include_once('database/polls_fetch.php');
	include_once('showPolls.php');

	if(isset($_POST['title']) && isset($_POST['username'])
		&& isset($_POST['group']) && $_POST['title']!='') {

		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		/*$description = htmlspecialchars($_POST['description']);*/
		$userId = getUserIDbyUsername($_POST['username']);
		$options = $_POST['option'];
		//echo 'user name = '.$_POST['username'].' || user id = '.$userId.'<br>';

		//select last created group id 
		$group = getGroupPoll(htmlspecialchars($_POST['group']));
		$groupId = $group['groupId'];
		//print_r($db->errorInfo());

		//adds the poll
		if($title !=''/* && $description !=''*/)
		{
			
			$stmt = $db->prepare('INSERT INTO poll(id,title,userId, titleHash, groupId) VALUES (?,?,?,?,?)');
			/*$titleHash = create_hash($title);*/
			$titleHash = md5('poll'.$title);
			$stmt->execute(array(NULL,$title,$userId, $titleHash,$groupId));
			//print_r($db->errorInfo()); echo '<br>';
		}
		//else echo 'titleVazio<br>';

		//verifies if all the options are filled
		foreach($options as $option){
			
			if($option=='')
			{
				//echo 'optionVazia<br>';
			}
			else{

				$poll = getPollByTitle($title);
				$poll_id = $poll['id'];
				//echo 'pollId = '.$poll_id.'<br>';			
				//echo 'option = '.$option.'<br>';	
				//console.log( 'heelo 1');
				if ($option != ''){
					$optionT = htmlspecialchars($option);
					$db->exec("INSERT INTO pollOption VALUES(NULL,'$poll_id', '$optionT', 0)");	
					//print_r($db->errorInfo());
					//echo '<br>';

				}
			}
		}

		//imagens

		

		//echo 'pre';
		if (isset($_FILES['image']['name']) && isset($_FILES['image']['type']) &&
			isset($_FILES['image']['size']) && isset($_FILES['image']['tmp_name'])){

			//echo 'dentro';
			 $image_name= $_FILES['image']['name'];
			 $image_type= $_FILES['image']['type'];
			 $image_size= $_FILES['image']['size'];
			 $image_tmp_name= $_FILES['image']['tmp_name'];

			if($image_name=="")
			{
				//echo 'a';
				//$db->exec("INSERT INTO pollImage VALUES('$poll_id', 'databaseImages/polls.png')");	
				//nao vai ter imagem
			}
			else
			{

				//echo "name: $image_name | type: $image_type | size: $image_size | tmp_name: $image_tmp_name<br>";
				$extension=substr($image_type, 6);
				//echo 'extension: '.$extension.'<br>';
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$nameImage = substr( str_shuffle( $chars ), 0, 8 );

				$filename= $poll_id.'_'.$nameImage.'.'.$extension;
				//echo 'new name: '.$filename.'<br>';
				$source="databaseImages/".$filename;
				//echo "filename: $filename<br>";
				//echo "extension: $extension<br>";

				move_uploaded_file($image_tmp_name, $source);
				$stmt = $db->prepare('INSERT INTO pollImage VALUES(?, ?)');
				$stmt->execute(array($poll_id, $source));
			}

		}
		//echo 'pos';

		if (isset($_POST['submit'])){
			//header('location:polls_index.php');
			//echo "submit<br>";
		}
		else{
			$string = 'Location:new_poll2.php?questionnaire='.$group['titleHash'];
			//header($string);
		}
		echo showPollGroupAnswerPreview($group);
	}
	else{
		//echo "no post?<br>";
		//header('location:polls_index.php');	
	} 
?>