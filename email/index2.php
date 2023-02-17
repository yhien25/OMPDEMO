<?php if(isset($_POST['Submit'])) {
 // submitted to server through form

// build the email message by using
// info received by the HTML form
$msg = $_POST['email'];


// send email using PHP's built in 
// command, mail()
mail('jomarsangil@gmail.com', 
	'Sample Comments', $msg);

// redirect to the thank you page
header('location: index.html');

// exit this script - just to make sure nothing else gets run
exit(0);
} else {
  // do other code block
  header('Location: contact-us.html');
}?>