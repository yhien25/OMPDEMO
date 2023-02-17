<?php 
	ob_start();
	session_start();
	if(!isset($_SESSION['ID'])){
		header("location: ../index.php?ERR");
	}
	include("../../../config/database/index.php");
	$id = $_GET['id'];

	$confirm = $_POST['confirm'];
	$old = $_POST['old'];
	$new = $_POST['new'];
	
	$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$id' ");
					
	while($row = mysql_fetch_array($sql)){
	$password = $row['password'];	
	}
	if($password == $old && $confirm == $new){
		mysql_query("UPDATE tbl_visitor
			SET
			
			password = '$new'
			
			
			WHERE ID = '$id'") or die(mysql_error());
		header("location:../index.php?tran=Password&&success");	
			
		
	}else{
	
		header("location:../index.php?tran=Password&&failed");	
	}
	
	
?>