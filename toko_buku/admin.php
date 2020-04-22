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
	<title>Admin | <?php echo $_SESSION["nama"] ?></title>

	<meta charset="utf-8">
	

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<script type="text/javascript">
		Add = () => {
			document.getElementById('action').value = "insert";
			document.getElementById('id_admin').value = "";
			document.getElementById('nama').value = "";
			document.getElementById('kontak').value = "";
			document.getElementById('username').value = "";
			document.getElementById('password').value = "";
		}

		Edit = (item) => {
			document.getElementById('action').value = "update";
			document.getElementById('id_admin').value = item.id_admin;
			document.getElementById('nama').value = item.nama;
			document.getElementById('kontak').value = item.kontak;
			document.getElementById('username').value = item.username;
			document.getElementById('password').value = item.password;

		}
	</script>
</head>

<body>
	<?php 

	// membuat perintah sql untuk menampilkan data siswa
	if (isset($_POST["cari"])) {
		// query jika pencarian
		$cari = $_POST["cari"];
		$sql = "select * from admin where id_admin like '%$cari%' or nama like '%$cari%' or kontak like '%$cari%' or username like '%$cari%'";
	}else{
	// query jika tidak mencari
	$sql = "select * from admin";
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
	 			<h4 align="center">Data Admin</h4>
	 		</div>
	 		<div class="card-body">
	 			<form action="admin.php" method="post">
	 				<input type="text" name="cari" class="form-control" placeholder="pencarian...">
	 			</form>

	 			<table class="table" border="1">
	 				<thead>
	 					<tr>
	 						<th>ID Admin</th>
	 						<th>Nama</th>
	 						<th>Kontak</th>
	 						<th>Username</th>
	 						<th>Password</th>
	 						<th>Option</th>
	 					</tr>
	 				</thead>
		 			<tbody>
		 				<?php foreach ($query as $admin): ?>
		 				<tr>
		 					<td><?php echo $admin["id_admin"]; ?></td>
		 					<td><?php echo $admin["nama"]; ?></td>
		 					<td><?php echo $admin["kontak"]; ?></td>
		 					<td><?php echo $admin["username"]; ?></td>
		 					<td><?php echo $admin["password"]; ?></td>
		 					
		 					
		 					<td>
		 						<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_admin" onclick='Edit(<?php echo json_encode($admin);?>)'>Edit</button>
		 						<a href="proses_crud_admin.php?hapus=true&id_admin=<?php echo $admin["id_admin"]; ?>" onclick="return confirm('apakah ada yakin ingin menghapus data  admin ini?')">
		 							<button type="button" class="btn btn-sm btn-danger">Hapus</button>
		 						</a>
		 					</td>
		 				</tr>
		 				<?php endforeach ?>
		 			</tbody>
	 			</table>
	 			<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_admin" onclick="Add()">
	 				Tambah Data
	 			</button>
	 		</div>
	 	</div>

	 	<!-- form modal -->
	 	<div class="modal fade" id="modal_admin">
	 		<div class="modal-dialog">
	 			<div class="modal-content">

	 				<form action="proses_crud_admin.php" method="post" enctype="multipart/form-data">
	 					<div class="modal-header bg-danger text-white">
	 						<h4>Data Admin</h4>
	 					</div>
	 					<div class="modal-body">
	 						<input type="hidden" name="action" id="action">
	 						ID Admin <input type="number" name="id_admin" id="id_admin" class="form-control" required>
	 						Nama <input type="text" name="nama" id="nama" class="form-control" required>
	 						Kontak <input type="text" name="kontak" id="kontak" class="form-control" required>
	 						Username <input type="text" name="username" id="username" class="form-control" required>
	 						Password <input type="text" name="password" id="password" class="form-control" required>
	 					</div>
	 					<div class="modal-footer">
	 						<button type="submit" name="save_admin" class="btn btn-primary">Simpan</button>
	 					</div>
	 				</form>

	 			</div>
	 		</div>
	 	</div>
	 <!-- end form modal -->
</body>
</html>