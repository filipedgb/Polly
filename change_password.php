
<?php


include('templates/header.php'); 
 include("database/connection.php");  
    include('database/polls_fetch.php');
include_once('utilities/PasswordHash.php');



// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{


     if(!empty($_POST['submit-changepw']))
      {


     		$username = $_SESSION['username'];
        $oldpword = $_POST['oldpassword'];
        $newpword = $_POST['password'];
        $newpword2 = $_POST['password2'];

        $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = :user');
        $stmt->bindParam(':user',$username, PDO::PARAM_STR);
       // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if(validate_password($oldpword, $result['Pword']) && $newpword==$newpword2 ){

          $stmt = $db->prepare('UPDATE Utilizador SET Pword= :newpw WHERE username = :user');
          $stmt->bindParam(':newpw',create_hash($newpword), PDO::PARAM_STR);
          $stmt->bindParam(':user',$username, PDO::PARAM_STR);
          $stmt->execute();

          header("location: my_account.php");
        }


     }

}
// VIA EMAIL LINK
else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username']) && isset($_GET['code'])) {
      $username =  $_GET['username'];
      $code =  $_GET['code'];


      $stmt = $db->prepare('SELECT * FROM resetPw WHERE userId = :user AND tempCode = :code ');
      $stmt->bindParam(':user',getUserIDbyUsername($username), PDO::PARAM_STR);
      $stmt->bindParam(':code',$code, PDO::PARAM_STR);

       // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();

        if(isset( $result[0])) {
            $_SESSION['username']=$username;
        }
}


?>

<center>
          <div id="registermodal" >
            <h1>New password</h1> <br>
            <form id="loginform" name="loginform" method="post" action="">
              <label for="Old password">Old Password:</label>
              <input type="password" name="oldpassword" id="oldpassword" class="txtfield" tabindex="2">
              
              <label for="New password">New password:</label>
              <input type="password" name="password" id="password" class="txtfield" tabindex="2">

              <label for="Confirm new password">New Password confirmation:</label>
              <input type="password" name="password2" id="password2" class="txtfield" tabindex="3">

              <div class="center"><input type="submit" name="submit-changepw" id="loginbtn" class="flatbtn-blu hidemodal" value="Change" tabindex="5"></div>
            </form>
          </div>
</center>

      
<script type="text/javascript">
      $(function(){
       
        $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
      });
      </script>

<? include('templates/footer.php'); ?>




