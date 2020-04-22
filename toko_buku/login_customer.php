<!DOCTYPE html>
<html>

<head>
	<title>Login Customer</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</head>

<body>
	<br><br><br><br><br><br><br><br>
	<div class="container" align="center">
		<div class="card col-sm-5" align="center">

			<div class="card-header bg-danger text-white">
				<h4>Login Customer</h4>
			</div>
			
			<div class="card-body">
				<form action="proses_login_customer.php" method="post">
					Username <input type="text" name="username" class="form-control" required>
					<br>
					Password <input type="password" name="password" class="form-control" required>
					<br>
					<button type="submit" name="login_customer" class="btn btn-block btn-danger">
						Login
					</button>
					<br>
				</form>	
			</div>

		</div>
	</div>	
</body>
</html>