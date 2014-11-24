
<?php

 include('templates/header.php'); 
 include("config.php");
 include("PasswordHash.php");



	// session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	  $utilizadore = $_POST['u'];
	  $passuorde = $_POST['password'];


	 // $coiso = md5("LOL"); echo coiso;

	  echo ($utilizadore);


	  $stmt = $dbu->prepare('SELECT count(IdUser) FROM Utilizador WHERE username = :user');
	  $stmt->bindParam(':user',$utilizadore, PDO::PARAM_STR);
//	  $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
	  $stmt->execute();
	  $result = $stmt->fetch();

	if($result[0] == 1)
	{
	// store session data
		echo "Username already taken." ; 
	}
	    else 
	    {
	    	$options = ['cost' => 12];
	        $stmt = $dbu->prepare('INSERT INTO Utilizador(IdUser,Username,Pword) VALUES (?,?,?)');
  			
			//A linha seguinte não é suportada pelo gnomo 
			//$stmt->execute(array(NULL,$utilizadore, password_hash($passuorde, PASSWORD_DEFAULT, $options) ) );
			
			$stmt->execute(array(NULL,$utilizadore, create_hash($passuorde) ));
			
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
 	<input type="password" name="password"> 
 </li>
 <li> Email <br>
 	<input type="text" name="password"> 
 </li>
 <li>
	<input type="submit" value="Register">
 </li>
</ul>



</form>




<? include('templates/footer.php'); ?>




