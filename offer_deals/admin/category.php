<?php @session_start(); ?>
<?php
require_once '../dbconnect.php';

/*if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}*/
require_once 'header.php';
require_once 'sidebar.php';

if(isset($_POST['add_category']))
{
	
	$query = mysqli_query($con, "Insert into categories values('null', '".$_POST['name']."', '".$_POST['category']."')" );
	
}


?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	  	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
              <button data-toggle="modal" data-target="#addcategory" type="button" class="btn btn-primary btn-sm btn-flat pull-right">Add New</button>
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
							        <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Name</th>
							        <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Parent Category</th>
							    </tr>
							</thead>
							<tbody>
							<?php
							//select users data
							$query1 = mysqli_query($con, "SELECT * FROM categories" );
							$count = mysqli_num_rows($query1); 
							$result = mysqli_fetch_object($query1);
							?>
							<?php if($count > 0){ ?>
								<?php 
									$sr_no = 1;
									while($result = mysqli_fetch_object($query1)){ 
								?>    
								    
								    <tr role="row">
										<td class=""><?php echo $sr_no; ?></td>
										<td class="sorting_1"><?php echo $result->name	; ?></td>
										<td class="sorting_1"><?php echo $result->name	; ?></td>
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
	<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
				<div class="box box-success">
					<form action="" method="post">
					<div class="box-body">
					  	<input class="form-control" name="name" placeholder="Default input" type="text"><br />
					  	
					  	<?php
							//select users data
							$query2 = mysqli_query($con, "SELECT * FROM categories" );
							$count = mysqli_num_rows($query2); 
							$result = mysqli_fetch_object($query2);
						?>
					  	
						<select name="category" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
							<option value="0">Select parent category</option>
							<?php while($result = mysqli_fetch_object($query)){
								  ?>
								<option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
							<?php } ?>
						</select>
						<br />
						<input class="btn btn-primary" type="submit" name="add_category" value="Add" />
					</div>
					</form>
					<!-- /.box-body -->
				</div>
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
