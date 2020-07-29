<script type="text/javascript" src="<?php echo base_url(); ?>js/user.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/validate.js"></script>
<!-- Begin Page Content -->
<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ponit</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th style="width:30%">Name</th>
            <th style="width:30%">Ponit</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach($result as $value){ $i++;?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value->name;?></td>
            <td><?php echo $value->limit_point;?></td>
            <td > 
	            <form class="user" method="post" action="<?php echo base_url();?>user/update_point">
	            <div class="form-group row">
					<div class="col-sm-6">
					<input type="number" min="0" class="form-control form-control-user" name="limit_point" id="limit_point" placeholder="" required>
					<input type="hidden" name="id" id="id" value="<?php echo $value->id;?>">
					</div>
					<div class="col-sm-3">
			            <button type="submit" class="btn btn-warning">
		                <i class="fa fa-pencil"></i>
		                </button>
	                </div>
                </div>
                </form>
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


