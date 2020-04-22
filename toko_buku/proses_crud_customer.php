 <?php 
 // load file config.php
	include ("config.php");

if (isset($_POST["save_customer"])) {
	// isset digunakan untuk menecek apakah ketika mengakses file ini, dikirimkan data dengan nama "save_customer" dg method POST

	// kita tampung data yang dikirimkan
	$action = $_POST["action"];
	$id_customer = $_POST["id_customer"];
	$nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$kontak = $_POST["kontak"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	// cek aksi 
	if ($action == "insert") {
		// sintak untuk insert
		$sql = "insert into customer values('$id_customer', '$nama', '$alamat', '$kontak', '$username', '$password')";
		
		// eksekusi perintah sql
		mysqli_query($connect, $sql);

	} elseif ($action == "update") {
		// ambil data yang akan diedit 
			$sql = "select * from customer where id_customer = '$id_customer'";
			$query = mysqli_query($connect, $sql);
			$hasil = mysqli_fetch_array($query);

		// sintak untuk update
			$sql = "update customer set nama='$nama', alamat='$alamat', kontak='$kontak', username='$username', password='$password' where id_customer='$id_customer'";

		// eksekusi perintah sql nya
		mysqli_query($connect, $sql);
	}

	echo $sql;
	// redirect ke halaman siswa.php
	header("location:customer.php");
}

if (isset($_GET["hapus"])) {

	$id_customer = $_GET["id_customer"];
	$sql = "select * from customer where id_customer ='$id_customer'";
	// $query = mysqli_query();

	$query = mysqli_query($connect,$sql);
	$hasil = mysqli_fetch_array($query);
	

	$sql = "delete from customer where id_customer='$id_customer'";
	
	mysqli_query($connect, $sql);


	// direct ke halaman data siswa
	header("location:customer.php");
}
 ?>