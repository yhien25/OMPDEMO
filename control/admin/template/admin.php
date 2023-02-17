<div class ="table-responsive">
	<!-- Table -->
	<?php if(isset($_GET['success'])){
	?>

		<div class="alert alert-success" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Account Successfully Created!</div>
	<?php	
	} ?>
	<?php if(isset($_GET['failed'])){
	?>

		<div class="alert alert-danger" role="alert"><b class="glyphicon glyphicon-remove"></b>&nbsp;Failed to create account password not matched!</div>
	<?php	
	} ?>
	<?php if(isset($_GET['del'])){
	?>

		<div class="alert alert-success" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Account Deleted!</div>
	<?php	
	} ?>
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
								<h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i>Add Admin Account</h4>
							  </div>
							  <form action = "process/add_admin.php" method = "POST" id="identicalForm" class="form-horizontal">
								 <div class="modal-body">
									<input type = "hidden" name = "tran" value = "<?php echo $_GET['tran']; ?>" required autofocus>		
									<label for = "name" class = "pull-left">Name</label>
									<input type = "input" name = "name" value = "" class = "form-control" required>
									<label for = "canno" class = "pull-left">Username</label>
									<input type = "input" name = "username" value = "" class = "form-control" required>
									<label for = "canno" class = "pull-left">Password</label>
									<input type = "password" name = "password" id="inputPassword" data-minlength="6" value = "" class = "form-control" required>
									<label for = "canno" class = "pull-left">Re-Type</label>
									<input type = "password" name = "repass" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" value = "" class = "form-control" required>
									<div class="help-block with-errors"></div>
								 </div>
								  <div class="modal-footer">
									<input type = "submit" value = "Save Record" name = "Save" class = "btn btn-primary">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								  </div>
							  </form>
							<script>
							$(document).ready(function() {
								$('#identicalForm').formValidation();
							});
							</script>
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
				<th>Name</th>
				<th>Username</th>
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
					$sql = mysql_query("SELECT * FROM tbl_user WHERE ID != $_SESSION[ID] and type='Administrator' ORDER BY id ASC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_user WHERE ID != $_SESSION[ID] and type='Administrator' ORDER BY id ASC");
				}else{
					$sql = mysql_query("SELECT * FROM tbl_user WHERE ID != $_SESSION[ID] and type='Administrator' ORDER BY id ASC LIMIT $offset, $rec_limit");
					$sql2 = mysql_query("SELECT * FROM tbl_user WHERE ID != $_SESSION[ID] and type='Administrator' ORDER BY id ASC");
				}
				$rec_count = mysql_num_rows($sql2);
				while($row = mysql_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td align = "center">
						<span class = "btn btn-danger btn-xs" title = "Delete Account">
							
							<a style ="color:white;" href = "process/account_delete.php?id=<?php echo $row['ID']; ?>" class = "glyphicon glyphicon-trash" onclick= "return confirm('Are you sure you want to Permanently Delete this information?');"></a>
						</span>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>	
	<ul class="pager pull-right">
		<li>
			<?php
				$tran = $_GET['tran'];
				if($page > 0){
					$last = $page - 1;
			?>
				<a href="?tran=<?php echo $_GET['tran']; ?>&page=<?php echo $last; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo; Prev</span>
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
					<span aria-hidden="true">Next &raquo;</span>
				</a>
			<?php
				}
			?>
			
		</li>
	</ul>
</div>
