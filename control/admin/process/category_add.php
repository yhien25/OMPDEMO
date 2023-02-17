<?php 
	ob_start();
	session_start();
?>
<?php
		if(!isset($_SESSION['ID'])){
			header("location: ../index.php?ERR");
		}
		include("../../../config/database/index.php");
	
	if(isset($_POST['category'])){
		
		$category = $_POST['category'];
		$page = $_POST['page'];
									
		$file = "";
		if($_FILES["picture"]["name"]!="") {
		$target_dir = "../../../images/icons/";
		$file=$_FILES["picture"]["name"];
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);
		$uploadOk = 1;
		$file_loc = $_FILES['picture']['tmp_name'];
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

			$check = getimagesize($_FILES["picture"]["tmp_name"]);
			if($check !== false) {
				
				$uploadOk = 1;
				 move_uploaded_file($file_loc,$target_dir.$file);
				
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}	
		mysql_query("INSERT INTO tbl_categories (ID,picture,prod_category)
					VALUES('NULL','$file','$category')") or die(mysql_error());
	}
	header("location:../?page=$page");
	
?>