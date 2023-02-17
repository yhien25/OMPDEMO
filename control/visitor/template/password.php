

					<?php
						$sql = mysql_query("SELECT * FROM tbl_visitor WHERE ID = '$_SESSION[ID]' ");
					
						while($row = mysql_fetch_array($sql)){
						 $fname = $row['fname'];
						 $lname = $row['lname'];
						 $number = $row['number'];
						 $email = $row['email'];
						 $id = $row['ID'];
						}
					?>
					<div class="container" id="wrap">
					 
				<?php if(isset($_GET['success'])){ ?>
				<div class="col-md-6 col-md-offset-2">
					<div class="alert alert-success" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Password Successfully Updated!</div>
				</div><?php }?>
				
				<?php if(isset($_GET['failed'])){ ?>
				<div class="col-md-6 col-md-offset-2">
					<div class="alert alert-danger" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Failed to Update Password!</div>
				</div><?php }?>
			 <div class="row">
	  
        <div class="col-md-6 col-md-offset-2">
            <form action="process/updatepassword.php?id=<?php echo $id; ?>" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Change Password</legend>
                  
                  <input type="password" name="old" class="form-control input-lg" placeholder="Old Password" style="margin-bottom:5px;" required/> 
                  <input type="password" name="new" class="form-control input-lg" placeholder="New Password" style="margin-bottom:5px;" required/> 
                  <input type="password" name="confirm" class="form-control input-lg" placeholder="Confirm Password" style="margin-bottom:5px;" required/> 
				                   
					<div class="row">
        
   
                       
                    </div>
                    
                    <br />
              
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Change Password</button>
            </form>          
          </div>
</div>            
</div>
</div>

