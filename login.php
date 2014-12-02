<?php

        $message="";

        /*  **************************   BUTTON CLICKED   **********************  */

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
                
                  //if the account is'nt acctivated
                  if($result2[0] == 0) {
                     header("location: validateAccount.php");
                  }
                  //redirects you to the home page
                  else header("location: polls_index.php");
              }

              else {
                  echo "Wrong Username or Password";
                  $message="ERRO";
                                }
          }
          //if the register button is pressed
          else if(!empty($_POST['submit-signup']))
          {
             header("location: register.php");

          }
          else if(!empty($_POST['submit-lostpw']))
          {
             header("location: register.php");

          }


        }
         ?>
                





                
        <!-- *********************************HTML***************************************   -->

        <div id="loginSmall">
            <center><a href="#loginmodal" class="flatbtn" id="modaltrigger">Log In</a></center>
        </div>
         <? if ($message!="")
          {

          ?>
          <script> wrongLogin()</script><?
        }
          ?>
        <div id="loginmodal" style="display:none;">

          <form id="loginform" name="loginform" method="post" action="">
           
              <label for="username">Username:</label>
              <input type="text" name="uLi" id="username" class="txtfield" tabindex="1">
              
              <label for="password">Password:</label>
              <input type="password" name="pLi" id="password" class="txtfield" tabindex="2">

              <a href="forgotPassword.php"> Forgot your password? </a> 

              <!---
              <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true"></div>

              -->
              <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
              </fb:login-button>

                <span id="loginSmall">
                  <input type="submit" name="submit-login" id="loginbtn" class="flatbtn hidemodal" value="Log In" tabindex="3">
                </span>
                <span  id="loginSmall">
                  <input  type="submit" name="submit-signup" id="loginbtn" class="flatbtn-blu hidemodal" value="Sign Up" tabindex="3">
                </span>

                 <div id="loginFacebook">
                  <a href="https://www.facebook.com/dialog/oauth?client_id=639010562888160&redirect_uri=http://paginas.fe.up.pt/~ei12021/ltw_projecto/polls_index.php&scope=email,user_website,user_location" class="flatbtn hidemodal">Login with Facebook</a>

              </div>
          
          </form>
        </div>

        <!-- *******TRIGGER*********** -->

        <script type="text/javascript">
        $(function(){
         
          $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
        });


        </script>


 <?

  
?>