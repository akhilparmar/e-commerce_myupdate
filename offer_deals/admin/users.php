<?php @session_start(); ?>
<?php
require_once '../dbconnect.php';

/*if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}*/
require_once 'header.php';
require_once 'sidebar.php';

?>

<?php
//select users data
$query = mysqli_query($con, "SELECT * FROM user" );
$count = mysqli_num_rows($query); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
              <button data-toggle="modal" data-target="#adduser" type="button" class="btn btn-primary btn-sm btn-flat pull-right">Add New</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
				  <div class="col-sm-6"></div>
				  <div class="col-sm-6"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
							    <tr role="row">
							    	<th>Sr. no.</th>
							        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Name</th>
							        <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Email</th>
							    </tr>
							</thead>
							<tbody>
							<?php if($count > 0){ ?>
								<?php 
									$sr_no = 1;
									while($result = mysqli_fetch_object($query)){ 
								?>    
								    
								    <tr role="row">
										<td class=""><?php echo $sr_no; ?></td>
										<td class=""><?php echo $result->name; ?></td>
										<td class="sorting_1"><?php echo $result->email; ?></td>
								    </tr>
								<?php $sr_no++;}//end-while ?>
							    <?php 
								  }
								  else
								  { 
								?>
								<tr role="row" class="odd">
									<td  class="">No Results found</td>
								</tr>
							<?php }//end else ?>
							</tbody>

						</table>
					</div>
				</div>

				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	</section>
	<!-- /.content -->
	
	
	
	<!-- Modal -->
	<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
