<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/business-plate.css">
	<link rel="stylesheet" href="../assets/css/style.css">

	
	</head>
	
<body background="escheresque.png">
	<nav class="navbar navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="background-color:#F15A24;">
           Menu
          </button>
          <a class="navbar-brand" href="../index.php"><img src="../assets/images/LOGO.png" height = "60px" width="150px" class="logo"></a>&nbsp;<div class="company-label navbar-brand" style="">Online Market Philippines</div>
        </div>
       
      </div>
    </nav>
		
<div class="container" >
    <div class="row">
		<div class="col-md-4 ">
		</div>
        <div class="col-md-4  well">
            <legend><a href=""><i class="glyphicon glyphicon-lock"></i></a> Administrator | Login </legend>
           
		   <div class="row">
				<div class="col-md-12">
					<?php if(isset($_GET['ERR'])){?>
						<p style="text-align:center;color:red;"><b class="glyphicon glyphicon-remove-sign"></b>&nbsp;Access Denied.</p>
					<?php }else{ ?>
					<p style="text-align:center;color:maroon;"><b class="glyphicon glyphicon-info-sign"></b>&nbsp;Use a valid username and password to gain access to the administrator backend.</p>
					<?php }?>
				</div>
            </div>
			
			<form action="process/authenticate.php" method="post" class="form" role="form">
			
            <input class="form-control" style="margin-bottom: 10px;" name="username" placeholder="Username" type="name" required autofocus />
			<input class="form-control" style="margin-bottom: 10px;" name="password" placeholder="Password" type="password" required />
         
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
               <b class="glyphicon glyphicon-ok"></b>&nbsp;Log in </button>
            </form>
		
        </div>
    </div>
</div>
<br>

<?php include 'footer.php'; ?>
		
	</body>
	

	<script type='text/javascript' src='../assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='../assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../assets/js/jquery.easing.1.3.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 

</html>