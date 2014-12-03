<?php
 include('templates/header.php'); 
 include("database/connection.php");	
 include('database/polls_fetch.php');
   include_once('PasswordHash.php');


  $username = '';

  echo 'tetas';

if($_SERVER["REQUEST_METHOD"] == "POST")
{


     if(!empty($_POST['submit-changepw']))
      {

      	echo 'ta aqui';


      	$username = $_SESSION['tempUsername'];
      	 echo $username;


        $newpword = $_POST['password'];
        $newpword2 = $_POST['password2'];


        echo $newpword;
        echo $newpword2;

        $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = :user');
        $stmt->bindParam(':user',$username, PDO::PARAM_STR);
       // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if($newpword==$newpword2 ){

          $stmt = $db->prepare('UPDATE Utilizador SET Pword= :newpw WHERE username = :user');
          $stmt->bindParam(':newpw',create_hash($newpword), PDO::PARAM_STR);
          $stmt->bindParam(':user',$username, PDO::PARAM_STR);
          $stmt->execute();

          //header("location: my_account.php");
        }


     }
}

// VERIFICA EMAIL LINK
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $username =  $_GET['username'];
      $code =  $_GET['codePw'];


      $_SESSION['tempUsername'] =  $username;


      echo 'entrou no get';

      $stmt = $db->prepare('SELECT * FROM resetPw WHERE userId = :user AND tempCode = :code ');
      $stmt->bindParam(':user',getUserIDbyUsername($username), PDO::PARAM_STR);
      $stmt->bindParam(':code',$code, PDO::PARAM_STR);

       // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();

        if(isset( $result[0])) {

        	 $stmt = $db->prepare('DELETE FROM resetPw WHERE userId = :user');
              $stmt->bindParam(':user',getUserIDbyUsername($username), PDO::PARAM_STR);
              $stmt->execute();
        }

        else header("location: polls_index.php");
}

?>


<center>
          <div id="registermodal" >
            <h1>New password</h1> <br>
            <form id="loginform" name="loginform" method="post" action="">
                           
              <label for="New password">New password:</label>
              <input type="password" name="password" id="password" class="txtfield" tabindex="2">

              <label for="Confirm new password">New Password confirmation:</label>
              <input type="password" name="password2" id="password2" class="txtfield" tabindex="3">

              <div class="center"><input type="submit" name="submit-changepw" id="loginbtn" class="flatbtn-blu hidemodal" value="Change" tabindex="5"></div>
            </form>
          </div>
</center>


<? include('templates/footer.php'); ?>
