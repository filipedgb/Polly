<?php

// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(!empty($_POST['submit-login']))
  {
  $username = $_POST['uLi'];
  $pword = $_POST['pLi'];

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

    $_SESSION['activated']=$result2[0];

  
    if($result2[0] == 0) {
       header("location: validateAccount.php");
    }
  	//$_SESSION['Permission']=$result[1];
  	else header("location: polls_index.php");
  }

  else echo "Wrong Username or Password";
}
  else if(!empty($_POST['submit-signup']))
  {
     header("location: register.php");
  }
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
            <form id="loginform" name="loginform" method="post" action="">
              <label for="username">Username:</label>
              <input type="text" name="uLi" id="username" class="txtfield" tabindex="1">
              
              <label for="password">Password:</label>
              <input type="password" name="pLi" id="password" class="txtfield" tabindex="2">
              
              
                <input type="submit" name="submit-login" id="loginbtn" class="flatbtn-blu hidemodal" value="Log In" tabindex="3">
             
            <div style=" float: right">
              <input type="submit" name="submit-signup" id="loginbtn" class="flatbtn-blu hidemodal" value="Sign Up" tabindex="3">
            </div>
            
            </form>
          </div>

          <script type="text/javascript">
          $(function(){
           
            $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
          });
          </script>


          <?

  
?>