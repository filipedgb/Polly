<!DOCTYPE html>
<html>

<head>
    <title>Polls Proj LTW</title>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/add_elements.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="header">
      <h1><a href="polls_index.php">Online Polls Manager</a></h1>
      <!--<h2>CSS Exercise</h2>-->
    </div>
    <div id="menu">
      <ul>
        <li><a href="new_poll.php">New Poll</a></li>
        <li><a href="polls_all.php">View All Polls</a></li>
        <li><a href="poll_stats.php">Poll stats</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="teste.php">Login</a></li>
        <li><a href="">My Account</a></li>
      </ul>


      <?php
        ob_start();
        session_start();
        if(isset($_SESSION['username'])){
          echo "Username:".$_SESSION['username'];

        }
        //print_r($_SESSION);

      ?>


    </div>


