<? include('templates/header.php'); ?>
<? include('database/polls_fetch.php') ?>
<? include('PasswordHash.php') ?>
<? include_once ('database/connection.php');
	

	if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		global $db;
		$title = htmlspecialchars($_POST['title']);
		$description = htmlspecialchars($_POST['description']);
		$userId = getUserIDbyUsername($_SESSION['username']);
		$options = $_POST['option'];

		//verifies if all the options are filled
		foreach($options as $option){
			if($option=='')
			{
				//por um pop up
				if (isset($_POST['submit'])){
				echo '
				<script type="text/javascript">
				location.reload();
				</script>';
				}
				header("Location: new_poll.php");
				return;
			}
		}

		//adds the poll
		if($title !='' && $description !='')
		{

			$stmt = $db->prepare('INSERT INTO poll(id,title,description,userId,visibility, titleHash) VALUES (?,?,?,?,?,?)');
			/*$titleHash = create_hash($title);*/
			$titleHash = md5('poll'.$title);
			$stmt->execute(array(NULL,$title,$description,$userId,"Public", $titleHash));
		}
		else
		{
			//por um pop up
			if (isset($_POST['submit'])){
				echo '
				<script type="text/javascript">
				location.reload();
				</script>';
				}
			header("Location: new_poll.php");
			return;
		}

		$poll = getPollByTitle($title);
		$poll_id = $poll['id'];
		
	//	adds the options to the poll
		foreach($options as $option){
			//console.log( 'heelo 1');
			$optionT = htmlspecialchars($option);
			$db->exec("INSERT INTO pollOption VALUES(NULL,'$poll_id', '$optionT', 0)");	
		}



		 $image_name= $_FILES['image']['name'];
		 $image_type= $_FILES['image']['type'];
		 $image_size= $_FILES['image']['size'];
		 $image_tmp_name= $_FILES['image']['tmp_name'];

		if($image_name=="")
		{
			//echo "<script> alert('There will be no image in your poll')</script>";
			//exit();
			$db->exec("INSERT INTO pollImage VALUES('$poll_id', 'databaseImages/polls.png')");	
			//nao vai ter imagem
		}
		else
		{
			$extension=substr($image_type, 6);
			$filename= "$poll_id.$extension";
			$source="databaseImages/$filename";
			echo "$filename";
			move_uploaded_file($image_tmp_name, "databaseImages/$filename");
			$db->exec("INSERT INTO pollImage VALUES('$poll_id', '$source')");	


		}


		

		//echo 'fim';
		header("Location:my_polls.php");

	}
?>




<?	include('templates/footer.php'); ?>
