<?php session_start(); ?>
	<script src = "assets/js/place.js"></script>
	<div class="top">
		<div class="container">
			<div class="row-fluid">
				<ul class="loginbar">
					<?php if(!isset($_SESSION['fname'])){ ?>
					
					<li><b class="glyphicon glyphicon-user" style="color:#1f1f1f;"></b>&nbsp;<a href="account.php" class="login-btn" style="color:#1f1f1f;">My Account</a></li>
					<?php }else{ 
						$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$_SESSION[ID]' ");
						while($row = mysql_fetch_array($sql)){
						 $name = $row['fname'] . " " . $row['lname'];
						 $email = $row['email'];
						 $contact_no = $row['number'];
						}
					?>
					<li>
						<b class="glyphicon glyphicon-user" style="color:#1f1f1f;"></b>&nbsp;
						<a href="control/visitor/" class="login-btn" style="color:#1f1f1f;">
							Welcome <?php echo $_SESSION['fname']; ?>
						</a>
					</li>
					<?php }?>
	
					<li class="devider" >&nbsp;</li>
					<li><b class="glyphicon glyphicon-list-alt" style="color:#1f1f1f;"></b>&nbsp;<a href="register.php" style="color:#1f1f1f;">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
		
	<style>
text {
     color: white;
    text-shadow: 2px 1px 3px black, 0 0 25px black, 0 0 5px black;
}
</style>	
	<nav class="navbar navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="background-color:#F15A24;">
           Menu
          </button>
          <a class="navbar-brand" href="index.php"><img src="assets/images/LOGO.png" height = "60px" width="150px" class="logo"> </a>&nbsp;<div class="company-label navbar-brand" style=""><text>Online Market Philippines</text></div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="sell.php"> <text><span class="badge">P</span>&nbsp; Sell Item</text></a></li>
           
          </ul>
          <form method = "GET" action = "product.php" class="navbar-form navbar-right">
			<div class="input-group">			
				<input type = "hidden" name ="category" value ="Any">
				<input type="text" class="form-control search" name="search" placeholder="Search...">
				<div class="input-group-btn search-panel">
					<select class ="form-control" name = "province" onclick = "prov()" id = "provi">
						<option value = "">Anywhere</option>
						<option disabled></option>
						<option value  = "Abra">Abra</option>
						<option value  = "Aurora">Aurora</option>
						<option value  = "Albay">Albay</option>
						<option value  = "Apayao">Apayao</option>
						<option value  = "Antique">Antique</option>
						<option value = "Bataan">Bataan</option>
						<option value  = "Batanes">Batanes</option>
						<option value  = "Batangas">Batangas</option>
						<option value  = "Benguet">Benguet</option>
						<option value  = "Biliran">Biliran</option>
						<option value  = "Bohol">Bohol</option>
						<option value  = "Bulacan">Bulacan</option>
						<option value  = "Bukidnon">Bukidnon</option>
						<option value  = "Cagayan">Cagayan</option>
						<option value = "Cavite">Cavite</option>
						<option value  = "Catanduanes">Catanduanes</option>
						<option value  = "Camiguin">Camiguin</option>
						<option value  = "Camarines Sur">Camarines Sur</option>
						<option value  = "Capiz">Capiz</option>
						<option value  = "Cebu">Cebu</option>
						<option value  = "Davao del Sur">Davao del Sur</option>
						<option value  = "Davao del Norte">Davao del Norte</option>
						<option value  = "Guimaras">Guimaras</option>
						<option value  = "Isabela">Isabela</option>
						<option value  = "Iloilo">Iloilo</option>
						<option value  = "Ilocos Norte">Ilocos Norte</option>
						<option value  = "Ilocos Sur">Ilocos Sur</option>
						<option value  = "Kalinga">Kalinga</option>
						<option value  = "Laguna">Laguna</option>
						<option value  = "La Union">La Union</option>
						<option value  = "Lanao del Norte">Lanao del Norte</option>
						<option value  = "Leyte">Leyte</option>
						<option value  = "Marinduque">Marinduque</option>
						<option value = "Metro Manila">Metro Manila</option>
						<option value  = "Misamis Oriental">Misamis Oriental</option>
						<option value  = "Misamis Occidental">Misamis Occidental</option>
						<option value  = "Nueva Vizcaya">Nueva Vizcaya</option>
						<option value  = "Negros Occidental">Negros Occidental</option>
						<option value  = "Nueva Ecija">Nueva Ecija</option>
						<option value  = "North Cotabato">North Cotabato</option>
						<option value  = "Occidental Mindoro">Occidental Mindoro</option>
						<option value  = "Pampanga">Pampanga</option>
						<option value  = "Pangasinan">Pangasinan</option>
						<option value  = "Palawan">Palawan</option>
						<option value  = "Quirino">Quirino</option>
						<option value  = "Quezon">Quezon</option>
						<option value = "Rizal">Rizal</option>
						<option value = "Surigao del Norte">Surigao del Norte</option>
						<option value  = "Sorsogon">Sorsogon</option>
						<option value  = "Southern Leyte">Southern Leyte</option>
						<option value  = "South Cotabato">South Cotabato</option>
						<option value  = "Tarlac">Tarlac</option>
						<option value  = "Zambales">Zambales</option>
					</select>
				</div>
				<div class="input-group-btn search-panel">
					<select class ="form-control" name = "muni_city" id = "muni_city">
						<option value = "">Anywhere</option>

					</select>
				</div>
				<input type = "text" placeholder ="Estimated Price" class = "form-control" name ="e_price">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
				</span>
			</div>
            
          </form>
        </div>
      </div>
    </nav>