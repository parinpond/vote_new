<script type="text/javascript" src="<?php echo base_url(); ?>js/report.js"></script>
<script src="<?php echo base_url(); ?>assets/chart/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/chart/dist/Chart.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/sort_table.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
<!-- Begin Page Content -->
<div class="container">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Summary</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Report</h6>
</div>
<div class="card-body">
	<div class="row">
		<div style="width: 100%">
			<canvas id="myChart"></canvas>
		</div>
		</div>
	<form autocomplete="off" class="user" method="post" action="<?php echo base_url();?>report/summary">
		<div class="col-lg-12">
			<div class="p-4">
				<div class="form-group row">
				<div class="col-sm-5">
				<input type="date" class="form-control form-control-user" name="start_date_summary" id="start_date_summary" placeholder="Start date">
				</div>
				<div class="col-sm-5">
				<input type="date" class="form-control form-control-user" name="end_date_summary" id="end_date_summary" placeholder="End date">
				</div>
				<!--<div class="col-sm-2">
				<input type="text" class="form-control form-control-user" name="total_summary" id="total_summary" placeholder="Total">
				</div>-->
				<div class="col-sm-2">
				<button type="submit" class="btn btn-primary btn-user btn-block search_summary">Search</button>
				</div>
			</div>
		</div>
	</form>
	<div class="col-lg-12">
	<?php echo "<B>Total = ".count($result)."</B> (".$start_date." To ".$end_date .")";?>
	</div>
		<div class="col-lg-12">
	    <table class="table table-bordered" id="trasactionTable" cellspacing="0">
	        <thead>
	        <tr>
	            <th>#</th>
	            <th>
	                <em>Name</em> 
	                <!--<i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='trasactionTable'></i>
	                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='trasactionTable'></i>-->
	            </th>
	            <th>
	                <em>Got point</em> 
	                <!--<i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='trasactionTable'></i>
	                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='trasactionTable'></i>-->
	            </th>
	        </tr>
	        </thead>
	        <tbody>
			<?php 
			if(!empty($result)){
			$i=0;
			$create_chart =[];
			foreach($result as $value){ $i++;
				$create_chart[$i]['vote_user_id']=  $value->vote_user_id;
                $create_chart[$i]['name_vote_user'] = $user_id[$value->vote_user_id];
                $create_chart[$i]['count']=  $value->count;
			?>
	          <tr>
	            <td><?php echo $i;?></td>
	            <td><?php echo $user_id[$value->vote_user_id];?></td>
	            <td>
					<a href="#" class="DetailSummaryModal" data-id="<?php echo $value->vote_user_id;?>" data-toggle="modal" data-target="#DetailSummaryModal<?php echo $value->vote_user_id;?>" data-toggle="tooltip" title="Cilck looking for detail">
					<?php echo $value->count;?>
					</a>  
					<div class="modal fade" id="DetailSummaryModal<?php echo $value->vote_user_id;?>"  role="dialog" aria-labelledby="" aria-hidden="true" >
						<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="">Detail got point from</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
						</div>
						<div class="modal-body">
							<table class="detail_summary table table-bordered"width="100%" cellspacing="0" id="detailSummaryTable">
								<thead>
								<tr>
								<th>#</th>
								<th>
									<em>Name</em> 
					               <!-- <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='detailSummaryTable'></i>
					                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='detailSummaryTable'></i> -->
								</th>
								<th>
									<em>Comment</em> 
					               <!-- <i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='detailSummaryTable'></i>
					                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='detailSummaryTable'></i>-->
								</th>
								<th>
									<em>Date</em> 
					                <!--<i class="fa fa-fw fa-chevron-circle-down" data-column-id='0' data-order='asc' data-table='detailSummaryTable'></i>
					                <i class="fa fa-fw fa-chevron-circle-up" data-column-id='0' data-order='desc' data-table='detailSummaryTable'></i>-->
					            </th>
								</tr>
								</thead>
							<tbody id="detail_summary_table<?php echo $value->vote_user_id;?>" >
							</tbody>
							</table>
						</div>
						<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
						</div>
						</div>
						</div>
					</div>
	            </td>
	        </tr>
	        <?php }}else{
				echo "<tr><td colspan='3'>No data.</td></tr>";
			}?>
			</tbody>
			<script type="text/javascript">
			var data_chart = <?PHP echo json_encode($create_chart); ?>;
			</script>
	    </table>
	    </div>
    </div><!--row-->
</div>
</div>



<!-- /.container-fluid -->
</div>


