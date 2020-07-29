<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarsExample03">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url();?>vote/index">Vote <span class="sr-only">(current)</span></a>
		</li>
	<?php if($session['user_type_id']=='1'){ //Admin only?>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mange user</a>
		<div class="dropdown-menu" aria-labelledby="dropdown03">
			<a class="dropdown-item" href="<?php echo base_url();?>user/index">User</a>
			<a class="dropdown-item" href="<?php echo base_url();?>user/point">Point</a>
		</div>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
		<div class="dropdown-menu" aria-labelledby="dropdown04">
		<a class="dropdown-item" href="<?php echo base_url();?>report/transaction">Transaction</a>
		<a class="dropdown-item" href="<?php echo base_url();?>report/summary">Summary</a>
		</div>
		</li>	
		
	<?php } //Admin only?>	
		
		</ul>
	</div>
	
	<ul class="navbar-nav mr-auto">
		<li class="nav-item dropdown active">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $session['username']; ?>
		<span class="badge badge-danger badge-counter"><i class="fa fa-star"></i> <?php echo 3-count($count_point_monthly); ?></a>
		<div class="dropdown-menu" aria-labelledby="dropdown05">
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_passwordModal"><i class="fa fa-cog"></i> Change password</a>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a>
		</div>
		</li>	
	</ul>
    
    
<!-- Modal -->
</nav>
<div class="modal fade" id="change_passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change password?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
	        <p class="mb-4">Char more 6 digit</p>
	        <form class="form-signin" action="<?php echo base_url();?>login/change_password"  method="post">
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="hidden" id="username" name="username" value="<?php echo $session['username']; ?>">
			<input type="password" id="password" name="password" class="form-control" placeholder="Password" minlength='6' required>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary submit_login" type="submit">Reset Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>home/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>