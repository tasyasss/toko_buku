 <?php 
 // load file config.php
	include ("config.php");

if (isset($_POST["save_buku"])) {
	// isset digunakan untuk menecek apakah ketika mengakses file ini, dikirimkan data dengan nama "save_siswa" dg method POST

	// kita tampung data yang dikirimkan
	$action = $_POST["action"];
	$kode_buku = $_POST["kode_buku"];
	$judul = $_POST["judul"];
	$penulis = $_POST["penulis"];
	$tahun = $_POST["tahun"];
	$harga = $_POST["harga"];
	$stok = $_POST["stok"];

	// menampung fie image
	// if (isset($_FILES["image"])) {
		// 	isset itu untuk mengecek keberadaan sebuah variabel (mengecek wadah)

	// menampung file image
	if (!empty($_FILES["image"] ["name"])) {
		// empty itu digunakan untuk mengecek
		// apakah sebuah variabel itu menyimpan
		// sebuah nilai atau tidak (mengecek isi)

		// contohnya
		// $angka;
		// echo empty($angka); --> hasilnya true, karena $angka tidak punya nilai atau variabel tsb kosong
		// $angka = 10;
		// echo empty($angka); --> hasilnya false, karena $angka punya nilai atay variabel tsb tidak kosong
		// atau ada isinya

		// kesimpulannya
		// untuk mengecek apakah variabel "image" yang dikirimkan itu punya nama file atau tidak


		// mendapatkan deskripsi info gambar
		$path = pathinfo($_FILES["image"]["name"]);
		// mengambil ekstensi gambar
		$extension = $path["extension"];

		// rangkai filename 
		$filename = $kode_buku."-".rand(1,1000).".".$extension;
		// generate nama file
		// exp : 111.989.jpg
		// rand() random nilai 1-1000
	}

	// cek aksi 
	if ($action == "insert") {
		// sintak untuk insert
		$sql = "insert into buku values('$kode_buku', '$judul', '$penulis', '$tahun', '$harga', '$stok', '$filename')";

		// proses upload file
		move_uploaded_file($_FILES["image"]["tmp_name"],"image/$filename");
		
		// eksekusi perintah sql
		mysqli_query($connect, $sql);

	} elseif ($action == "update") {

		// if (isset($_FILES["image"])) {
		if (!empty($_FILES["image"]["name"])) {
			// mendapatkan deskripsi info gambar
			$path = pathinfo($_FILES["image"]["name"]);
			// mengambil ekstensi gambar
			$extension = $path["extension"];

			// rangkai filename 
			$filename = $kode_buku."-".rand(1,1000).".".$extension;
			// generate nama file
			// exp : 111.989.jpg
			// rand() random nilai 1-1000

			// ambil data yang akan diedit 
			$sql = "select * from buku where kode_buku = '$kode_buku'";
			$query = mysqli_query($connect, $sql);
			$hasil = mysqli_fetch_array($query);

			if (file_exists("image/".$hasil["image"])) {
				// menghapus gambar yang sebelumnya
				unlink("image/".$hasil["image"]);
			}

			// upload gambar
			move_uploaded_file($_FILES["image"]["tmp_name"],"image/$filename");
			// sintak untuk update
			$sql = "update buku set judul='$judul', penulis='$penulis', tahun='$tahun', harga='$harga', stok='$stok', image='$filename' where kode_buku='$kode_buku'";
		} else {
			// sintak untuk update
			$sql = "update buku set judul='$judul', penulis='$penulis', tahun='$tahun', harga='$harga', stok='$stok' where kode_buku='$kode_buku'";
		}

		// // eksekusi perintah sql nya
		mysqli_query($connect, $sql);
	}

	echo $sql;
	// redirect ke halaman siswa.php
	header("location:buku.php");
}

if (isset($_GET["hapus"])) {

	$kode_buku = $_GET["kode_buku"];
	$sql = "select * from buku where kode_buku ='$kode_buku'";
	// $query = mysqli_query();

	$query = mysqli_query($connect,$sql);
	$hasil = mysqli_fetch_array($query);


	// if (file_exists("image/".hasil["image"])) {
	// 	inlink("image/".hasil["image"]);		
	// }

	if (file_exists("image/".$hasil["image"])) {
		unlink("image/".$hasil["image"]);
    }

	$sql = "delete from buku where kode_buku='$kode_buku'";
	
	mysqli_query($connect, $sql);


	// direct ke halaman data siswa
	header("location:buku.php");
}
 ?>