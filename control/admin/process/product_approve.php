<?php 
	ob_start();
	session_start();
?>
<?php
	if(!isset($_SESSION['ID'])){
		header("location: ../index.php?ERR");
	}
	include("../../../config/database/index.php");
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		mysql_query("UPDATE tbl_products
			SET
			
			status = 'Approved'
			WHERE ID = '$id'") or die(mysql_error());
		
	}
	header("location:../?tran=Product");			
?>
