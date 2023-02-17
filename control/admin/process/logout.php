<?php 
ob_start();
session_start();

			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['id']);
			
			session_destroy();
			
		header('Location: ../index.php');
?>