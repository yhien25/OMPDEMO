<div class ="table-responsive">
	<!-- Table -->
	<table class="table table-bordered table-hover" id="searchable-container">
		<thead>
			<tr>
				<th colspan = "5">
					<form action = "" method = "GET">
						<div class="col-xs-8">
							<div class="input-group">
								<!--
								<div class="input-group-btn search-panel">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
										<span id="search_concept">Search by</span> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
									  <li><a href="#No">No</a></li>
									  <li><a href="#Lname">Last Name</a></li>
									  <li><a href="#Fname">First Name</a></li>
									  <li><a href="#Level">Level</a></li>
									</ul>
								</div>
								<input type="hidden" name="search_param" value="all" id="search_param">  
								-->
								<input type="hidden" name="tran" value = "<?php echo $_GET['tran']; ?>">								
								<input type="text" class="form-control" name="search" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
								</span>
							</div>
						</div>
					</form>
					<div class = "col-xs-2">
						<!-- Button trigger modal -->
						<button class = "btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >
						<span class="glyphicon glyphicon-plus"></span> Add
						</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i>Add Category</h4>
							  </div>
							  <form action = "process/category_add.php" method = "POST" enctype="multipart/form-data">
								 <div class="modal-body">
									Icon:<input type="file" name="picture">
									<input type = "hidden" name = "tran" value = "<?php echo $_GET['tran']; ?>">		
									<label for = "canno" class = "pull-left">Category</label>
									<input type = "input" name = "category" value = "" class = "form-control">
								  </div>
								  <div class="modal-footer">
									<input type = "submit" value = "Save Record" name = "Save" class = "btn btn-primary">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								  </div>
							  </form>
							</div>
						  </div>
						</div>
					</div>
					<div class = "col-xs-2">
						<a class = "btn btn-primary" href = "?tran=<?php echo $_GET['tran']; ?>">Show All</a>
					</div>
				</th>
			</tr>
			<tr>
				<th width = "10%">Icon</th>
				<th>Category</th>
				<th width ="20%">Action</th>
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
					$sql = mysql_query("SELECT * FROM tbl_categories WHERE prod_category LIKE '%$search%' ORDER BY id ASC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_categories WHERE prod_category LIKE '%$search%' ORDER BY id ASC");
				}else{
					$sql = mysql_query("SELECT * FROM tbl_categories ORDER BY id ASC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_categories ORDER BY id ASC");
				}
				$rec_count = mysql_num_rows($sql2);
				while($row = mysql_fetch_array($sql)){
			?>
				<tr>
					<td align ="center"><img src="../../images/icons/<?php echo $row['picture']; ?>" height = "30px"</td>
					<td><?php echo $row['prod_category']; ?></td>
					<td align = "center">
						<span class = "btn btn-danger btn-xs" title = "Delete Category">
							<a style ="color:white;" href = "process/category_delete.php?id=<?php echo $row['id']; ?>" class = "glyphicon glyphicon-trash" onclick= "return confirm('Are you sure you want to Permanently Delete this information?');"></a>
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
