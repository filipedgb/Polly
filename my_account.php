
<?php
 include('templates/header.php'); 
 include("database/connection.php");	
 include('user.php');





// session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if($_SESSION['facebook']=="yes")
    {
      $stmt = $db->prepare('DELETE FROM Utilizador WHERE username = :user');
      $stmt->bindParam(':user',$_SESSION['username'], PDO::PARAM_STR);
      $stmt->execute();

       include('logout.php');
    }

}
?>
 <style>
    .round {
        border-radius: 50%;
        overflow: hidden;
        width: 15%;
         height: auto;
         max-height: 140px;
         max-height: 140px;
         
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
              <?if( $_SESSION['facebook']=='yes'){?>
                      <img src="https://graph.facebook.com/<?= $_SESSION['username']?>/picture?width=140&height=140" />
               <?}else{?>
                    <img src="img/avatar.png" />
               <?}?>
            </div>
            <h2>Welcome <?=$_SESSION['name']?> </h2>

            <form id="loginform" name="loginform" method="post" action="">

          <?if( $_SESSION['facebook']=='no'){?>
              
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


           <?} else {?>
           <div id="delete">

            <center><input type="submit" name="deleteFacebookAccount" id="loginbtn" class="flatbtn-blu hidemodal" value="Disconnect Account" tabindex="1"></center>
          </div>
          <?}?>
              
            </form>
          </div>
      </center>


<?php 	include('templates/footer.php'); ?>