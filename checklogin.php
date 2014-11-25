
<? include('templates/header.php'); ?>
<?php
include('database/connection.php');

if(isset($_SESSION['username']))
	{
		echo 'welcome '.$_SESSION['username'];
		echo '<form action="logout.php" method="get">
                 <button name="logout" type="submit" >Logout</button>
                 </form>';
	}
	else 
	{
	include("login.php");
	}

?>
<?	include('templates/footer.php'); ?>