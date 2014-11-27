

<?php

 function emailconf($email, $code) { 
   
	echo $email;

	echo $message = "Your confirmation code: " . $code ;

	mail($email,'Email verification',$message,'From: polly@forms.com');

}


?>



