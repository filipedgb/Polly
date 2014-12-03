  <?php
        session_set_cookie_params('/~ei12022/');
        session_start();

        
       
        
        include_once('getPollURL.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Polly, polls made easy.</title>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/add_elements.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
  </head>
  <body>


<!-- FACEBOOK SHARE BUTTON -->

   <!-- <div id="header">
      <h1><a href="polls_index.php">Online Polls Manager</a></h1>
    </div>-->

    <?  $current_page = getPageFileName(); ?>

  
<body>

<!-- FACEBOOK SHARE BUTTON -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!--               SCRIPT FACEBOOK           -->




<!--
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
-->


    <header>

     
      <a href="polls_index.php" id="logo"></a>

<?php if(isset($_SESSION['username'])){?>
    <nav> 
      <a href="#" id="menu-icon"></a>
     
      

      <ul>
                <?php if(isset($_SESSION['username'])){?>
                  <li><a href="new_poll_group.php" <?if ($current_page == "new_poll_group.php") echo 'id="selected"' ?> >New Poll</a></li>
                  <li><a href="polls_answer.php" <?if ($current_page == "polls_answer.php") echo 'id="selected"' ?> >Answer Polls</a></li>
                  <li><a href="my_poll_stats.php" <?if ($current_page == "my_poll_stats.php") echo 'id="selected"' ?> >My Polls results</a></li>
                  <li><a href="manage_polls.php" <?if ($current_page == "manage_polls.php") echo 'id="selected"' ?> >Manage</a></li>
                  <li> <a href="poll_stats.php" <?if ($current_page == "poll_stats.php") echo 'id="selected"' ?>>Answered results</a></li>
                  <li> <a href="my_account.php" <?if ($current_page == "poll_stats.php") echo 'id="selected"' ?>>My Account results</a></li>
                  <li> <a href="logout.php" <?if ($current_page == "poll_stats.php") echo 'id="selected"' ?>>Log out</a></li>

                  <!--<a href="checklogin.php">My Account</a>-->
                 <? } ?>

      </ul> 

     
    </nav>
     <?}?>
 <?php if(!isset($_SESSION['username'])){?>
 
              <span id="logButaoMenu" >
                <?
                include("database/connection.php");
                include("PasswordHash.php");
                include 'checklogin.php';
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){
        
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
                //if(isset($_SESSION['username']))echo "Username:".$_SESSION['username']; 
                ?>  
              </span>


              <!--  <div id="logButaoMenu" >
              
              <form id="loginSmall" action="my_account.php" method="get">
               <center><div id="account"><button id=" loginSmall"name="account" class="accbtn" name="logout" type="submit" > <? echo $_SESSION['username'] ?> </button></div></center>
                 </form>
              </div>
              -->
            </div>

      <? } ?>
  </header>




     <div>


