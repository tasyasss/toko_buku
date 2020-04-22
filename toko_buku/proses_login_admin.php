<?php 
session_start();
// session_start() digunakan sebagai tanda
// kalau kita akan menggunakan session pada halaman

// session_start() harus diletakkan pada baris pertama
include ("config.php");

// tampung data username dan password
$username = $_POST["username"];
$password = $_POST["password"];

if (isset($_POST["login_admin"])) {
	$sql = "select * from admin where username = '$username' and password = '$password'";

	// eksekusi sql nya
	$query = mysqli_query($connect, $sql);
	$jumlah = mysqli_num_rows($query);
	// my_sqli_num_rows digunakan untuk menghitung jumlah data hasil dari query

	if ($jumlah > 0) {
		// jika jumlahnya lebih dari nol, artinya terdapat data admin yang
		// sesuai dengan username dan password yang diinputkan ini blok kode jika login berhasil
		$admin = mysqli_fetch_array($query);

		$_SESSION["id_admin"] = $admin["id_admin"];
		$_SESSION["nama"] = $admin["nama"];

		header("location:buku.php");		
	} else {
		// jika jumlahnya nol, admin
		header("location:login_admin.php");
	}
}

if (isset($_GET["logout"])) {
	// proses logout
	// menghapus data session yang telah dibuat
	session_destroy();
	header("location:home.php");
}
 ?>