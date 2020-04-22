<?php 

session_start();
if (!isset($_SESSION["id_admin"])) {
	header("location:login_admin.php");
}

// memanggil file config.php 
// agar tdk perlu membuat koneksi baru
include ("config.php");
 ?>

<!DOCTYPE html>
<html>

<head>
	<title>Buku | <?php echo $_SESSION["nama"] ?></title>

	<meta charset="utf-8">
	

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<script type="text/javascript">
		Add = () => {
			document.getElementById('action').value = "insert";
			document.getElementById('kode_buku').value = "";
			document.getElementById('judul').value = "";
			document.getElementById('penulis').value = "";
			document.getElementById('tahun').value = "";
			document.getElementById('harga').value = "";
			document.getElementById('stok').value = "";
		}

		Edit = (item) => {
			document.getElementById('action').value = "update";
			document.getElementById('kode_buku').value = item.kode_buku;
			document.getElementById('judul').value = item.judul;
			document.getElementById('penulis').value = item.penulis;
			document.getElementById('tahun').value = item.tahun;
			document.getElementById('harga').value = item.harga;
			document.getElementById('stok').value = item.stok;

		}
	</script>
</head>

<body>

	<?php 

	// membuat perintah sql untuk menampilkan data siswa
	if (isset($_POST["cari"])) {
		// query jika pencarian
		$cari = $_POST["cari"];
		$sql = "select * from buku where kode_buku like '%$cari%' or judul like '%$cari%' or penulis like '%$cari%' or tahun like '%$cari%'";
	}else{

	// query jika tidak mencari
	$sql = "select * from buku";
	}

	
	// eksekusi perintah sql
	$query = mysqli_query($connect, $sql);
	
	 ?>


	 <!-- navigation bar -->

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
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<!-- <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>&emsp;
				<li class="nav-item"><a href="#" class="nav-link">Produk</a></li>&emsp;
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="kontak" data-toggle="dropdown">Kontak</a>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item">Facebook</a>
						<a href="#" class="dropdown-item">Instagram</a>
						<a href="#" class="dropdown-item">Twitter</a>
					</div>
				</li> -->
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<li class="nav-item">
						<a href="proses_login_admin.php?logout=true" class="nav-link">
							Logout
						</a>
				</li>
			</ul>

		</div>
	</nav>

	<br><br><br><br><br>
	
	<div class="container">
	 	<div class="card">

	 		<nav class="navbar navbar-expand-md bg-danger navbar-dark">
			<div class="collapse navbar-collapse" id="menu" align="right">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="buku.php" class="nav-link">Data Buku</a></li> &emsp;
					<li class="nav-item"><a href="admin.php" class="nav-link">Data Admin</a></li> &emsp;
					<li class="nav-item"><a href="customer.php" class="nav-link">Data Customer</a></li> 
				</ul>
			</div>
			</nav>

	 		<div class="card-header bg-danger text-white">
	 			<h4 align="center">Data Buku</h4>
	 		</div>
	 		<div class="card-body">
	 			<form action="buku.php" method="post">
	 				<input type="text" name="cari" class="form-control" placeholder="pencarian...">
	 			</form>

	 			<table class="table" border="1">
	 				<thead>
	 					<tr>
	 						<th>Kode Buku</th>
	 						<th>Judul</th>
	 						<th>Penulis</th>
	 						<th>Tahun</th>
	 						<th>Harga</th>
	 						<th>Stok</th>
	 						<th>Foto</th>
	 						<th>Option</th>
	 					</tr>
	 				</thead>
		 			<tbody>
		 				<?php foreach ($query as $buku): ?>
		 				<tr>
		 					<td><?php echo $buku["kode_buku"]; ?></td>
		 					<td><?php echo $buku["judul"]; ?></td>
		 					<td><?php echo $buku["penulis"]; ?></td>
		 					<td><?php echo $buku["tahun"]; ?></td>
		 					<td><?php echo $buku["harga"]; ?></td>
		 					<td><?php echo $buku["stok"]; ?></td>


		 					<td>
		 						<img src="<?php echo 'image/'.$buku['image']; ?>" alt="Foto Buku" width="200" />
		 					</td>
		 					
		 					<td>
		 						<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_buku" onclick='Edit(<?php echo json_encode($buku);?>)'>Edit</button>
		 						<a href="proses_crud_buku.php?hapus=true&kode_buku=<?php echo $buku["kode_buku"]; ?>" onclick="return confirm('apakah ada yakin ingin menghapus data  ini?')">
		 							<button type="button" class="btn btn-sm btn-danger">Hapus</button>
		 						</a>
		 					</td>
		 				</tr>
		 				<?php endforeach ?>
		 			</tbody>
	 			</table>
	 			<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_buku" onclick="Add()">
	 				Tambah Data
	 			</button>
	 		</div>
	 	</div>

	 	<!-- form modal -->
	 	<div class="modal fade" id="modal_buku">
	 		<div class="modal-dialog">
	 			<div class="modal-content">

	 				<form action="proses_crud_buku.php" method="post" enctype="multipart/form-data">
	 					<div class="modal-header bg-danger text-white">
	 						<h4>Buku</h4>
	 					</div>
	 					<div class="modal-body">
	 						<input type="hidden" name="action" id="action">
	 						Kode Buku <input type="number" name="kode_buku" id="kode_buku" class="form-control" required>
	 						Judul <input type="text" name="judul" id="judul" class="form-control" required>
	 						Penulis <input type="text" name="penulis" id="penulis" class="form-control" required>
	 						Tahun <input type="number" name="tahun" id="tahun" class="form-control" required>
	 						Harga <input type="number" name="harga" id="harga" class="form-control" required>
	 						Stok <input type="number" name="stok" id="stok" class="form-control" required>
	 						Foto <input type="file" name="image" id="image" class="form-control">
	 					</div>
	 					<div class="modal-footer">
	 						<button type="submit" name="save_buku" class="btn btn-primary">Simpan</button>
	 					</div>
	 				</form>

	 			</div>
	 		</div>
	 	</div>
	 <!-- end form modal -->
</body>
</html>