<?php 
ob_start();
session_start();
			echo $id = $_SESSION['ID'];
			include ('../../../config/database/index.php');
			mysql_query("UPDATE `tbl_visitor` SET 
				`active`='No'
				WHERE ID = '$id'");
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['ID']);
			
			session_destroy();
			
		header('Location: ../../../');
?>