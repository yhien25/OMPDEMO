<?php
ob_start();
session_start();
if(!isset($_SESSION['ID'])){
	header("location: ../index.php?ERR");
}
include("../../../config/database/index.php");
?>

<!DOCTYPE html>
<html>
	<head>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>OMP - Admin Page</title>
		<link rel="stylesheet" href="../../../assets/css/bootstrap.css">
		<link rel="stylesheet" href="../../../assets/css/business-plate.css">
		<link rel="stylesheet" href="../../../assets/css/style.css">
	</head>
	
	<body>
		<nav class="navbar navbar-custom navbar-static-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
						MENU
					</button>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img src="../../assets/images/LOGO.gif" height = "40px" class="logo">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
					
						<?php
						$sql = mysql_query("SELECT * FROM tbl_user WHERE ID = '$_SESSION[ID]' ");
					
						while($row = mysql_fetch_array($sql)){
						 $name = $row['name'];
						}
					?>	
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" target="_blank"><b class="glyphicon glyphicon-user"></b>&nbsp;Welcome Admin (<?php echo $name;   ?>)</a></li>
					
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Account
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-header"><b class="glyphicon glyphicon-cog"></b>&nbsp;SETTINGS</li>
									<li class=""><a href="#">Change Password</a></li>
									<li class=""><a href="#">Add Account</a></li>
								
									<li class="divider"></li>
									<li><a href="process/logout.php"><b class="glyphicon glyphicon-off"></b>&nbsp;Logout</a></li>
								</ul>
							</li>
						</ul>
				</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
	</nav>  	

	
	<div class="container">
<div class="row">
<div class="col-sm-12">
<h1>Change Password</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
<form method="post" id="passwordForm">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
<div class="row">
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
</div>
</div>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>

<script>
$("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("glyphicon-remove");
		$("#ucase").addClass("glyphicon-ok");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("glyphicon-remove");
		$("#ucase").css("color","#FF0004");
	}
	
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("glyphicon-remove");
		$("#lcase").addClass("glyphicon-ok");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("glyphicon-ok");
		$("#lcase").addClass("glyphicon-remove");
		$("#lcase").css("color","#FF0004");
	}
	
	if(num.test($("#password1").val())){
		$("#num").removeClass("glyphicon-remove");
		$("#num").addClass("glyphicon-ok");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("glyphicon-ok");
		$("#num").addClass("glyphicon-remove");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("glyphicon-remove");
		$("#pwmatch").addClass("glyphicon-ok");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("glyphicon-ok");
		$("#pwmatch").addClass("glyphicon-remove");
		$("#pwmatch").css("color","#FF0004");
	}
});
</script>

	<footer class="pull-left footer">
		<div class="container">
			<p class="col-md-12">
				<hr class="divider">
					Copyright &COPY; 2015 <a href="#">Online Market Philippines </a>
			</p>
		</div>
	</footer>
  	</div>

	</body>
	<script type='text/javascript' src='../../../assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='../../../assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../../../assets/js/jquery.easing.1.3.js'></script> 
    <script src="../../../assets/js/bootstrap.min.js"></script> 

</html>

