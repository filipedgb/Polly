
<?php


 include('templates/header.php'); 


	// session_start();


?>

	<br>
	<br>
	<br>
	<center>
     	<div id="registermodal" >
        	<h1>Register</h1>
        	<form class="ajaxForm" id="loginform" name="loginform" method="post" >
          		<label for="username">Username:</label>
          		<input type="text" name="u" id="username" class="txtfield" tabindex="1">

		        <label for="username">Name:</label>
        		<input type="text" name="name" id="name" class="txtfield" tabindex="2">
          
		        <label for="password">Password:</label>
        		<input type="password" name="password" id="password1" class="txtfield" tabindex="3">

          		<label for="password">Password confirmation:</label>
          		<input type="password" name="password2" id="password2" class="txtfield" tabindex="4">

		        <label for="username">Email:</label>
        		<input type="text" name="email" id="username" class="txtfield" tabindex="5">
          
          		<div id="error_message" ></div>

          		<div class="center">
          			<input type="submit" name="submit-resgister" id="loginbtn" class="flatbtn-blu hidemodal" value="Register" tabindex="7">
          		</div>
        	</form>
      	</div>
    </center>




<script>
  /* Attach a submit handler to the form */
  $(".ajaxForm#loginform").submit(function(event) {
  		console.log("Faseflsefhself");
      /* Stop form from submitting normally */
      event.preventDefault();

      /* Clear result div*/
      $("#error_message").html('');

      /* Get some values from elements on the page: */
      var values = $(this).serialize();
    //  var values = new FormData($(this)[0]);
      //console.log(values);
      /* Send the data using post and put the results in a div */
      $.ajax({
          url: "register_action.php",
          type: "post",
          data: values,
          success: function(data){
              console.log(data.indexOf("Success"));
              if (data.indexOf("Success") > -1) window.location.replace('polls_index.php?err=validation');
              $("#error_message").html(data);
              $("#password1").val('');
              $("#password2").val('');

          },
          error:function(){
              /*alert("failure");*/
              $("#error_message").html('There is error while submit');
          }
      });
  });

</script>


<? include('templates/footer.php'); ?>




