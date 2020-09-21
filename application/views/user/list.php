<script type="text/javascript" src="<?php echo base_url(); ?>js/user.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/sort_table.js"></script>
<!-- Begin Page Content -->
<div class="container">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">User</h1>
</div>
<div class="align-items-center justify-content-between mb-4">
<a href="#" class="btn btn-sm btn-primary" id="add_user">
<i class="fa fa-arrow-circle-down text-white-50"></i> Add user</a>
</div>
<!-- Content Row -->
<div id="from_add_user" class="card o-hidden border-0 shadow-lg my-4 jumbotron"> 
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an User!</h1>
                <?php if($status) {?>
			       <div class="alert alert-danger alert-dismissible">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			        Username duplicate
			      </div>
			       <?php } ?>
              </div>
              <form class="user" method="post" action="<?php echo base_url();?>user/add_user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="firstname" id="firstname" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="lastname" id="lastname" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group row">
	                <div class="col-sm-6 mb-sm-0">
                     	<input type="text" class="form-control form-control-user" name="nickname" id="nickname" placeholder="Nick Name">
                    </div>
	                  <div class="col-sm-6">
		                  <lable><span class="text-muted">@netpoleons.com</span></lable>
		                  <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Email Address"> 
	                  </div>
	                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input value="netpoleon#1" type="text" class="form-control form-control-user" placeholder="Password" disabled>
                    <input value="netpoleon#1" type="hidden"  name="password"  id="password">
                  </div>
                  <div class="col-sm-6 p-2">
                    <select class="form-control"  placeholder="User type" name="user_type_id"  id="user_type_id">
	                  <option value="0" selected disabled>User Type</option>
	                  <option value="2">Employee</option>
	                  <option value="1">Admin</option>
	                </select>
                  </div>
                  
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block submit_create_user">Add</button>
              </form>
             
            </div>
          </div>
        </div>
      </div>
</div>
<!-- Content Row -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th width="20%">
	            <em>Name</em>
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='1' data-order='asc' data-table='userTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='1' data-order='desc' data-table='userTable'></i>
			</th>
            <th>
	            <em>Nick name</em>
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='2' data-order='asc' data-table='userTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='2' data-order='desc' data-table='userTable'></i>
			</th>
            <th>
	            <em>Username</em>
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='3' data-order='asc' data-table='userTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='3' data-order='desc' data-table='userTable'></i>
			</th>
			<th width="20%">Picture</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach($result as $value){ $i++;?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value->firstname."-".$value->lastname;?></td>
            <td><?php echo $value->nickname;?></td>
			<td><?php echo $value->username;?></td>
			<td>
				<img style="width:30%;" src="<?php echo ($value->path_img_profile=="")?base_url()."picture_profile/img_empty.png":base_url().$value->path_img_profile;?>">    
			</td>
            <td>
	            <button type="button" class="btn btn-warning" class="UpdateUserModal" data-id="<?php echo $value->id;?>" data-toggle="modal" data-target="#UpdateUserModal<?php echo $value->id;?>" data-toggle="tooltip" title="Cilck update user"><i class="fa fa-pencil"></i>
				</button>  
				<div class="modal fade" id="UpdateUserModal<?php echo $value->id;?>"  role="dialog" aria-labelledby="" aria-hidden="true" >
					<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="">Update user</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
						</div>
						<div class="modal-body">
							<form class="user" method="post" action="<?php echo base_url();?>user/update_user" enctype="multipart/form-data">
								<input type="hidden" name="id" id="id" value="<?php echo $value->id ;?>">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<span class="text-muted">First Name</span>
										<input type="text" class="form-control form-control-user" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $value->firstname ;?>">
									</div>
									<div class="col-sm-6">
										<span class="text-muted">Last Name</span>
										<input type="text" class="form-control form-control-user" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $value->lastname ;?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-sm-0">
										<span class="text-muted">Nick Name</span>
										<input type="text" class="form-control form-control-user" name="nickname" id="nickname" placeholder="Nick Name" value="<?php echo $value->nickname ;?>">
									</div>
									<div class="col-sm-6">
										<span class="text-muted">User type</span>
										<select class="form-control"  placeholder="User type" name="user_type_id"  id="user_type_id" value="<?php echo $value->user_type_id ;?>">
										<option value="<?php echo $value->user_type_id ;?>" selected><?php echo ($value->user_type_id == '1')?"Admin": "Employee";?></option>
										<?php if($value->user_type_id == '2') {?>
										<option value="2">Employee</option>
										<?php }else{?>
										<option value="1">Admin</option>
										<?php }?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
								<img style="display: block;margin-left: auto;margin-right: auto;width: 30%;" src="<?php echo ($value->path_img_profile=="")?  base_url()."picture_profile/img_empty.png":base_url().$value->path_img_profile;?>" style="border-radius: 30%;width:50px;">
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="hidden" name="path_img_profile" id="path_img_profile" value="<?php echo $value->path_img_profile ;?>">
	</div></div>
							
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-warning">Update</button>
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
					</div>
				</div>
				</div>
				<!--Delete-->
	             <button type="button" class="btn btn-danger" class="DeleteUserModal" data-id="<?php echo $value->id;?>" data-toggle="modal" data-target="#DeleteUserModal<?php echo $value->id;?>" data-toggle="tooltip" title="Cilck delete user"><i class="fa fa-trash"></i></button>
	             <div class="modal fade" id="DeleteUserModal<?php echo $value->id;?>"  role="dialog" aria-labelledby="" aria-hidden="true" >
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="">Delete user </h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
						</div>
						<div class="modal-body">
							<form class="user" method="post" action="<?php echo base_url();?>user/delete_user">
								<input type="hidden" name="id" id="id" value="<?php echo $value->id ;?>">
								Confirm delete <?php echo $value->firstname."-".$value->lastname;?> ?
							
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">Delete</button>
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
					</div>
				</div>
	             
	             
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
</div>
</div>



<!-- /.container-fluid -->
</div>

