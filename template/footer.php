<div class="footerBottomSection">
	<div class="container-fluid pull-right" style="height:200px;">
		Online Market Philippines &copy; 2015, Allright reserved. &nbsp;&nbsp;&nbsp;<a href="index.php" style="color:white;">Home</a> | <a href="aboutus.php" style="color:white;">About</a>
	</div>
</div>
<?php
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$sql_test= mysql_query("SELECT * FROM tbl_visitor WHERE status = 'Active'");
		while($row_test = mysql_fetch_array($sql_test)){
			$id_test = $row_test['ID'];
			$diff = abs(strtotime($date.$time) - strtotime($row_test['last_active']));
			if($diff >=300){
				mysql_query("UPDATE `tbl_visitor` SET 
				`active`='No'
				WHERE ID = '$id_test'");
			}
		}
	if(isset($_SESSION['fname'])){
		include ('config/database/index.php');
		$id = $_SESSION['ID'];
		
		$sql3 = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$id'");
		if(mysql_num_rows($sql3) != 0){
			$row3 = mysql_fetch_array($sql3);

			mysql_query("UPDATE `tbl_visitor` SET 
			`last_active`='$date.$time',
			`active`='Yes'
			WHERE ID = '$id'");
		}
	}
?>