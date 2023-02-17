<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Send Mail</title>
<script type="text/javascript">
function validate_email(field,alerttxt)
{
with (field)
  {
  apos=value.indexOf("@");
  dotpos=value.lastIndexOf(".");
  if (apos<1||dotpos-apos<2)
    {alert(alerttxt);return false;}
  else {return true;}
  }
}

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(name,"Name must be filled out!")==false)
  	{
	   name.focus();return false;
	}
  else if (validate_email(email,"Not a valid e-mail address!")==false)
    {
	   email.focus();return false;
    }
  else if (validate_required(message,"Please leave your message!")==false)
    {
	   message.focus();return false;
    }
  }
}
</script>
</head>
<body>
<?php

if (isset($_REQUEST['email']))
{
$name = $_REQUEST['name'] ;
$address = $_REQUEST['address'] ;
$city = $_REQUEST['city'] ;
$country = $_REQUEST['country'] ;
$phoneno = $_REQUEST['phoneno'] ;
$email = $_REQUEST['email'] ;
$subject = $name . ' sent a message using the contact form';
$message = $subject . '<br /><br />Name: ' . $name . '<br />Address: ' . $address  . '<br />City: ' . $city . '<br />Country: ' . $country . '<br />Phone No.: ' . $phoneno . '<br />Message: ' . $message;

$headers = "From: $email\r\n"; 

$headers .= "MIME-Version: 1.0\r\n"; 

$boundary = uniqid("HTMLEMAIL"); 
      
$headers .= "Content-Type: multipart/alternative;".
                "boundary = $boundary\r\n\r\n"; 

$headers .= "This is a MIME encoded message.\r\n\r\n"; 

$headers .= "--$boundary\r\n".
            "Content-Type: text/plain; charset=ISO-8859-1\r\n".
            "Content-Transfer-Encoding: base64\r\n\r\n"; 
                
$headers .= chunk_split(base64_encode(strip_tags($message))); 

$headers .= "--$boundary\r\n".
            "Content-Type: text/html; charset=ISO-8859-1\r\n".
            "Content-Transfer-Encoding: base64\r\n\r\n"; 
                
$headers .= chunk_split(base64_encode($message)); 
	
mail( "youremail@domain.com", "Subject: $subject","", $headers );

echo "Thank you for using our contact form.";
}
else
{ ?>
<form id="form2" name="form2" method="post" action="" onsubmit="return validate_form(this);">
  <table width="93%" border="0" align="center" cellpadding="2" cellspacing="4">
    <tr>
      <td height="35" colspan="3" valign="top" class="heading" style="padding-top:8px; color:#7F5112;"><strong class="style3">Contact Us :</strong></td>
    </tr>
    <tr>
      <td width="34%" class="body">Name:<span class="style2">*</span></td>
      <td width="66%" colspan="2"><input name="name" type="text" id="name" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body">Address:</td>
      <td colspan="2"><input name="address" type="text" id="address" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body">City:</td>
      <td colspan="2"><input name="city" type="text" id="city" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body"> Country:</td>
      <td colspan="2"><input name="country" type="text" id="country" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body">Phone no:</td>
      <td colspan="2"><input name="phoneno" type="text" id="phoneno" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body">email Address:<span class="style2">*</span></td>
      <td colspan="2"><input name="email" type="text" id="email" style="width:250px; height:13px;" /></td>
    </tr>
    <tr>
      <td class="body">Message:<span class="style2">*</span></td>
      <td colspan="2"><textarea name="message" cols="" rows="5" id="message" style="width:250px;"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="28%"><input type="image" name="imageField22" src="images/submit.gif" /></td>
            <td width="72%"><input type="image" name="imageField3" src="images/reset.gif" /></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php }
?>
</body>
</html>
