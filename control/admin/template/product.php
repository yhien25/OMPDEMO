<div class ="table-responsive">
	<!-- Table -->
	<table class="table table-bordered table-hover" id="searchable-container">
		<thead>
			<tr>
				<th colspan = "8">
					<form action = "" method = "GET">
						<div class="col-xs-10">
							<div class="input-group">
								<div class="input-group-btn search-panel">
									<select class = " btn btn-primary dropdown-toggle" name = "search_param">
										<option value = "">Select</option>
										<option disabled></option>
										<option value  = "prod_name">Product Name</option>
										<option value = "category">Category</option>
										<option value = "condition">Condition</option>
										<option value = "muni_city">Municipality/City</option>
										<option value = "province">Province</option>
										<option value = "status">Status</option>
									</select>
								</div>
								<input type="hidden" name="tran" value = "<?php echo $_GET['tran']; ?>">								
								<input type="text" class="form-control" name="search" placeholder="Search...">
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
				$rec_limit = 9;
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
					$sql = mysql_query("SELECT * FROM tbl_products WHERE $field LIKE '%$search%' ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_products WHERE $field LIKE '%$search%' ORDER BY date_posted DESC");
				}else{
					$sql = mysql_query("SELECT * FROM tbl_products ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_products ORDER BY date_posted DESC");
				}
				$rec_count = mysql_num_rows($sql2);
				
				while($row = mysql_fetch_array($sql)){
			?>
				<tr>
					<td>
						<a title = "See full Detail" href ="" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" ><?php echo $row['prod_name']; ?></a>
						 
						<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i>Product Information</h4>
							  </div>
							  <form action = "" method = "POST">
								 <div class="modal-body">
									<div class = "row">
									<div class ="col-md-12">
										<span class = "btn btn-success" title ="Approve Post">
											<a style ="color:white;" href = "process/product_approve.php?id=<?php echo $row['id']; ?>" onclick= "return confirm('Are you sure you want to approved this product?');">
												<span class = "glyphicon glyphicon-ok"></span> Approve Post
											</a>
										</span>
										<span class = "btn btn-info" title ="Decline Post">
											<a style ="color:white;" href = "process/product_decline.php?id=<?php echo $row['id']; ?>" onclick= "return confirm('Are you sure you want to decline this product?');">
												<span class = "glyphicon glyphicon-alert"></span> Decline Post
											</a>
										</span>
										<span class = "btn btn-danger" title ="Delete Post">
											<a style ="color:white;"  href = "process/product_delete.php?id=<?php echo $row['id']; ?>" onclick= "return confirm('Are you sure you want to Permanently Delete this information?');">
												<span class = "glyphicon glyphicon-trash"></span> Delete Post
											</a>
										</span>
									</div>
									<br><br>
									<div class = "cold-md-12">
										<div class = "col-md-12">
										<h3><a><?php echo $row['prod_name']; ?></a></h3>
										</div>
										<div class = "col-md-12">
											<?php if(!empty($row['picture1'])){	?>
											<img src ="	../../images/products/<?php echo $row['picture1']; ?>" width ="100px" height ="100px">
											<?php } if(!empty($row['picture2'])){ ?>
											<img src ="	../../images/products/<?php echo $row['picture2']; ?>" width ="100px" height ="100px">
											<?php } if(!empty($row['picture3'])){ ?>
											<img src ="	../../images/products/<?php echo $row['picture3']; ?>" width ="100px" height ="100px">
											<?php } if(!empty($row['picture4'])){ ?>
											<img src ="	../../images/products/<?php echo $row['picture4']; ?>" width ="100px" height ="100px">
											<?php }	if(!empty($row['picture5'])){ ?>
											<img src ="	../../images/products/<?php echo $row['picture5']; ?>" width ="100px" height ="100px">
											<?php } ?>
										</div>
						
										<div class = "col-md-12" style ="margin-top:10px;">
											<div class ="well row" style = "color:#000;">
											<div class = "col-md-6">
												<b>Price: </b><?php echo "Php " . number_format($row['price'],2,'.',','); ?><br>
												<b>Date Posted: </b><?php echo $row['date_posted']; ?><br>
												
											</div>
											<div class = "col-md-6">
												<b>Condition: </b><?php echo $row['condition']; ?><br>
												<b>Location: </b><?php echo $row['muni_city'] . ", " . $row['province'] ; ?><br>
											</div>
											<div class = "col-md-6" style ="margin-top:10px;">
												<b>Seller: </b><?php echo $row['seller']; ?><br>
												<b>Category	: </b><?php echo $row['prod_category']; ?><br>
											</div>
											<div class = "col-md-6" style ="margin-top:10px;">
												<b>Contact No: </b><?php echo $row['contact_number']; ?><br>
												<b>Email: </b><?php echo $row['email']; ?><br>
											</div>
											</div>
											<div class = "col-md-12" style ="margin-top:10px;">
												<b>Description: </b>
												<pre>
												<?php echo $row['decription']; ?>
												</pre>
											</div>
										</div>
									</div>
									</div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>	
								  </div>
							  </form>
							</div>
						  </div>
						</div>
					</td>
					<td><img src ="	../../images/products/<?php echo $row['picture1']; ?>" width ="100px"></td>
					<td><?php echo $row['prod_category']; ?></td>
					<td><?php echo number_format($row['price'],2,'.',','); ?></td>
					<td><?php echo $row['condition']; ?></td>
					<td><?php echo $row['seller']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td align = "center">
						<span class = "btn btn-success btn-xs" title ="Approve Post">
							<a style ="color:white;" href = "process/product_approve.php?id=<?php echo $row['id']; ?>" class = "glyphicon glyphicon-ok" onclick= "return confirm('Are you sure you want to approved this product?');"></a>
						</span>
						<span class = "btn btn-info btn-xs" title ="Decline Post">
							<a style ="color:white;" href = "process/product_decline.php?id=<?php echo $row['id']; ?>" class = "glyphicon glyphicon-alert" onclick= "return confirm('Are you sure you want to decline this product?');"></a>
						</span>
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
