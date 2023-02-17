<?php
	$conn = mysql_connect("localhost","onlinem2","U55t7wzsA3") or die("Connection Error: " . mysql_error());
	mysql_select_db('onlinem2_DB',$conn) or die("Database Error: " . mysql_error());
?>