

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
					<div class="alert alert-success" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Account Successfully Updated!</div>
				</div><?php }?>
				
				<?php if(isset($_GET['failed'])){ ?>
				<div class="col-md-6 col-md-offset-2">
					<div class="alert alert-danger" role="alert"><b class="glyphicon glyphicon-ok"></b>&nbsp;Failed to Update Account!</div>
				</div><?php }?>
			 <div class="row">
	  
        <div class="col-md-6 col-md-offset-2">
            <form action="process/updateinfo.php?id=<?php echo $id; ?>" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Update Account</legend>
                   <input type="text" name="email" value="<?php echo $email; ?>"readonly class="form-control input-lg" placeholder="Your Email" style="margin-bottom:5px;" />
                   <input type="number" name="number" value="<?php echo $number; ?>" class="form-control input-lg" placeholder="Your Contact No." style="margin-bottom:5px;" required/>
					
                    <div class="row">
                        <div class="col-xs-6 col-md-6" style="margin-bottom:5px;">
                            <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control input-lg"  placeholder="First Name"  required/>                        </div>
                        <div class="col-xs-6 col-md-6" style="margin-bottom:5px;">
                            <input type="text" name="lname" value="<?php echo $lname; ?>"class="form-control input-lg" placeholder="Last Name"  required/>                        </div>
                    </div>
                  <input type="password" name="confirm_password" class="form-control input-lg" placeholder="Confirm Password" style="margin-bottom:5px;" required/> 
				                   
					<div class="row">
        
   
                       
                    </div>
                    
                    <br />
              
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Save Account</button>
            </form>          
          </div>
</div>            
</div>
</div>

