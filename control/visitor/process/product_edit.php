<?php
	include("../../../config/database/index.php");
	$file1 = "";
	$file2 = "";
	$file3 = "";
	$file4 = "";
	$file5 = "";
	 
	if($_FILES["picture1"]["name"]!="") {
	$target_dir = "../../../images/products/";
	$file1=$_FILES["picture1"]["name"];
	$target_file = $target_dir . basename($_FILES["picture1"]["name"]);
	$uploadOk = 1;
	$file_loc = $_FILES['picture1']['tmp_name'];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["picture1"]["tmp_name"]);
		if($check !== false) {
			
			$uploadOk = 1;
			 move_uploaded_file($file_loc,$target_dir.$file1);
			
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}else{
		$file1 = $_POST['file_picture1'];
	}
	if($_FILES["picture2"]["name"]!="") {
	$target_dir = "../../../images/products/";
	$file2=$_FILES["picture2"]["name"];
	$target_file = $target_dir . basename($_FILES["picture2"]["name"]);
	$uploadOk = 1;
	$file_loc = $_FILES['picture2']['tmp_name'];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["picture2"]["tmp_name"]);
		if($check !== false) {
			
			$uploadOk = 1;
			 move_uploaded_file($file_loc,$target_dir.$file2);
			
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}else{
		$file2 = $_POST['file_picture2'];
	}
	if($_FILES["picture3"]["name"]!="") {
	$target_dir = "../../../images/products/";
	$file3=$_FILES["picture3"]["name"];
	$target_file = $target_dir . basename($_FILES["picture3"]["name"]);
	$uploadOk = 1;
	$file_loc = $_FILES['picture3']['tmp_name'];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["picture3"]["tmp_name"]);
		if($check !== false) {
			
			$uploadOk = 1;
			 move_uploaded_file($file_loc,$target_dir.$file3);
			
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	else{
		$file3 = $_POST['file_picture3'];
	}
	if($_FILES["picture4"]["name"]!="") {
	$target_dir = "../../../images/products/";
	$file4=$_FILES["picture4"]["name"];
	$target_file = $target_dir . basename($_FILES["picture4"]["name"]);
	$uploadOk = 1;
	$file_loc = $_FILES['picture4']['tmp_name'];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["picture4"]["tmp_name"]);
		if($check !== false) {
			
			$uploadOk = 1;
			 move_uploaded_file($file_loc,$target_dir.$file4);
			
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}else{
		$file4 = $_POST['file_picture4'];
	}
	if($_FILES["picture5"]["name"]!="") {
	$target_dir = "../../../images/products/";
	$file5=$_FILES["picture5"]["name"];
	$target_file = $target_dir . basename($_FILES["picture5"]["name"]);
	$uploadOk = 1;
	$file_loc = $_FILES['picture5']['tmp_name'];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["picture5"]["tmp_name"]);
		if($check !== false) {
			
			$uploadOk = 1;
			 move_uploaded_file($file_loc,$target_dir.$file5);
			
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}else{
		$file5 = $_POST['file_picture5'];
	}
	 echo "<br>" . $tran=$_POST['tran'];
	 echo "<br>" . $id=$_POST['id'];
	 echo "<br>" . $prod_name=$_POST['prod_name'];
	 echo "<br>" . $prod_category=$_POST['prod_category'];
	 echo "<br>" . $price=$_POST['price'];
	 echo "<br>" . $decription=$_POST['decription'];
	 echo "<br>" . $condition=$_POST['condition'];
	 echo "<br>" . $muni_city=$_POST['muni_city'];
	 echo "<br>" . $province=$_POST['province'];
	 echo "<br>" . $file_picture1=$_POST['file_picture1'];
	 echo "<br>" . $file_picture2=$_POST['file_picture2'];
	 echo "<br>" . $file_picture3=$_POST['file_picture3'];
	 echo "<br>" . $file_picture4=$_POST['file_picture4'];
	 echo "<br>" . $file_picture5=$_POST['file_picture5'];
	 
	mysql_query("UPDATE `tbl_products` SET 
		`prod_name`='$prod_name',
		`prod_category`='$prod_category',
		`price`='$price',
		`decription`='$decription',
		`condition`='$condition',
		`muni_city`='$muni_city',
		`province`='$province',
		`picture1`='$file1',
		`picture2`='$file2',
		`picture3`='$file3',
		`picture4`='$file4',
		`picture5`='$file5'
		WHERE id = '$id'") or die(mysql_error());

	header("location:../?tran=product");
?>