
<?php
 include('templates/header.php'); 
 include("database/connection.php");	
 include('database/polls_fetch.php');
    include_once('PasswordHash.php');



	// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST['username']) && isset($_POST['email'])){
		
		$username = $_POST['username'];
		$email =  $_POST['email'];


		$stmt = $db->prepare('SELECT Email FROM Utilizador WHERE username = :user');
		$stmt->bindParam(':user',$username, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch();

		if($result[0] == $email) {

			// Generating Password
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
			$password = substr( str_shuffle( $chars ), 0, 8 );
			$code = substr( str_shuffle( $chars ), 0, 8 );


			$link = "http://".getUrlWithoutPage()."/change_password_vialink.php?username=".$username."&code=".$code;



			$stmt = $db->prepare('UPDATE Utilizador SET Pword= :temppw WHERE username = :user');
					$stmt->bindParam(':temppw',create_hash($password), PDO::PARAM_STR);
					$stmt->bindParam(':user',$username, PDO::PARAM_STR);
					$stmt->execute();


			$stmt = $db->prepare('INSERT INTO resetPw (userId,tempCode) VALUES (?,?)');
			$stmt->execute(array(getUserIDbyUsername($username), $code));
		

			echo $message = "Hello!\n

If you don't have an account on Polly or didn't ask for a new password please ignore this email. \n

Your new password: " . $password . "\n You can also click the following link to reset the password right now. Note that this link can only be used once, so if you don't reset your password you'll have to use the one we gave you in this email. \n LINK:" . $link;


			mail($email,'New Password',$message,'From: polly@forms.com');


			///		header('Location: polls_index.php');



		}

	
	}

}

?>


<center>
        <div id="validatemodal" >
            <h1>Recover your account</h1> <br>
            <form id="loginform" name="loginform" method="POST" action="">
              <label for="username"> Enter your username :</label>
              <input type="text" name="username" id="username" class="txtfield" tabindex="1">

              <label for="email"> Enter your email :</label>
              <input type="text" name="email" id="email" class="txtfield" tabindex="2">
              
              <div class="center"><input type="submit" name="submit" id="loginbtn" class="flatbtn-blu hidemodal" value="Validate" tabindex="2"></div>
            </form>
        </div>
</center>




<? include('templates/footer.php'); ?>




