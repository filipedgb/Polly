  <?php
        session_set_cookie_params('/~ei12022/');
        session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Polls Proj LTW</title>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/add_elements.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
  </head>
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

   <!-- <div id="header">
      <h1><a href="polls_index.php">Online Polls Manager</a></h1>
    </div>-->
    <div id="container" class="menuButtons ">
            <div id="menuButtons" class="ha-header-front">
              <h1><span><a href="polls_index.php"><font color="3E4855">Polly</a></span></h1>
              <nav color="red" id="navButtons">
                <?php if(isset($_SESSION['username'])){?>
                  <a href="new_poll_group.php">New Poll</a>
                  <a href="polls_answer.php">Answer Polls</a>
                  <a href="my_poll_stats.php">My Polls results</a>
                  <a href="manage_polls.php">Manage my polls</a>
                  <a href="poll_stats.php">Answered Polls results</a>
                  <!--<a href="checklogin.php">My Account</a>-->
                 <? } ?>

              </nav>
              <div id="logButaoMenu" >
                <?
                include("database/connection.php");
                include("PasswordHash.php");
                include 'checklogin.php';
                //if(isset($_SESSION['username']))echo "Username:".$_SESSION['username']; 
                ?>  
              </div>
              
            </div>

            

     </div>
     <div margin-top: '500px'>