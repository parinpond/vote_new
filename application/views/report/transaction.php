<script type="text/javascript" src="<?php echo base_url(); ?>js/report.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/sort_table.js"></script>

<!-- Begin Page Content -->
<div class="container">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Transaction</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Report</h6>
</div>
<div class="card-body">
	
	<div class="row">
	<div class="col-lg-12">
	<div class="p-4">
	<form autocomplete="off" class="user" method="post" action="<?php echo base_url();?>report/transaction">
	<div class="form-group row">
	<div class="col-sm-4">
	<input type="date" class="form-control form-control-user" name="start_date" id="start_date" placeholder="Start date">
	</div>
	<div class="col-sm-4">
	<input type="date" class="form-control form-control-user" name="end_date" id="end_date" placeholder="End date">
	</div>
	<div class="col-sm-3">
	<button type="submit" class="btn btn-primary btn-user btn-block search_trasaction">Search</button>
	</div>
	</div>
	</form>
	
	</div>
	</div>
</div>
<h6 class="m-2 font-weight-bold">Total :  <?php echo count($result);?></h6>
    <div class="table-responsive">
    <table class="table table-bordered" id="trasactionTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>
                <em>Name</em> 
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='1' data-order='asc' data-table='trasactionTable'></i>
                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='1' data-order='desc' data-table='trasactionTable'></i> 
            </th>
            <th>
                <em>Vote for</em> 
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='2' data-order='asc' data-table='trasactionTable'></i>
                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='2' data-order='desc' data-table='trasactionTable'></i> 
            </th>
            <th>
                <em>Comment</em> 
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='3' data-order='asc' data-table='trasactionTable'></i>
                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='3' data-order='desc' data-table='trasactionTable'></i> 
            </th>
            <th>
                <em>Date</em> 
                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='4' data-order='asc' data-table='trasactionTable'></i>
                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='4' data-order='desc' data-table='trasactionTable'></i> 
            </th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach($result as $value){ $i++;?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $user_id[$value->user_id];?></td>
            <td><?php echo $user_id[$value->vote_user_id];?></td>
            <td><?php echo $value->comment;?></td>
            <td><?php echo $value->create_date;?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
</div>
</div>



<!-- /.container-fluid -->
</div>


