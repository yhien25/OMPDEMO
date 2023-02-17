<?php 
	ob_start();
	session_start();
	if(!isset($_SESSION['ID'])){
		header("location: ../index.php?ERR");
	}
	include("../../../config/database/index.php");
	$id = $_GET['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$number = $_POST['number'];
	$confirm = $_POST['confirm_password'];
	
	$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$id' ");
					
	while($row = mysql_fetch_array($sql)){
	$password = $row['password'];	
	}
	if($password == $confirm){
		mysql_query("UPDATE tbl_visitor
			SET
			
			fname = '$fname',
			lname = '$lname',
			number = '$number'
			
			WHERE ID = '$id'") or die(mysql_error());
			header("location:../?tran=Account&success");	
		
	}else{
		header("location:../?tran=Account&failed");	
	}
	
	
?>