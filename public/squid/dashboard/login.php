<?php
session_start();
require_once './config/config.php';

//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in'.$session_app]) && $_SESSION['user_logged_in'.$session_app] === TRUE) {
    header('Location:index.php');
}

include_once 'includes/header.php';
?>

<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
							<div class="card-body">
								<form class="form loginform" method="POST" action="authenticate.php">
									<div class="form-group"><label class="small mb-1" for="inputEmailAddress">Username</label><input class="form-control py-4" name="username" type="text" placeholder="Enter username" /></div>
									<div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="passwd" type="password" placeholder="Enter password" /></div>
									<div class="form-group">
										<div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
									</div>
									<?php
									if(isset($_SESSION['login_failure'])){ ?>
									<div class="alert alert-danger alert-dismissable fade show">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<?php echo $_SESSION['login_failure']; unset($_SESSION['login_failure']);?>
									</div>
									<?php } ?>
									<button type="submit" class="btn btn-success loginField" >Login now</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	
	<div id="layoutAuthentication_footer">
		<footer class="py-4 bg-light mt-auto">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Scoreboard Admin Panel</div>
					<div>
						<a href="https://codecanyon.net/collections/6621618-scoreboard-games-lists/">Compatible HTML5 Games</a>
						·
						<a href="https://codecanyon.net/user/demonisblack/portfolio">Portfolio</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
<?php include_once 'includes/footer.php'; ?>