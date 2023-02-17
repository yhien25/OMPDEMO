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
		
	$user = $_POST['youremail'];
	$password = $_POST['password'];

	if(!isset($user)){
	header("location: ../index.php");
	}
	//query
	$result = $conn->prepare("SELECT * FROM tbl_visitor WHERE email= :user AND password= :pass");
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
			$_SESSION['fname'] = $rows['fname'];
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $password;
			if($rows['status'] =='Active'){
				if($rows['active'] != 'Yes'){
					header("location: ../../");
				}else{
					session_destroy();
					header("location: ../../account.php?ACTIVE");
				}
			}else{
				session_destroy();
				header("location: ../../account.php?ERR");
			}
		}
		else
		{
			header("location: ../../account.php?ERR");
		}
		
		
		
?>