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
                   $_SESSION['name'] =$result2['name'];
                    $_SESSION['facebook']='no';
                
                  //if the account is'nt acctivated
                  if($result2[0] == 0) {
                     header("location: validateAccount.php");
                  }
                  //redirects you to the home page
                  else header("location: polls_index.php");
              }

              else {
                  header("location: polls_index.php?err=userpass");
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







        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code']))
        {
        
                   // Informe o seu App ID abaixo
                   $appId = '639010562888160';
                  
                   // Digite o App Secret do seu aplicativo abaixo:
                   $appSecret = 'ee2d0803bf9c1c33bbf7557fd1caf7f4';
                   
                    // Url informada no campo "Site URL"
                    $redirectUri = urlencode('http://paginas.fe.up.pt/~ei12021/ltw_projecto/polls_index.php');
                   
                    // Obtém o código da query string
                    $code = $_GET['code'];
                   
                    // Monta a url para obter o token de acesso e assim obter os dados do usuário
                    $token_url = "https://graph.facebook.com/oauth/access_token?"
                    . "client_id=" . $appId . "&redirect_uri=" . $redirectUri
                    . "&client_secret=" . $appSecret . "&code=" . $code;
                   
                    //pega os dados
                    $response = @file_get_contents($token_url);
                    if($response){
                          $params = null;
                         parse_str($response, $params);
                          if(isset($params['access_token']) && $params['access_token']){
                            $graph_url = "https://graph.facebook.com/me?access_token="
                            . $params['access_token'];
                            $user = json_decode(file_get_contents($graph_url));
                       
                                  // nesse IF verificamos se veio os dados corretamente
                                  if(isset($user->email) && $user->email){
                         
                                    /*
                                    *Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los
                                    *em sessão, cookie ou já pode inserir em seu banco de dados para efetuar
                                    *autenticação.
                                    *No meu caso, solicitei todos os dados abaixo e guardei em sessões.
                                   */
                               
                                        $_SESSION['email'] = $user->email;
                                        $_SESSION['name'] = $user->name;
                                       /* $_SESSION['localizacao'] = $user->location->name;*/
                                        $_SESSION['username'] = $user->id;
                                       /* $_SESSION['uid_facebook'] = $user->id;*/
                                      /*  $_SESSION['user_facebook'] = $user->username;*/
                                     /*   $_SESSION['link_facebook'] = $user->link;*/
                                     $_SESSION['facebook']='yes';
                                        $utilizadore=$user->id;
                                        $nome=$user->name;
                                        $email=$user->email;
                                         $_SESSION['activated']='1';
                                            $stmt = $db->prepare('SELECT count(IdUser) FROM Utilizador WHERE username = :user');
                                            $stmt->bindParam(':user',$utilizadore, PDO::PARAM_STR);
                                            $stmt->execute();
                                            $result = $stmt->fetch();

                                            if($result[0] == 1) 
                                            {
                                              header('location: polls_index.php');
                                            }
                                            
                                            else
                                            { 

                                                  $stmt = $db->prepare('INSERT INTO Utilizador(IdUser,Username,Pword,Email,Nome,Facebook,Active,RegCode) VALUES (?,?,?,?,?,?,?,?)');

                                                
                                              //A linha seguinte não é suportada pelo gnomo 
                                              //$stmt->execute(array(NULL,$utilizadore, password_hash($passuorde, PASSWORD_DEFAULT, $options) ) );
                                              
                                              $stmt->execute(array(NULL,$utilizadore, create_hash($utilizadore),$email,$nome,'1','1','0'));
                                            header("location: polls_index.php");

                                            }

                                          


                                      }
                            }else{
                              header("location: polls_index.php");
                              /*
                              echo "Erro de conexão com Facebook";
                              exit(0);*/
                            }
                   
                      }else{
                        /*
                        echo "Erro de conexão com Facebook";
                        exit(0);
                        */
                        header("location: polls_index.php");
                    }
              }else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){
                echo 'Permissão não concedida';
                print_r($user);
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


