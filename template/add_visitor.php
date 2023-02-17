<?php 
ob_start();
 include("../config/database/index.php");
 
 $fname =$_POST['fname'];
 $lname =$_POST['lname'];
 $email =$_POST['youremail'];
 //$reemail =$_POST['reenteremail'];
 $password =$_POST['password'];
 $repass =$_POST['repass'];
 $sex =$_POST['sex'];
 $number =$_POST['number'];
 $code = (rand(1,9999999));
 	if($repass == $password){
		$to = $email;
	    $subject = "Confirmation from OMP to ". $fname;
		$header = "OMP: Confirmation from Online Market Philippines";
		$message = "Please enter the code to verify and activate your account. ";
		$message .= "Your code is ".$code;
		$sentmail = mail($to,$subject,$message,$header);

		if($sentmail){
			echo "Your Confirmation link Has Been Sent To Your Email Address.";
			mysql_query("INSERT INTO `tbl_visitor` 
			(`ID`, `fname`, `lname`, `email`, `number`, `password`, `gender`, `status`,`code`) 
			VALUES 
			('NULL', '$fname', '$lname', '$email', '$number', '$password', '$sex', 'Pending','$code')
			") or die(mysql_error());
			$sql2 = mysql_query("SELECT * FROM tbl_visitor WHERE email = '$email' AND fname = '$fname' AND lname = '$lname'");
			if(mysql_num_rows($sql2) != 0){
				$row2 = mysql_fetch_array($sql2);
				echo $id2 = $row2['ID'];
				header("location:../verify_account.php?id=$id2");
			}
		}else{
			echo "Cannot send Confirmation link to your e-mail address";
		}	
	}
	else{
		header("location:../register.php?failed");
	
	}
?>