<?
	include_once('database/connection.php');
	include_once('getPollURL.php');
	include_once('PasswordHash.php');

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		/*echo "if 1 <br>";
		if (isset($_POST['u']) ) echo "a";
		if (isset($_POST['password']) ) echo "a";
		if (isset($_POST['password2']) ) echo "a";
		if (isset($_POST['name'])) echo "a";
		if (isset($_POST["email"])) echo "a";*/

		if(isset($_POST['u']) && isset($_POST['password']) && isset($_POST['password2']) 
			&& isset($_POST['name']) && isset($_POST["email"]))
		{
			//echo "if 2 <br>";
			$utilizadore = $_POST['u'];
			$passuorde = $_POST['password'];
			$passuorde2 = $_POST['password2'];
			$name=$_POST['name'];
			$email = $_POST["email"];
			

			if($passuorde != $passuorde2) {
		  		echo "Passwords do not match. Please try again";
			} 

			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  echo "Email not valid. Please try again"; 
			}

			else {
				$stmt = $db->prepare('SELECT count(IdUser) FROM Utilizador WHERE Username = :user');
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
		else echo "Please, fill all the form fields...";
	}

	//echo "veio cá<br>";

?>