
<?php


 include('templates/header.php'); 


	// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!empty($_POST['submit-resgister']))
	{

	$utilizadore = $_POST['u'];
	$passuorde = $_POST['password'];
	$passuorde2 = $_POST['password2'];
	$name=$_POST['name'];
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
			$link = "http://".getUrlWithoutPage()."/validateAccount.php?username=".$utilizadore."&codeValidate=".$code;
			emailconf($email, $link, $code);

	    	$options = ['cost' => 12];
	        $stmt = $db->prepare('INSERT INTO Utilizador(IdUser,Username,Pword,Email,Nome,Facebook,Active,RegCode) VALUES (?,?,?,?,?,?,?,?)');
  			
			//A linha seguinte não é suportada pelo gnomo 
			//$stmt->execute(array(NULL,$utilizadore, password_hash($passuorde, PASSWORD_DEFAULT, $options) ) );
			
			$stmt->execute(array(NULL,$utilizadore, create_hash($passuorde),$email,$name,'0','0',$code));

		}

	}
}
}

?>
			<center>
          <div id="registermodal" >
            <h1>Register</h1>
            <form id="loginform" name="loginform" method="post" action="">
              <label for="username">Username:</label>
              <input type="text" name="u" id="username" class="txtfield" tabindex="1">

              <label for="username">Name:</label>
              <input type="text" name="name" id="name" class="txtfield" tabindex="2">
              
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" class="txtfield" tabindex="3">

              <label for="password">Password confirmation:</label>
              <input type="password" name="password2" id="password2" class="txtfield" tabindex="4">

              <label for="username">Email:</label>
              <input type="text" name="email" id="username" class="txtfield" tabindex="5">
              
              <div class="center"><input type="submit" name="submit-resgister" id="loginbtn" class="flatbtn-blu hidemodal" value="Register" tabindex="6"></div>
            </form>
          </div>
      </center>

          
   <script type="text/javascript">
          $(function(){
           
            $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
          });
          </script>

<? include('templates/footer.php'); ?>




