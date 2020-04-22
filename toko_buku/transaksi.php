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
</head>
<body>

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

	<br><br><br><br><br>

	

	<div class="container">
		<div class="card mt-3">
			<div class="card-header bg-secondary">
				<h4 class="text-white">
					Riwayat Transaksi
				</h4>
			</div> <!-- card header -->
			<div class="card-body">
				<?php 
				$sql = "select * from transaksi t inner join customer c on t.id_customer = c.id_customer 
				where t.id_customer = '".$_SESSION["id_customer"]."' order by t.tgl desc";
				
				$query = mysqli_query($connect, $sql);
				 ?>


				 <ul class="list-group">
				 	<?php foreach ($query as $transaksi): ?>
				 	<li class="list-group-item mb-4">
				 		<h6>ID Transaksi: <?php echo $transaksi["id_transaksi"]; ?></h6>
				 		<h6>Nama Pembeli: <?php echo $transaksi["nama"]; ?></h6>
				 		<h6>Tgl Transaksi: <?php echo $transaksi["tgl"]; ?></h6>
				 		<h6>List Barang: </h6>

				 		<?php 
				 		$sql2 = "select * from detail_transaksi d inner join buku b 
				 		on d.kode_buku = b.kode_buku 
				 		where d.id_transaksi='".$transaksi["id_transaksi"]."'";

				 		$query2 = mysqli_query($connect, $sql2);
				 		 ?>

				 		<table class="table table-borderless">
				 			<thead>
				 				<tr>
				 					<th>Judul</th>
				 					<th>Jumlah</th>
				 					<th>Harga</th>
				 					<th>Total</th>
				 				</tr>
				 			</thead>
				 			<tbody>
				 				<?php $total = 0; foreach ($query2 as $detail): ?>
				 					<tr>
				 						<td><?php echo $detail["judul"]; ?></td>
				 						<td><?php echo $detail["jumlah"]; ?></td>
				 						<td>Rp <?php echo number_format($detail["harga_beli"]); ?></td>
				 						<td>
				 							Rp <?php echo number_format($detail["harga_beli"]*$detail["jumlah"]); ?>
				 						</td>
				 					</tr>
				 				<?php 
				 				$total += ($detail["harga_beli"]*$detail["jumlah"]);
				 				endforeach ?>
				 			</tbody>
				 		</table>
				 		<h6 class="text-danger">Total: Rp <?php echo number_format($total); ?></h6>
				 	</li>
				 	<?php endforeach ?>
				 </ul>
			</div> <!-- card body -->
		</div>
	</div>

</body>
</html>