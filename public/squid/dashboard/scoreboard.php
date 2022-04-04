<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';

include_once 'includes/header.php';

$tableIndex = filter_input(INPUT_GET, 'table', FILTER_SANITIZE_URL);
if (isset($tableIndex)) {
	$_SESSION['table_index'] = $tableIndex;
}
?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Scoreboard</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item active">Scoreboard</li>
		</ol>
		<?php include('./includes/flash_messages.php') ?>
		<div class="card mb-4">
			<div class="card-header">
				<div class="row">
					<div class="col"><i class="fas fa-table mr-1"></i>
						DataTable
						<select id="dpTable" class="form-select" aria-label="Default select example">
							<option value="">Select scoreboard</option>
							<?php
							foreach ($table_scoreboards as $key=>$table) {
								$selected = $_SESSION['table_index'] == $key ? 'selected' : '';
								echo '<option value="'.$key.'" '.$selected.'>'.$table['name'].'</option>';	
							}
							?>
						</select>
					</div>
					<div class="col">
						<?php if ($_SESSION['admin_type'] == 'super'){ ?>
						<div class="page-action-links text-right">
							<a href="scoreboard_add.php?operation=create">
								<button class="btn btn-success btn-sm"><span class="fa fa-plus fa-fw"></span> Add new </button>
							</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<?php if ($_SESSION['admin_type'] == 'super'){ ?>
				<div class="row">
					<div class="col">				
						<form class="form form-inline" action="">
							 <div class="form-group mb-2">
								<select name="update_order"  class="form-control form-control-sm" id="update_order">
									<option value="remove">Remove</option>
									<option value="filter">Spam</option>
								</select>
							  </div>
							<a href="" class="btn btn-primary btn-sm ml-3 mb-2" data-toggle="modal" data-target="#update-status">Apply update</a>
						</form>
					</div>
				</div>
				<?php } ?>

				<hr>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						 <thead>
							<tr>
								<th><input id="check_all_top" name="check_all" class="check_all checkbox" value="" type="checkbox" /></th>
								<th class="header">ID</th>
								<th>Name</th>
								<th>ID (Email / Phone)</th>
								<th>Level / Category</th>
								<th>Score</th>
								<th>Filters</th>
								<th>Date</th>
								<?php if ($_SESSION['admin_type'] == 'super'){ ?>
								<th class="notexport actionColumn">Action</th>
								<?php } ?>
							</tr>
						</thead>
						<tfoot>
							<tr>
							<th><input id="check_all_top" name="check_all" class="check_all checkbox" value="" type="checkbox" /></th>
								<th class="header">ID</th>
								<th>Name</th>
								<th>ID (Email / Phone)</th>
								<th>Level / Category</th>
								<th>Score</th>
								<th>Filters</th>
								<th>Date</th>
								<?php if ($_SESSION['admin_type'] == 'super'){ ?>
								<th>Action</th>
								<?php } ?>
							</tr>
						</tfoot>
					</table>
					</div>
				</div>
		</div>
	</div>
</main>

<!-- Update Status Modal-->
<?php if ($_SESSION['admin_type'] == 'super'){ ?>
<div class="modal fade" id="update-status" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
	  <form action="scoreboard_update_batch.php" method="POST">
	  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Confirm</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div id="update-status-confirm">
				<div class="modal-body">
					<input type="hidden" name="batch_id" id = "batch_id" value="">
					<input type="hidden" name="update_status" id = "update_status" value="">
					<p>Are you sure you want to apply this update?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary pull-left">Confirm</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			 </div>

			 <div id="update-status-error">
				<div class="modal-body">
					<p>Please check at least one user score to update.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
				</div>
			 </div>
		  </div>
	  </form>
	</div>
</div>
<?php } ?>
<!--Main container end-->

<?php include_once './includes/footer.php'; ?>

