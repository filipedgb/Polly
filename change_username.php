
<?php


 include('templates/header.php'); 
 include('user.php');
 include("database/connection.php");	



	// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!empty($_POST['submit-changename']))
	{


	$newUsername = $_POST['u'];
	$oldUsername = $_SESSION['username'];

	$stmt = $db->prepare('SELECT count(IdUser) FROM Utilizador WHERE username = :user');
	$stmt->bindParam(':user',$newUsername, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch();

	if($result[0] == 1) {
		// store session data
		echo "Username already taken." ; 
	}
	else{ 
		$stmt = $db->prepare('UPDATE Utilizador SET Username= :newuser WHERE username = :olduser');
				$stmt->bindParam(':newuser',$newUsername, PDO::PARAM_STR);
				$stmt->bindParam(':olduser',$oldUsername, PDO::PARAM_STR);
				$stmt->execute();

		$_SESSION['username'] = $newUsername;

		header("location: my_account.php");

	}

}
}

?>

	<br>
	<br>
	<br>
			<center>
          <div id="registermodal" >
            <h1>New username</h1><br>
            <form id="loginform" name="loginform" method="post" action="">
              <label for="username">New username:</label>
              <input type="text" name="u" id="username" class="txtfield" tabindex="1">
         
              <div class="center"><input type="submit" name="submit-changename" id="loginbtn" class="flatbtn-blu hidemodal" value="Change" tabindex="5"></div>
            </form>
          </div>
      </center>

          
   <script type="text/javascript">
          $(function(){
           
            $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
          });
          </script>

<? include('templates/footer.php'); ?>




