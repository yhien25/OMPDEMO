<?php
//session_start();
include('conn.php');
$fname=$_POST['fname'];
$lname=$_POST['surname'];
$mname=$_POST['mname'];
$email=$_POST['email'];
$username=$_POST['uname'];

function randomString($length = 8) {
 $str = "";
 $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
 $max = count($characters) - 1;
 for ($i = 0; $i < $length; $i++) {
  $rand = mt_rand(0, $max);
  $str .= $characters[$rand];
 }
 return $str;
}

//$pword = randomString();

$password = randomString();


require_once("phpmailer/class.phpmailer.php");

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'ssl://smtp.gmail.com:465';
$mailer->SMTPAuth = TRUE;
$mailer->Username = '';  // Change this to your gmail adress
$mailer->Password = '';  // Change this to your gmail password
$mailer->From = 'admin@noreply.com';  // This HAVE TO be your gmail adress
$mailer->FromName = 'Registration Success!'; // This is the from name in the email, you can put anything you like here
$mailer->Body = 'Your username: '.$username.'  | Your password is: "'.$password.'';
$mailer->Subject = 'Welcome! Testing';
$mailer->AddAddress($_POST['email']); 

if(!$mailer->Send())
{
   echo "<script>alert('Registration failed.')</script>";

}
else
{
echo "<script>alert('Registration Success! Your generated passsword has been sent to your email.')</script>";

  mysql_query("INSERT INTO users(fname, lname, mname, email, uname, pword)VALUES('$fname', '$lname', '$mname', '$email','$username', '$password')");
}









?>