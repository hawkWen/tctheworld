<?php if (isset($_SESSION['user_logged_in'.$session_app]) && $_SESSION['user_logged_in'.$session_app] == true ) : ?>	
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
<?php endif; ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/jszip.min.js"></script>
	<script src="js/pdfmake.min.js"></script>
	<script src="js/vfs_fonts.js"></script>
	<script src="js/buttons.html5.min.js"></script>
	<script src="js/buttons.print.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/additional-methods.min.js"></script>
	<script src="js/scripts.js"></script>
	
	<?php include_once 'includes/scripts.php'; ?>
</body>

</html>