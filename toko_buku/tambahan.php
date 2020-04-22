
<head>
	<!-- <script type="text/javascript">
		Detail = (item) => {
			document.getElementById('kode_buku').value = item.kode_buku;
			document.getElementById('judul').value = item.judul;
			document.getElementById('penulis').value = item.penulis;
			document.getElementById('harga').value = item.harga;
			document.getElementById('stok').value = item.stok;
			document.getElementById('jumlah_beli').value = "1";

			document.getElementById('image').src = "image/" + item.image;
		}
	</script> -->
</head>


<!-- start navigasi -->
<li class="nav-item">
	<a href="cart.php" class="nav-link">
		Cart(<?php echo count($_SESSION["cart"]); ?>)
	</a>
</li>
<!-- end navigasi -->


<?php 
if (isset($_POST["cari"])) {
	$cari = $_POST["cari"];

	$sql = "select * from buku where penulis like '%$cari%' or judul like '%$cari%'";
}else {
	$sql = "select * from buku";
}
$query = mysqli_query($connect, $sql);
 ?>

<div class="container">
<div class="row">
<!-- <?php foreach ($query as $buku): ?>
	<div class="card col-md-3">
		<div class="card-header bg-dark text-white" align="center"><?php echo $buku ["judul"]; ?></div>
		<div class="card-body" align="center">
			<img src="<?php echo 'image/'.$buku ['image']; ?>" alt="Cover buku" width="150" height="200"/> <br>
			Penulis : <?php echo $buku ["penulis"] ?> <br>Rp<?php echo $buku ["harga"] ?>
		</div>
		<div class="card-footer bg-dark">
			<center>
				<button type="button" name="info" class="btn btn-md btn-light" onclick="Detail(<?php echo json_encode($buku); ?>)" data-toggle="modal" data-target="#modal_detail">Detail</button>
			</center>
		</div>
	</div>
<?php endforeach; ?> -->
</div>
</div>

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
						<h4 id="judul"></h4>
						<h4 id="penulis"></h4>
						<h4 id="harga"></h4>
						<h4 id="stok"></h4>

						<form action="proses_cart" method="post">
							<input type="hidden" name="kode_buku" id="kode_buku">
							Jumlah Beli
							<input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control" min="1">
							<button type="submit" name="add_to_cart" class="btn btn-success">
								Tambahkan ke keranjang
							</button>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php foreach ($query as $buku): ?>
	<div class="card col-md-3">
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
	</div> &emsp;&emsp;&emsp;
<?php endforeach; ?>
&emsp;&emsp;&emsp;

<!-- untuk mencari -->
<?php
			        if (isset($_POST["search"])) {
			            $search = $_POST["search"];
		            	$sql = "select * from buku where judul like '%$search%' or 
			                    penulis like '%$search%'";
			        }else{
			            $sql = "select * from buku";
			        }
			        $query = mysqli_query($connect, $sql);
			    ?>