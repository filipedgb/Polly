<?php
  include_once('database/connection.php');
?>


	<form action= "new_image.php" method="post" enctype="multipart/form-data">
		Select Image: <input type="file" name="image"/><br><br>
		<input type="submit" name="upload" value="Upload Now"/>
		
	</form>



<?php
if(isset($_POST['upload'])){
		 $image_name= $_FILES['image']['name'];
		 $image_type= $_FILES['image']['type'];
		 $image_size= $_FILES['image']['size'];
		 $image_tmp_name= $_FILES['image']['tmp_name'];

		if($image_name=="")
		{
			echo "<script> alert('There will be no image in your poll')</script>";
			exit();
			//nao vai ter imagem
		}
		else
			move_uploaded_file($image_tmp_name, "databaseImages/$image_name");

}

?>


