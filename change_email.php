
<?php


include('templates/header.php'); 
include('user.php');


// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{


     if(!empty($_POST['submit-changeEmail']))
      {
     		$username = $_SESSION['username'];
        $pword = $_POST['pw'];
        $email = $_POST['email'];


          $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = :user');
          $stmt->bindParam(':user',$username, PDO::PARAM_STR);
         // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
          $stmt->execute();
          $result = $stmt->fetch();
          
          if(validate_password($pword, $result['Pword']) ){
              // store session data

              $stmt = $db->prepare('UPDATE Utilizador SET Email= :newmail WHERE username = :user');
              $stmt->bindParam(':newmail',$email, PDO::PARAM_STR);
              $stmt->bindParam(':user',$username, PDO::PARAM_STR);
              $stmt->execute();

             
          }

          else {
              echo "Wrong Password";
              $message="ERRO";
          }
      }
}

?>

<br>
<br>
<br>
		<center>
      <div id="registermodal" >
        <h1>CHANGE EMAIL</h1><br>
        <form id="loginform" name="loginform" method="post" action="">
        	<label for="username"> Enter your password: </label>
    	    <input type="password" name="pw" id="password" class="txtfield" tabindex="2">

          <label for="username">New email:</label>
          <input type="text" name="email" id="email" class="txtfield" tabindex="1">
     
          <div class="center"><input type="submit" name="submit-changeEmail" id="loginbtn" class="flatbtn" value="Change" tabindex="5"></div>
        </form>
      </div>
  </center>

      
<script type="text/javascript">
      $(function(){
       
        $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
      });
      </script>

<? include('templates/footer.php'); ?>




