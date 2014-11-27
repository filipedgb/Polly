  <?php
        session_set_cookie_params('/~ei12068/');
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
    <div id="header">
      <h1><a href="polls_index.php">Online Polls Manager</a></h1>
      <!--<h2>CSS Exercise</h2>-->
    </div>
    <div id="menu">
      <ul>
        <?php if(isset($_SESSION['username'])){?>
          <li><a href="new_poll.php">New Poll</a></li>
          <li><a href="polls_answer.php">Answer Polls</a></li>
          <li><a href="my_poll_stats.php">My Polls results</a></li>
          <li><a href="manage_polls.php">Manage my polls</a></li>
          <li><a href="poll_stats.php">Answered Polls results</a></li>
        <?}?>


        <?php if(isset($_SESSION['username'])){?>
        <li><a href="checklogin.php">My Account</a></li>
        <?} else{?>
         <li><a href="register.php">Register</a></li>
          <li><a href="checklogin.php">Login</a></li>
          <?}?>
      </ul>


      <?php
        if(isset($_SESSION['username'])){
          echo "Username:".$_SESSION['username'];

        }
        //print_r($_SESSION);

        
      ?>


    </div>