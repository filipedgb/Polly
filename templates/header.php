<?php
  session_set_cookie_params('/~ei12022/');
  session_start();
  //include_once('utilities/getPollURL.php');
  //include("database/connection.php");
  //include("utilities/PasswordHash.php");
  
?>
<!DOCTYPE html>
<html>

<head>
    <title>Polly, polls made easy.</title>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


  <meta property="og:image" content="http://i.imgur.com/kCdUABX.png"/>
  </head>
  <body>


<!-- FACEBOOK SHARE BUTTON -->

   <!-- <div id="header">
      <h1><a href="polls_index.php">Online Polls Manager</a></h1>
    </div>-->

    <?  //$current_page = getPageFileName(); 
      $current_page = pathinfo($_SERVER['REQUEST_URI'])['filename']
    ?>

  
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

    <header>

      <a href="polls_index.php" id="logo"></a>


      

<?php if(isset($_SESSION['username'])){?>
    <nav> 
      <a href="#" id="menu-icon"></a>
     
         

      <ul>
                <?php if(isset($_SESSION['username'])){?>
                  <li><a href="new_poll_group.php" <?if ($current_page == "new_poll_group") echo 'id="selected"' ?> >Create</a></li>
                  <li><a href="polls_answer.php" <?if ($current_page == "polls_answer") echo 'id="selected"' ?> >Answer</a></li>
                  <li> <a href="poll_stats.php" <?if ($current_page == "poll_stats") echo 'id="selected"' ?>>Answered results</a></li>
                  <li><a href="my_poll_stats.php" <?if ($current_page == "my_poll_stats") echo 'id="selected"' ?> >My Results</a></li>
                  <li><a href="manage_polls.php" <?if ($current_page == "manage_polls") echo 'id="selected"' ?> >Manage</a></li>
                  <li> <a href="my_account.php" <?if ($current_page == "my_account") echo 'id="selected"' ?>>My Account</a></li>
                  <li> <a href="logout.php" <?if ($current_page == "logout") echo 'id="selected"' ?>>Log out</a></li>

                  <!--<a href="checklogin.php">My Account</a>-->
                 <? } ?>

      </ul> 

     
    </nav>
     <?}?>
 <?php if(!isset($_SESSION['username'])){?>
              
              <span id="logButaoMenu" >
                <?include ("checklogin.php");?>
              </span>
              <?if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['err'])){
                $message_err = $_GET['err'];
                if ($message_err == "userpass")
                  echo '<span id="errorMessage">Wrong Username or Password</span>';
                else if ($message_err == "validated")
                  echo '<span id="errorMessage">Account activated. Please login!</span>';
                else if ($message_err == "validation")
                  echo '<span id="errorMessage">Success! Validation code has been sent to your email!</span>';
                else if ($message_err == "notallanswered")
                  echo '<span id="errorMessage">Error: not all polls from questionnaire were answered...</span>';
                //echo $_SERVER["REQUEST_URI"];
       
                
              }?>

            </div>
            <?
            /*echo $_SERVER['REQUEST_URI'].'<br>';
            echo pathinfo($_SERVER['REQUEST_URI'])['filename'].'<br>';*/
            
            ?>


      <? } ?>
  </header>




     <div>


