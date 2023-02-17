<?php 
	ob_start();
	session_start();
?>
<?php
		if(!isset($_SESSION['ID'])){
			header("location: ../index.php?ERR");
		}
		include("../../../config/database/index.php");
	
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repass = $_POST['repass'];
		
		
		if($repass == $password){
			$password = md5($password);
			mysql_query("INSERT INTO tbl_user(ID, username, password, name, type)
					VALUES('NULL','$username','$password','$name','Administrator')") or die(mysql_error());
		header("location:../?tran=Admin&success");
		}
		else{
		header("location:../?tran=Admin&failed");
		}
	}
	
	
	
?>