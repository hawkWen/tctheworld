<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';

include_once 'includes/header.php';
?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Filter Scores</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item active">Filter Scores</li>
		</ol>
		<?php include('./includes/flash_messages.php') ?>
		<div class="card mb-4">
			<div class="card-header">
				<div class="row">
					<div class="col"><i class="fas fa-table mr-1"></i> DataTable (<?php echo $table_filter_scores; ?>)</div>	
					<div class="col">
						<?php if ($_SESSION['admin_type'] == 'super'){ ?>
						<div class="page-action-links text-right">
							<a href="filter_scores_add.php?operation=create">
								<button class="btn btn-success btn-sm"><span class="fa fa-plus fa-fw"></span> Add new </button>
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
								<th>Game</th>
								<th>Type / Category</th>
								<th>Score Min</th>
								<th>Score Max</th>
								<th>Status</th>
								<th>Date</th>
								<?php if ($_SESSION['admin_type'] == 'super'){ ?>
								<th class="notexport actionColumn">Action</th>
								<?php } ?>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="header">ID</th>
								<th>Game</th>
								<th>Type / Category</th>
								<th>Score Min</th>
								<th>Score Max</th>
								<th>Status</th>
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
<!--Main container end-->

<?php include_once './includes/footer.php'; ?>

