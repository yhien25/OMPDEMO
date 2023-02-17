<?php
ob_start();
session_start();
	
$dbhost 	= "localhost";
$dbname		= "onlinem2_DB";
$dbuser		= "onlinem2";
$dbpass		= "U55t7wzsA3";

// database connection


		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	$user = $_POST['username'];
	$password = md5($_POST['password']);

	if(!isset($user)){
	header("location: ../index.php");
	}
	//query
	$result = $conn->prepare("SELECT * FROM tbl_user WHERE username= :user AND password= :pass");
	$result->bindParam(':user', $user);
	$result->bindParam(':pass', $password);
	$result->execute();
	$rows = $result->fetch(PDO::FETCH_ASSOC);
	
	//fetching
		if($rows > 0) 
		{
			session_destroy();
			session_start();
			
			$_SESSION['ID'] = $rows['ID'];
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = $rows['type'] ;
			if($rows['type'] =='Administrator'){
				header("location: ../admin/");
			}
		}
		else
		{
			header("location: ../index.php?ERR");
		}
		
		
		
?>