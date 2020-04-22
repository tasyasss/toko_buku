<?php 

session_start();
if (!isset($_SESSION["id_customer"])) {
	header("location:login_customer.php");
}

include ("config.php");
 ?>

<!DOCTYPE html>
<html>

<head>
	<title>Selamat Datang <?php echo $_SESSION["nama"] ?>!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- load bootstrap css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="assets/css/bikin.css"> -->


	<!-- load jquery and bootstrap js -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
		Detail = (item) => {
			document.getElementById('kode_buku').value = item.kode_buku;
			document.getElementById('judul').innerHTML = item.judul;
			document.getElementById('penulis').innerHTML = item.penulis;
			document.getElementById('harga').innerHTML = item.harga;
			document.getElementById('stok').innerHTML = item.stok;
			document.getElementById('jumlah_beli').value = "1";
			document.getElementById('jumlah_beli').max = item.stok;

			document.getElementById('image').src = "image/" + item.image;
		}
	</script>

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
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<li class="nav-item"><a href="index_customer.php" class="nav-link">Beranda</a></li>&emsp;
				<li class="nav-item"><a href="#" class="nav-link">Produk</a></li>&emsp;
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="kontak" data-toggle="dropdown">Kontak</a>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item">Facebook</a>
						<a href="#" class="dropdown-item">Instagram</a>
						<a href="#" class="dropdown-item">Twitter</a>
					</div>
				</li>

				<li class="nav-item">
					<a href="cart.php" class="nav-link">
						Cart(<?php echo count($_SESSION["cart"]); ?>)
					</a>
				</li>
				<li class="nav-item"><a href="transaksi.php" class="nav-link">Riwayat</a></li>
				&emsp;&emsp;
				<li class="nav-item">
						<a href="proses_login_customer.php?logout=true" class="nav-link">
							Logout
						</a>
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

	<div class="bg-danger" align="center">
		<br><br><br>
		<?php 
			if (isset($_POST["cari"])) {
				$cari = $_POST["cari"];

				$sql = "select * from buku where penulis like '%$cari%' or judul like '%$cari%'";
			}else {
				$sql = "select * from buku";
			}
			$query = mysqli_query($connect, $sql);
		?>

		&emsp;&emsp;&emsp;
		<div class="col-md-11">
		<div class="row">
		<?php foreach ($query as $buku): ?>
			<div class="card col-sm-3">
				<div class="card-header bg-dark text-white" align="center">
					<?php echo $buku ["judul"]; ?>
				</div>
				<div class="card-body" align="center">
					<img src="<?php echo 'image/'.$buku ['image']; ?>" alt="Cover buku" width="150" height="200"/> <br>
					<?php echo $buku ["penulis"] ?> <br>Rp<?php echo $buku ["harga"] ?>
				</div>
				<div class="card-footer bg-dark">
					<center>
						<button type="button" name="info" class="btn btn-md btn-light" onclick='Detail(<?php echo json_encode($buku); ?>)' data-toggle="modal" data-target="#modal_detail">Detail</button>
					</center>
				</div>
			</div>
		<?php endforeach; ?>
		</div>	
		</div> <br><br><br><br><br>

		<!-- buat modalnya dulu nak -->
				<div class="modal" id="modal_detail">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header bg-dark">
								<h4 class="text-white">Detail Buku</h4>
							</div>
							
							<div class="modal-body">
								<div class="row">
									<div class="col-6">
										<!-- untuk gambar -->
										<img style="width:100%; height:auto;" id="image">
									</div>
									<div class="col-6">
										<!-- untuk deskripsi -->
										<h5 id="judul"></h5>
										<h5 id="penulis"></h5>
										<h5 id="harga"></h5>
										Stok: <h4 id="stok"></h4>

										<form action="proses_cart.php" method="post">
											<input type="hidden" name="kode_buku" id="kode_buku">
											Jumlah Beli
											<input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control" min="1"> <br>
											<button type="submit" name="add_to_cart" class="btn btn-success">
												Tambahkan ke keranjang
											</button>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div> <!-- modal -->
	</div>

</body>

</html>