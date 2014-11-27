
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

<h1> Register </h1>

<form action="" method="post">

<ul> 
 <li> Username<br>
 	<input type="text" name="u"> 
 </li>
 <li> Password<br>
 	<input type="password" name="password"> 
 </li>
 <li> Password confirmation <br>
 	<input type="password" name="password2"> 
 </li>
 <li> Email <br>
 	<input type="text" name="email"> 
 </li>
 <li>
	<input type="submit" value="Register">
 </li>
</ul>



</form>




<? include('templates/footer.php'); ?>




