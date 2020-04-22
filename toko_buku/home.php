
<!DOCTYPE html>
<html>

<head>
	<title>Beranda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- load bootstrap css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="assets/css/bikin.css"> -->


	<!-- load jquery and bootstrap js -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<style media="screen">
		div.news{
			margin: 0 auto;
			width: 90%;
			height: 400px;
			column-count: 2;
			column-gap: 30px;
			column-rule-style: solid;
			column-rule-width: 2px;
			column-rule-color: #000;
			font-size: 20px;
		}


		.headers{
		width: 100%;
		height: 715px;
		background: url("image/2.jpeg") no-repeat;
		background-size: cover;
		background-position: center;
		box-shadow: inset 0 0 0 500px rgba(0, 0, 0, 0.5);
		}

		.headers h1{
		text-align: center;
		color: white;
		margin-top: 111px;
		}

		.headers h2{
		text-align: center;
		color: white;
		}

		.headers h3{
		text-align: center;
		color: white;
		}

		.imodal {
		width: 50%;
		height: 250px;
		}

		/*.nav navbar{
			color: #ffffe6;
		}*/
	</style>
</head>

<body>


	<!-- headers -->

	<div class="row">
		<div class="headers">
			<h1><br><br><br><br>
			Bacalah Buku</h1>
			<h2>untuk melihat indahnya dunia</h2>
			<h3>di dalam genggamanmu</h3>
		</div>
	</div>


	<!-- navigation bar --> <!-- navigation bar --> <!-- navigation bar --> <!-- navigation bar -->

	<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
		<!-- navbar-expand-md  ->  menu akan dihidden ketika tampilan device medium
		fixed-top  ->  navbar akan berposisi selalu di atas -->
		
		<a href="home.php">
			<img src="academic.png" width="75" alt="">
		</a>

		<!-- pemanggilan icon menu saat menubar disembunyikan -->
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
			<span class="navbar navbar-toggler-icon"></span>
		</button>


		<!-- daftar menu pada navbar -->
		<div class="collapse navbar-collapse" id="menu" align="right">
			
			<ul class="navbar-nav">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>&emsp;
				<li class="nav-item"><a href="#" class="nav-link">Produk</a></li>&emsp;
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="kontak" data-toggle="dropdown">Kontak</a>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item">Facebook</a>
						<a href="#" class="dropdown-item">Instagram</a>
						<a href="#" class="dropdown-item">Twitter</a>
					</div>
				</li>
				&emsp;&emsp;
				<li class="nav-item dropdown text-dark">
					<a href="#" class="nav-link dropdown-toggle" id="kontak" data-toggle="dropdown">Log in</a>
					<div class="dropdown-menu">
						<a href="login_admin.php" class="dropdown-item">as Admin</a>
						<a href="login_customer.php" class="dropdown-item">as Customer</a>
					</div>
				</li>
			</ul>

		</div>
	</nav>


 	<!-- description and image --> <!-- description and image --> <!-- description and image -->

 	<div class="bg-danger">
 		<br><br><br>

	 	<div class="news text-white" align="center">
	 		<br>
	 		<h4 align="left">
	 		Today's quote</h4>
	 		<br>
			
			<h2>"A room without books</h2>
			<h4>is like</h4>
			<h2>a body without soul"</h2>
			<br>
			<i>Marcus Tullius Cicero</i>
			
			<div align="center">
				<img src="image/1.jpeg" width="450">
			</div>
		</div>

	</div>


	<!-- carousel image	 --> <!-- carousel image	 --> <!-- carousel image	 --> <!-- carousel image	 -->

	
		<div class="container">
			<br><br>

 			<div class="carousel slide" data-ride="carousel" id="slide">
 			
 				<!-- indikator slide -->
 				<ul class="carousel-indicators">
	 				<!-- class=active berarti elemen tersebut pertama kali ditampilkan -->
	 				<li data-target="#slide" data-slide-to="0" class="active"></li>
	 				<li data-target="#slide" data-slide-to="1"></li>
	 				<li data-target="#slide" data-slide-to="2"></li>
	 				<li data-target="#slide" data-slide-to="3"></li>
	 				<li data-target="#slide" data-slide-to="4"></li>
	 				
 				</ul>

	 			<!-- gambar slide -->
	 			<div class="carousel-inner">
	 				<div class="carousel-item active" align="center">
	 					<img src="image/4.jpeg" width="75%" height="475" alt="">
	 				</div>
	 				<div class="carousel-item" align="center">
	 					<img src="image/5.jpeg" width="75%" height="475" alt="">
	 				</div>
	 				<div class="carousel-item" align="center">
	 					<img src="image/6.jpeg" width="75%" height="475" alt="">
	 				</div>
	 				<div class="carousel-item" align="center">
	 					<img src="image/7.jpeg" width="75%" height="475" alt="">
	 				</div>
	 				<div class="carousel-item" align="center">
	 					<img src="image/8.jpeg" width="75%" height="475" alt="">
	 				</div>
	 			</div>

	 			<!-- navigasi slide -->
	 			<a href="#slide" data-slide="prev" class="carousel-control-prev">
	 				<span class="carousel-control-prev-icon"></span>
	 			</a>
	 			<a href="#slide" data-slide="next" class="carousel-control-next">
	 				<span class="carousel-control-next-icon"></span>
	 			</a>

 			</div>

 			<br><br>
 		</div>
 	


	<!-- photo card --> <!-- photo card --> <!-- photo card --> <!-- photo card --> <!-- photo card -->

	<div class="bg-danger">
		<br><br>

		<div class="container" align="center">
	
			<div class="row" align="center">

				&emsp;&emsp;&emsp;&emsp;&emsp;

				<div class="card col-md-3">
					<img src="image/111-232.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							Prolog
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>

				&emsp;&emsp;&emsp;

				<div class="card col-md-3">
					<img src="image/rhapsody.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							Adonis
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>	

				&emsp;&emsp;&emsp;			

				<div class="card col-md-3">
					<img src="image/rhapsody.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							I Need You
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>

			</div>

			<br><br>
			<div class="row" align="center">

				&emsp;&emsp;&emsp;&emsp;&emsp;

				<div class="card col-md-3">
					<img src="image/115-168.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							Incomplete
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>

				&emsp;&emsp;&emsp;	

				<div class="card col-md-3">
					<img src="image/118-28.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							Friendzone
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>

				&emsp;&emsp;&emsp;			

				<div class="card col-md-3">
					<img src="image/rhapsody.jpg" class="card-img-top">
						<div class="card-header bg-secondary text-white">
							Rhapsody
						</div>
							
							<div class="card-footer">
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#login_first">
									Detail
								</button>
							</div>

				</div>

			
		</div>

		<br><br>
	</div>


	

</body>

</html>

<!-- medium modal --> <!-- medium modal --> <!-- medium modal --> <!-- medium modal --> <!-- medium modal -->
	<div class="modal fade" id="login_first">
			<div class="modal-dialog modal-lg">
				
				<div class="modal-content">
					<div class="modal-header bg-secondary text-white">
						<h3>Please Login First!</h3>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					


					<br><br><br><br>
					<div class="container" align="center">
						<div class="card col-sm-6" align="center">

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
					<br><br><br><br>


				</div>

			</div>
	</div>