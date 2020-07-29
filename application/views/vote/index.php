<script type="text/javascript" src="<?php echo base_url(); ?>js/vote.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/sort_table.js"></script>
<!-- Begin Page Content -->
<div class="container">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
<h1 class="h3 mb-0 text-gray-800">Vote</h1>
</div>
<!-- Content Row -->
<div class="row">
<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-uppercase mb-1">Remain (<?php echo date('F');?>)</div>
						<div class="h5 mb-0 font-weight-bold "><?php echo $limit_point-count($history_monthly); ?></div>
					</div>
					<div class="col-auto">
						<i class="fa fa-star fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- History (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" data-toggle="modal" data-target="#HistoryModalM">
        <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
		        <div class="row no-gutters">
		        <div class="col mr-2">
		        <div class="text-xs font-weight-bold text-uppercase mb-1">History (<?php echo date('F');?>)</div>
		        <div class="h5 mb-0 font-weight-bold "><?php echo count($history_monthly); ?></div>
		        </div>
		        <div class="col-auto">
		        <i class="fa fa-folder fa-2x "></i>
		        </div>
	        </div>
	        </div>
        </div>
    </a>
</div>
<div class="modal fade" id="HistoryModalM"  role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="">History (<?php echo date('F');?>)</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <table class="table table-bordered"width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody id="userTable" >
        <?php 
        $i=0;
        foreach($history_monthly as $value){ $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $user_id[$value->vote_user_id];?></td>
            <td><?php echo $value->comment;?></td>
            <td><?php echo $value->create_date;?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
    <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
</div>
<!---->

<!-- History (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" data-toggle="modal" data-target="#HistoryModalY">
	    <div class="card border-left-warning shadow h-100 py-2">
	    <div class="card-body">
		    <div class="row no-gutters">
			    <div class="col mr-2">
			    <div class="text-xs font-weight-bold text-uppercase mb-1">History (<?php echo date('Y');?>)</div>
			    <div class="h5 mb-0 font-weight-bold"><?php echo count($history_year); ?></div>
			    </div>
			    <div class="col-auto">
			    <i class="fa fa-calendar fa-2x"></i>
			    </div>
		    </div>
		</div>
	    </div>
    </a>
</div>
<div class="modal fade" id="HistoryModalY"  role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="">History (<?php echo date('Y');?>)</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <table class="table table-bordered" width="100%" cellspacing="0" id="historyYTable">
        <thead>
        <tr>
            <th>#</th>
            <th>
	            <em>Name</em>
	            <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='historyYTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='historyYTable'></i>
            </th>
            <th>
	            <em>Comment</em>
	            <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='historyYTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='historyYTable'></i></th>
            <th>
	            <em>Date</em>
	            <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='historyYTable'></i>
				<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='historyYTable'></i>
				</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach($history_year as $value){ $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $user_id[$value->vote_user_id];?></td>
            <td><?php echo $value->comment;?></td>
            <td><?php echo $value->create_date;?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
    <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
</div>
<!---->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Select user</h6> 
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="searchInput" placeholder="Enter Name...">
        </div>
        <table class="table table-bordered" width="100%" cellspacing="0" id="userTableSort">
            <thead>
            <tr>
                <th>#</th>
                <th>
	                <em>First name</em>
	                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='userTableSort'></i>
					<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='userTableSort'></i>
                </th>
                <th>
	                <em>Last name</em>
	                <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='userTableSort'></i>
					<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='userTableSort'></i>
                </th>
                <th>
	                <em>Nick name</em>
					<i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='userTableSort'></i>
					<i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='userTableSort'></i>
	            </th>
                <th>Vote</th>
            </tr>
            </thead>
            <tbody id="userTable" >
            <?php 
            $i=0;
            foreach($result as $value){ $i++;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value->firstname;?></td>
                <td><?php echo $value->lastname;?></td>
                <td><?php echo $value->nickname;?></td>
                <td>
	                <?php if( $limit_point-count($history_monthly) != 0) { ?>
	                
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#confirmVote<?php echo $value->id;?>">
                    <i class="fa fa-check"></i>
                    </a>
                    <div class="modal fade" id="confirmVote<?php echo $value->id;?>"  role="dialog" aria-labelledby="" aria-hidden="true">
                    <form class="user" method="post" action="<?php echo base_url();?>vote/add" id="formConfirmVote<?php echo $value->id;?>">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="">Confirm Vote</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Name</div>
                            <div class="h5 mb-4 font-weight-bold text-gray-800"><?php echo $value->firstname."-".$value->lastname." (".$value->nickname.")";?></div>
                            </div>
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Comment</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <textarea id="comment" name="comment" rows="4" cols="50" class="form-control" placeholder="Enter Comment...." autofocus>
                            </textarea>
                            </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input type="hidden" id="vote_user_id" name="vote_user_id" value="<?php echo $value->id ;?>"/>
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $session['user_id']; ?>"/>
                            <button type="submit" class="btn btn-primary submit_vote">Vote</button>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                
	                <?php }else{
		                echo "-";
	                }?>
	            </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<!---->
</div>
<!-- Content Row -->
</div>
<!-- /.container-fluid -->

