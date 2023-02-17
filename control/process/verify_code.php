<?php
	include("../../config/database/index.php"); 
	if(!isset($_POST['id'])){
		header("location:../../register.php");
	}
	//code : 1337586;
	$id = $_POST['id'];
	$code = $_POST['code'];
	$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$id' AND code = '$code'");
	if(mysql_num_rows($sql) !=0){
		mysql_query("UPDATE tbl_visitor
			SET
			
			status = 'Active'
			WHERE ID = '$id'") or die(mysql_error());
		header("location:../../account.php?success");
	}else{
		header("location:../../verify_account.php?error&id=$id");
	}
?>