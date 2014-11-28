<?if(isset($_SESSION['username'])){
	if($_SESSION['activated'] == 0) {
		header("location: validateAccount.php");
	}

}
        


 else header("location: checklogin.php");?>