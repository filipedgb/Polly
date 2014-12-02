
<?php
 include('templates/header.php'); 
 include("database/connection.php");	
 include('user.php');
?>



   	<center>
          <div id="registermodal" >
            <h1>Account settings </h1> <br>	
            <form id="loginform" name="loginform" method="post" action="">
              
            <div id="changeuser">
            <center><a href="change_username.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change username</a></center>
       		</div>

       		<br>


        	<div id="changepw">
            <center><a href="change_password.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change password</a></center>
        	</div>

        	<br>

            <div id="changemail">
            <center><a href="change_email.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change email</a></center>
        	</div>

        	<br>
            <div id="delete">
            <center><a href="delete_account.php" class="flatbtn-blu hidemodal" id="modaltrigger">Delete Account</a></center>
	        </div>
    	    <br>
              
            </form>
          </div>
      </center>


<?php 	include('templates/footer.php'); ?>