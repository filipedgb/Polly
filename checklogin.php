
<? /*include('templates/header.php');*/ ?>
<?php
include('database/connection.php');

if(isset($_SESSION['username']))
	{
		//echo 'welcome '.$_SESSION['username'];

          ?> 
          
          	<form id="loginSmall" action="logout.php" method="get">
          		 <center><div id="loginSmall"><button id=" loginSmall"name="logout" class="flatbtn" name="logout" type="submit" >Logout</button></div></center>
                 </form>
          	 
          <?
	}
	else 
	{
    
	include("login.php");
	}

?>
<?	/*include('templates/footer.php');*/ ?>