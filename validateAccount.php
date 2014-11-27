
<?php
 include('templates/header.php'); 
 include("database/connection.php");	



	// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$code = $_POST['code'];

	$utilizadore = $_SESSION['username'];


	$stmt = $db->prepare('SELECT RegCode FROM Utilizador WHERE username = :user');
	$stmt->bindParam(':user',$utilizadore, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch();


	echo $result[0];
	echo '<br>'; 
	echo $code;


	if($result[0] == $code) {
		echo "Your account has been validated!";
		$stmt = $db->prepare('UPDATE Utilizador SET Active=1 WHERE username = :user');
		$stmt->bindParam(':user',$utilizadore, PDO::PARAM_STR);
		$stmt->execute();
	}
	else {
		echo "Invalid code. Account not validated";
	}


}

?>

<h1> Validate your account </h1>

<form action="" method="post">

<ul> 
 <li> Verification Code<br>
 	<input type="text" name="code"> 
 </li>
 <li>
	<input type="submit" value="Validate">
 </li>
 
</ul>



</form>




<? include('templates/footer.php'); ?>




