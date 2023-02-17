<?php



 include("config/database/index.php");
$file1 = "";
$file2 = "";
$file3 = "";
$file4 = "";
$file5 = "";
 
if($_FILES["picture1"]["name"]!="") {
$target_dir = "images/products/";
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
}
if($_FILES["picture2"]["name"]!="") {
$target_dir = "images/products/";
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
}
if($_FILES["picture3"]["name"]!="") {
$target_dir = "images/products/";
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
if($_FILES["picture4"]["name"]!="") {
$target_dir = "images/products/";
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
}
if($_FILES["picture5"]["name"]!="") {
$target_dir = "images/products/";
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
}

 $prod_name=$_POST['prod_name'];
 $prod_category=$_POST['prod_category'];
 $price=$_POST['price'];
 $decription=$_POST['decription'];
 $contact_number=$_POST['contact_number'];
 $email=$_POST['email'];
 $date_posted=date('Y-m-d');
 $condition=$_POST['condition'];
 $muni_city=$_POST['muni_city'];
 $province=$_POST['province'];
 $seller=$_POST['seller'];
 $picture1="";
 $picture2="";
 $picture3="";
 $picture4="";
 $picture5="";
 
 
mysql_query("INSERT INTO `tbl_products` 
(`id`, 
`prod_name`,
`prod_category`, 
`price`, 
`decription`, 
`contact_number`, 
`email`, 
`date_posted`, 
`condition`, 
`muni_city`, 
`province`, 
`seller`, 
`picture1`, 
`picture2`, 
`picture3`, 
`picture4`, 
`picture5`,
`Status`) 
VALUES 
('NULL', '$prod_name', '$prod_category', '$price', '$decription', '$contact_number', '$email', '$date_posted', '$condition', '$muni_city', '$province', '$seller', '$file1', '$file2', '$file3', '$file4', '$file5','Pending')
") or die(mysql_error());

 //header('Location:../sell.php?success');


?>