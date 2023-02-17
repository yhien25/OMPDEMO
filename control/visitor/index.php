<?php
ob_start();
session_start();
if(!isset($_SESSION['ID'])){
	header("location: ../index.php?ERR");
}
include("../../config/database/index.php");
?>

<!DOCTYPE html>
<html>
	<head>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>OMP - Visitor Page</title>
		<link rel="stylesheet" href="../../assets/css/bootstrap.css">
		<link rel="stylesheet" href="../../assets/css/business-plate.css">
		<link rel="stylesheet" href="../../assets/css/style.css">
	</head>
	
	<body background="escheresque.png">
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
					<a class="navbar-brand" href="../../">
						<img src="../../assets/images/LOGO.png" height = "40px" class="logo">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
					
						<?php
						$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$_SESSION[ID]' ");
					
						while($row = mysql_fetch_array($sql)){
						 $name = $row['fname'] . " " . $row['lname'];
						}
					?>	
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" target="_blank"><b class="glyphicon glyphicon-user"></b>&nbsp;Welcome <?php echo $name;   ?></a></li>
					
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Account
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-header"><b class="glyphicon glyphicon-cog"></b>&nbsp;SETTINGS</li>
									<li class=""><a href="?tran=Password">Change Password</a></li>
								
									<li class="divider"></li>
									<li><a href="process/logout.php"><b class="glyphicon glyphicon-off"></b>&nbsp;Logout</a></li>
								</ul>
							</li>
						</ul>
				</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
	</nav>  	
	<div class="container-fluid main-container">
			<div class="col-md-2 sidebar">
			<div class="row">
				<!-- uncomment code for absolute positioning tweek see top comment in css -->
				<div class="absolute-wrapper"> </div>
				<!-- Menu -->
					<div class="side-menu">
						<nav class="navbar navbar-default" role="navigation">
					<!-- Main Menu -->
					<div class="side-menu-container">
						<ul class="nav navbar-default">
							<li><a href="?tran=product"><span class="glyphicon glyphicon-tags"></span> Posted Product</a></li>
							<li><a href="?tran=Account"><span class="glyphicon glyphicon-user"></span> Account</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>

			</div>
		</div>  		
	</div>
	<?php 
		if(isset($_GET['tran'])){
	?>
	<div class="col-md-10 content">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>
					<?php echo $_GET['tran']; ?>
				</b>
			</div>
			<div class="panel-body">
				<?php
					if($_GET['tran']=='Category'){
						include ('template/category.php');
					}else if($_GET['tran']=='product'){
						include ('template/product.php');
					}else if($_GET['tran']=='Admin'){
						include ('template/admin.php');
					}else if($_GET['tran']=='Account'){
						include ('template/account.php');
					}
					else if($_GET['tran']=='Password'){
						include ('template/password.php');
					}
				?>
			</div>
		</div>
	</div>
	<?php
		}
	?>
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
	<script type='text/javascript' src='../../assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='../../assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../../assets/js/jquery.easing.1.3.js'></script> 
    <script src="../../assets/js/bootstrap.min.js"></script> 

</html>