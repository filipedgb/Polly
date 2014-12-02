
<?php
 include('templates/header.php'); 
 include("database/connection.php");	
 include('user.php');
?>
 <style>
    .round {
        border-radius: 50%;
        overflow: hidden;
        width: 15%;
        height: auto;
    }
    .round img {
        display: block;
    /* Stretch 
          height: 100%;
          width: 100%; */
    min-width: 100%;
    min-height: 100%;
    }
  </style>

   	<center>
          <div id="accountSettings" class="poll_item" >
            <h1>Account settings </h1> 
            <div class="round">
               <img src="img/avatar.png" />
            </div>
            <h2>Welcome <?=$_SESSION['username']?> </h2>

            <form id="loginform" name="loginform" method="post" action="">
              
            <div id="changeuser">
            <center><a href="change_username.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change username</a></center>
       		</div>



        	<div id="changepw">
            <center><a href="change_password.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change password</a></center>
        	</div>


            <div id="changemail">
            <center><a href="change_email.php" class="flatbtn-blu hidemodal" id="modaltrigger">Change email</a></center>
        	</div>

            <div id="delete">
            <center><a href="delete_account.php" class="flatbtn-blu hidemodal" id="modaltrigger">Delete Account</a></center>
	        </div>
              
            </form>
          </div>
      </center>


<?php 	include('templates/footer.php'); ?>