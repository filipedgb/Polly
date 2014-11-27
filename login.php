<?php
include("database/connection.php");
include("PasswordHash.php");
// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = $_POST['u'];
  $pword = $_POST['p'];

  $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = :user');
  $stmt->bindParam(':user',$username, PDO::PARAM_STR);
 // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch();
  
  if(validate_password($pword, $result['Pword']) ){

  
  	// store session data
  	$_SESSION['username']=$username;


    $stmt = $db->prepare('SELECT Active FROM Utilizador WHERE username = :user');
    $stmt->bindParam(':user',$username, PDO::PARAM_STR);
   // $stmt->bindParam(':pword',$pword, PDO::PARAM_STR);
    $stmt->execute();
    $result2 = $stmt->fetch();

    if($result2[0] == 0) {
       header("location: validateAccount.php");
    }
  	//$_SESSION['Permission']=$result[1];
  	else header("location: checklogin.php");
  }

  else echo "Wrong Username or Password";
}

/*echo '<div id="login">
         <form action="" method="post">
          <p>Username: <input type="text" name="u"/></p>
          <p>Password: <input type="password" name="p"/></p>
          <p><input type="submit"/></p>
          </form></div>';*/
          ?>
          
          <div id="w">
              <center><a href="#loginmodal" class="flatbtn" id="modaltrigger">Login</a></center>
          </div>

          <div id="loginmodal" style="display:none;">
            <h1>User Login</h1>
            <form id="loginform" name="loginform" method="post" action="">
              <label for="username">Username:</label>
              <input type="text" name="u" id="username" class="txtfield" tabindex="1">
              
              <label for="password">Password:</label>
              <input type="password" name="p" id="password" class="txtfield" tabindex="2">
              
              <div class="center"><input type="submit" name="submit" id="loginbtn" class="flatbtn-blu hidemodal" value="Log In" tabindex="3"></div>
            </form>
          </div>

          <script type="text/javascript">
          $(function(){
           
            $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
          });
          </script>


          <?

  
?>