
<?php


 include('templates/header.php'); 
 include("database/connection.php");
 include("PasswordHash.php");



	// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$utilizadore = $_POST['u'];
	$passuorde = $_POST['password'];
	$passuorde2 = $_POST['password2'];

	$email = $_POST["email"];
	



	if($passuorde != $passuorde2) {
  		echo "Your passwords do not match. Please try again";
	} 

	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  echo "Email not valid. Please try again"; 
	}

	else {
		$stmt = $db->prepare('SELECT count(IdUser) FROM Utilizador WHERE username = :user');
		$stmt->bindParam(':user',$utilizadore, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch();

		if($result[0] == 1) {
			// store session data
			echo "Username already taken." ; 
		}
		else{ 
			
			include("mail.php");

			$code = substr(md5(uniqid(rand(), true)), 16, 16);

			emailconf($email, $code);

	    	$options = ['cost' => 12];
	        $stmt = $db->prepare('INSERT INTO Utilizador(IdUser,Username,Pword,Email,Active,RegCode) VALUES (?,?,?,?,?,?)');
  			
			//A linha seguinte não é suportada pelo gnomo 
			//$stmt->execute(array(NULL,$utilizadore, password_hash($passuorde, PASSWORD_DEFAULT, $options) ) );
			
			$stmt->execute(array(NULL,$utilizadore, create_hash($passuorde),$email,'0',$code));

		


		}

	}
}

?>

	<br>
	<br>
	<br>
			<center>
          <div id="registermodal" >
            <h1>Register</h1>
            <form id="loginform" name="loginform" method="post" action="">
              <label for="username">Username:</label>
              <input type="text" name="u" id="username" class="txtfield" tabindex="1">
              
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" class="txtfield" tabindex="2">

              <label for="password">Password confirmation:</label>
              <input type="password" name="password2" id="password2" class="txtfield" tabindex="3">

              <label for="username">Email:</label>
              <input type="text" name="email" id="username" class="txtfield" tabindex="4">
              
              <div class="center"><input type="submit" name="submit" id="loginbtn" class="flatbtn-blu hidemodal" value="Register" tabindex="5"></div>
            </form>
          </div>
      </center>

          
   <script type="text/javascript">
          $(function(){
           
            $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
          });
          </script>

<? include('templates/footer.php'); ?>




