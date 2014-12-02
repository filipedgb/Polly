  <?php
        session_set_cookie_params('/~ei12022/');
        session_start();
        include_once('getPollURL.php');
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

    <?  $current_page = getPageFileName(); ?>

  
<body>



    <header>

      <a href="polls_index.php" id="logo"></a>
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

      <?php if(!isset($_SESSION['username'])){?>
              <div id="logButaoMenu" >
                <?
                include("database/connection.php");
                include("PasswordHash.php");
                include 'checklogin.php';
                //if(isset($_SESSION['username']))echo "Username:".$_SESSION['username']; 
                ?>  
              </div>


              <!--  <div id="logButaoMenu" >
              
              <form id="loginSmall" action="my_account.php" method="get">
               <center><div id="account"><button id=" loginSmall"name="account" class="accbtn" name="logout" type="submit" > <? echo $_SESSION['username'] ?> </button></div></center>
                 </form>
              </div>
              -->
            </div>

      <? } ?>
    </nav>

  </header>



     <div>


