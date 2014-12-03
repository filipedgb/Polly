
<?php


include('templates/header.php'); 
include('user.php');
  include("database/connection.php"); 
 include("PasswordHash.php");  


  


// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

     if(!empty($_POST['submit-delete']))
      {
     		$username = $_SESSION['username'];
        $pword = $_POST['pw'];

          $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = :user');
          $stmt->bindParam(':user',$username, PDO::PARAM_STR);
         // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
          $stmt->execute();
          $result = $stmt->fetch();
          
          if(validate_password($pword, $result['Pword']) ){
              // store session data

              $stmt = $db->prepare('DELETE FROM Utilizador WHERE username = :user');
              $stmt->bindParam(':user',$username, PDO::PARAM_STR);
              $stmt->execute();

              include('logout.php');

             
          }

          else {
              echo "Wrong Username or Password";
              $message="ERRO";
          }
      }






}

?>
<?if( $_SESSION['facebook']=='no'){?>
<br>
<br>
<br>
		<center>
      <div id="registermodal" >
        <h1>DELETE ACCOUNT </h1><br>
        <form id="loginform" name="loginform" method="post" action="">
        	<p> Note: this action is not reversible. You'll lost all your data forever. Please, be sure before clicking delete </p> <br>
          <label for="username"> Enter your password: </label>
    	  <input type="password" name="pw" id="password" class="txtfield" tabindex="2">
     
          <div class="center"><input type="submit" name="submit-delete" id="loginbtn" class="flatbtn" value="Delete" tabindex="5"></div>
        </form>
      </div>
  </center>

      <?}?>
  <script type="text/javascript">
      $(function(){
       
        $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
      });
      </script>

<? include('templates/footer.php'); ?>




