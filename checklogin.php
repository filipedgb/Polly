
<? include('templates/header.php'); ?>
<?php
include('database/connection.php');

if(isset($_SESSION['username']))
	{
		echo 'welcome '.$_SESSION['username'];

          ?> 
          
          <div id="w">
          	<form action="logout.php" method="get">
          		 <center><button name="logout" class="flatbtn" name="logout" type="submit" >Logout</button></center>
                 </form>
          	 
          </div>
          <?
	}
	else 
	{
	include("login.php");
	}

?>
<?	include('templates/footer.php'); ?>