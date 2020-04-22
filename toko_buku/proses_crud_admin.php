 <?php 
 // load file config.php
	include ("config.php");

if (isset($_POST["save_admin"])) {
	// isset digunakan untuk menecek apakah ketika mengakses file ini, dikirimkan data dengan nama "save_admin" dg method POST

	// kita tampung data yang dikirimkan
	$action = $_POST["action"];
	$id_admin = $_POST["id_admin"];
	$nama = $_POST["nama"];
	$kontak = $_POST["kontak"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	
	// cek aksi 
	if ($action == "insert") {
		// sintak untuk insert
		$sql = "insert into admin values('$id_admin', '$nama', '$kontak', '$username', '$password')";

		
		// eksekusi perintah sql
		mysqli_query($connect, $sql);

	} elseif ($action == "update") {
		// ambil data yang akan diedit 
			$sql = "select * from admin where id_admin = '$id_admin'";
			$query = mysqli_query($connect, $sql);
			$hasil = mysqli_fetch_array($query);

		// sintak untuk update
			$sql = "update admin set nama='$nama', kontak='$kontak', username='$username', password='$password' where id_admin='$id_admin'";


		// eksekusi perintah sql nya
		mysqli_query($connect, $sql);
	}

	echo $sql;
	// redirect ke halaman siswa.php
	header("location:admin.php");
}

if (isset($_GET["hapus"])) {

	$id_admin = $_GET["id_admin"];
	$sql = "select * from admin where id_admin ='$id_admin'";
	// $query = mysqli_query();

	$query = mysqli_query($connect,$sql);
	$hasil = mysqli_fetch_array($query);


	$sql = "delete from admin where id_admin='$id_admin'";
	
	mysqli_query($connect, $sql);


	// direct ke halaman data siswa
	header("location:admin.php");
}
 ?>