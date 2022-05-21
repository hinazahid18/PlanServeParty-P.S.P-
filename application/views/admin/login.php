<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
		crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">
</head>

<body>
	<section class="bg-login">
		<div class="container ">
			<div class="row">

				<div class="col-lg-3 login-form">


					<div class="card p-4 login-form-border">

						<i class="fas fa-user-tie shadow"></i>
						<div class="text-center admin ">
							<h4 class="text-white">ADMIN</h4>
						</div>
						<form method="post" action="<?php echo base_url('admin/login'); ?>">

							<label for="" class="fw-bold">Username</label>
							<input type="username" name="username" class="form-control mt-2" required>
							<label for="" class="fw-bold mt-3">Password</label>
							<input type="password" name="password" class="form-control mt-2 " required>
							<div class="mt-3 text-center">
								<button class="btn">LOGIN</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- <button id="error">Error</button> -->
	</section>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function () {
			setTimeout(function () {
				$(".remove").fadeOut(1500);
			}, 2000);
		});
	</script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
	</script>
<script>
	$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		});
		toastr.error("<?php echo @$error; ?>");

</script>
</body>

</html>