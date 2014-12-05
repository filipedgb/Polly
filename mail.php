

<?php

 function emailconf($email, $link, $code) { 
   
	//echo $email;

		$message =

	
   "\n\nHello!\n

Thank you for joining Polly. \n

Verify your email address and start using Polly by clicking here: " . $link . 

"\n\n You can also copy the code and past it in the website: " . $code;

	mail($email,'Email verification',$message,'From: polly@forms.com');

}


?>



