<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

require_once 'includes/header.php';
?>

<?php
//Only super admin is allowed to access this page
if ($_SESSION['admin_type'] !== 'super') { ?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Permission Denied</h1>
	</div>
</main>
<?php }else{
?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Admin Accounts</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item active">Admin Accounts</li>
		</ol>
		<?php include('./includes/flash_messages.php') ?>
		<?php
		if (isset($del_stat) && $del_stat == 1) {
			echo '<div class="alert alert-info fade show">Successfully deleted</div>';
		}
		?>
		<div class="card mb-4">
			<div class="card-header">
				<div class="row">
					<div class="col"><i class="fas fa-table mr-1"></i> DataTable (<?php echo $table_admin; ?>)</div>
					<div class="col">
						<?php if ($_SESSION['admin_type'] == 'super'){ ?>
						<div class="page-action-links text-right">
							<a href="admin_users_add.php">
								<button class="btn btn-success btn-sm"><span class="fa fa-plus fa-fw"></span> Add new</button>
							</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						 <thead>
							<tr>
								<th class="header">ID</th>
								<th>Name</th>
								<th>Admin Type</th>
								<th class="notexport actionColumn">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="header">ID</th>
								<th>Name</th>
								<th>Admin Type</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
					</div>
				</div>
		</div>
	</div>
</main>
<?php } ?>

<?php include_once 'includes/footer.php'; ?>