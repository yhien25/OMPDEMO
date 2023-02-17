<div class ="table-responsive">
	<!-- Table -->
	<table class="table table-bordered table-hover" id="searchable-container">
		<thead>
			<tr>
				<th colspan = "8">
					<form action = "" method = "GET">
						<div class="col-xs-10">
							<div class="input-group">
								<input type="hidden" name="tran" value = "<?php echo $_GET['tran']; ?>">
								<div class="input-group-btn search-panel">
									<select class = " btn btn-primary dropdown-toggle" name = "search_param">
										
						
										<option value  = "prod_name" <?php if(isset($_GET['search_param'])){} ?>>Product Name</option>
									
									</select>
								</div>							
								<input type="text" class="form-control search" name="search" placeholder="Search...">
								<div class="input-group-btn search-panel">
									<select class ="btn btn-default dropdown-toggle" name = "condition">
										<option value = "" Selected>Condition</option>
										<option disabled></option>
										<option value  = "Brand New">Brand New</option>
										<option value = "2nd Hand (Used)">2nd Hand (Used)</option>
									</select>
								</div>	
								<div class="input-group-btn search-panel">
									<select class ="btn btn-default dropdown-toggle" name = "status">
										<option value = "" Selected>Status</option>
										<option disabled></option>
										<option value  = "Approved">Approved</option>
										<option value  = "Decline">Decline</option>
										<option value  = "Pending">Pending</option>
									</select>
								</div>	
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
								</span>
							</div>
						</div>
					</form>	
					<div class = "col-xs-2">
						<a class = "btn btn-primary" href = "?tran=<?php echo $_GET['tran']; ?>">Show All</a>
					</div>
				</th>
			</tr>
			<tr>
				<th>Product Name</th>
				<th>Picture</th>
				<th>Category</th>
				<th>Price</th>
				<th>Condition</th>
				<th>Seller</th>
				<th>Status</th>
				<th width ="15%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$rec_limit = 15;
				if (isset($_GET{'page'})) { //get the current page
					$page = $_GET{'page'};
					$offset = $rec_limit * $page;
				} else {
					// show first set of results
					$page = 0;
					$offset = 0;
				}
						
				if(isset($_GET['search'])){
					$search = $_GET['search'];
					$field = $_GET['search_param'];
					$condition = $_GET['condition'];
					$status = $_GET['status'];
					$sql = mysql_query("SELECT * FROM tbl_products WHERE $field LIKE '%$search%' AND `condition` LIKE '%$condition%' AND status LIKE '%$status%' AND seller = '$name' ORDER BY date_posted DESC LIMIT $offset, $rec_limit") or die(mysql_error());
					$sql2 = mysql_query("SELECT * FROM tbl_products WHERE $field LIKE '%$search%' AND `condition` LIKE '%$condition%' AND status LIKE '%$status%' AND seller = '$name' ORDER BY date_posted DESC") or die(mysql_error());
				}else{
					$sql = mysql_query("SELECT * FROM tbl_products WHERE seller = '$name' ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_products WHERE seller = '$name' ORDER BY date_posted DESC");
				}
				$rec_count = mysql_num_rows($sql2);
				
				while($row = mysql_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $row['prod_name']; ?></td>
					<td><img src ="	../../images/products/<?php echo $row['picture1']; ?>" width ="100px"></td>
					<td><?php echo $row['prod_category']; ?></td>
					<td><?php echo number_format($row['price'],2,'.',','); ?></td>
					<td><?php echo $row['condition']; ?></td>
					<td><?php echo $row['seller']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td align = "center">
						<!-- Button trigger modal -->
						<button class = "btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" title ="Edit Post">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style ="text-align:left;">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i>Edit Post</h4>
							  </div>
							  <form action = "process/product_edit.php" method = "POST" enctype="multipart/form-data">
								 <div class="modal-body">
									<input type = "hidden" name = "tran" value = "<?php echo $_GET['tran']; ?>">
									<input type = "hidden" name = "id" value = "<?php echo$row['id']; ?>">										
									<div class = "row">
									<div class ="col-md-4">
										Picture 1:<input type="file" name="picture1">
										<img src = "../../images/products/<?php echo $row['picture1']; ?>" height = "150px">
										<input type = "hidden" name = "file_picture1" value = "<?php echo $row['picture1']; ?>">	
									</div>
									<div class ="col-md-4">
										Picture 2:<input type="file" name="picture2">
										<img src = "../../images/products/<?php echo $row['picture2']; ?>" height = "150px">
										<input type = "hidden" name = "file_picture2" value = "<?php echo $row['picture2']; ?>">	
									</div>
									<div class ="col-md-4">
										Picture 3:<input type="file" name="picture3">
										<img src = "../../images/products/<?php echo $row['picture3']; ?>" height = "150px">
										<input type = "hidden" name = "file_picture3" value = "<?php echo $row['picture3']; ?>">	
									</div>
									<div class ="col-md-4">
										Picture 4:<input type="file" name="picture4">
										<img src = "../../images/products/<?php echo $row['picture4']; ?>" height = "150px">
										<input type = "hidden" name = "file_picture4" value = "<?php echo $row['picture4']; ?>">	
									</div>
									<div class ="col-md-4">
										Picture 5:<input type="file" name="picture5">
										<img src = "../../images/products/<?php echo $row['picture5']; ?>" height = "150px">
										<input type = "hidden" name = "file_picture5" value = "<?php echo $row['picture5']; ?>">	
									</div>
									</div>
									<label for = "canno" class = "pull-left">Product Name</label>
									<input type = "input" name = "prod_name" value = "<?php echo $row['prod_name']; ?>" class = "form-control">
									<div class = "row">
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">Price</label>
											<input type = "input" name = "price" value = "<?php echo $row['price']; ?>" class = "form-control">
										</div>
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">Condition</label>
											<select name = "condition" class = "form-control">
												<option <?php if($row['condition']=='Brand New'){ echo 'Selected';} ?>>Brand New</option>
												<option <?php if($row['condition']=='2nd Hand (Used)'){ echo 'Selected';} ?>>2nd Hand (Used)</option>
											</select>
										</div>
									</div>
									<div class = "row">
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">province</label>
											<select name = "province" class = "form-control" onclick = "prov2()" id = "provi2">
												<option value  = "<?php echo $row['province']; ?>" selected><?php echo $row['province']; ?></option>
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
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">Municipality/City</label>
											<select class ="form-control" name = "muni_city" id = "muni_city" required>
												<option value  = "<?php echo $row['muni_city']; ?>" selected><?php echo $row['muni_city']; ?></option>
												<option disabled></option>
												<option value = "">Anywhere</option>
											</select>
										</div>
									</div>
									<div class = "row">
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">Category</label>
											<select name = "prod_category" class = "form-control">
												<?php
													$sql2 = mysql_query("SELECT * FROM tbl_categories ");
													while($row2 = mysql_fetch_array($sql2)){
												?>
												<option <?php if($row['prod_category']==$row2['prod_category']){ echo 'Selected';} ?>><?php echo $row2['prod_category']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class  ="col-md-6">
											<label for = "canno" class = "pull-left">Status</label>
											<input type = "input" name = "price" value = "<?php echo $row['status']; ?>" class = "form-control" disabled>
										</div>
									</div>
									<label for = "canno" class = "pull-left">Description</label>
									<textarea class ="form-control" name = "decription" style ="height:250px;"><?php echo $row['decription']; ?></textarea>
								  </div>
								  <div class="modal-footer">
									<input type = "submit" value = "Save Record" name = "Save" class = "btn btn-primary">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								  </div>
							  </form>
							</div>
						  </div>
						</div>
						
						<span class = "btn btn-danger btn-xs" title ="Delete Post">
							<a style ="color:white;" href = "process/product_delete.php?id=<?php echo $row['id']; ?>" class = "glyphicon glyphicon-trash" onclick= "return confirm('Are you sure you want to Permanently Delete this information?');"></a>
						</span>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>	
	<span class = "pull-left">
		<?php
			if(($rec_count % $rec_limit) != 0){
				$total_page = floor($rec_count / $rec_limit) + 1;
			}else{
				$total_page = floor($rec_count / $rec_limit);
			}
		?>
		<h3>Page <?php echo $page + 1; ?> of <?php echo ($total_page); ?></h3>
	</span>
	<ul class="pager pull-right">
		<li>
			<?php
				$tran = $_GET['tran'];
				if($page > 0){
					$last = $page - 1;
			?>
				<a href="?tran=<?php echo $_GET['tran']; ?>&page=<?php echo $last; ?>" aria-label="Previous">
					 <span class = "glyphicon glyphicon-chevron-left"></span> Prev 
				</a>
			<?php
				}
			?>
			
		</li>
		<li>
			<?php
				if (($rec_count / $rec_limit) > $page+1) {
					$next = $page + 1;
			?>
				<a href="?tran=<?php echo $_GET['tran']; ?>&page=<?php echo $next; ?>" aria-label="Next">
					Next <span class = "glyphicon glyphicon-chevron-right"></span>
				</a>
			<?php
				}
			?>
			
		</li>
	</ul>
	</div>
</div>
<script>
	function prov2(){	
	var e = document.getElementById("provi2");
	var provi2 = e.options[e.selectedIndex].value;
	if(provi2 == 'Anywhere'){
		var opt_muni =[
			"Anywhere",
			""
		];
	}
	else if(provi2 == 'Abra'){
		var opt_muni =[
			"Bangued",
			"Boliney",
			"Bucay",
			"Bucloc",
			"Daguioman",
			"Danglas",
			"Dolores",
			"La Paz",
			"Lacub",
			"Lagangilang",
			"Lagayan",
			"Langiden",
			"Licuan-Baay"
		];
	}else if(provi2 == 'Aurora'){
		var opt_muni =[
			"Baler",
			"Casiguran",
			"Dilasag",
			"Dinalungan",
			"Dingalan",
			"Dipaculao",
			"Maria Aurora",
			"San Luis"
		];
	}else if(provi2 == 'Albay'){
		var opt_muni =[
			"Bacacay",
			"Camalig",
			"Daraga",
			"Guinobatan",
			"Jovellar",
			"Legazpi City",
			"Libon",
			"Ligao City",
			"Malilipot",
			"Malinao",
			"Manito",
			"Oas",
			"Pio Duran",
			"Polangui",
			"Rapu-Rapu",
		];
	}
	document.getElementById('muni_city').options.length = 0;
	var y = document.getElementById('muni_city');
	var opt = document.createElement("option");
	opt.text = "";
		
	y.add(opt);
	for(x=1;x<=opt_muni.length;x++){
		var y = document.getElementById('muni_city');
		var opt = document.createElement("option");
		opt.text = opt_muni[x-1];
		
		y.add(opt);
	}
}
</script>