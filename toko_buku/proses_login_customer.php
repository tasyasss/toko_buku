<?php 
session_start();
// session_start() digunakan sebagai tanda
// kalau kita akan menggunakan session pada halaman

// session_start() harus diletakkan pada baris pertama
include ("config.php");

// tampung data username dan password
$username = $_POST["username"];
$password = $_POST["password"];

if (isset($_POST["login_customer"])) {
	$sql = "select * from customer where username = '$username' and password = '$password'";

	// eksekusi sql nya
	$query = mysqli_query($connect, $sql);
	$jumlah = mysqli_num_rows($query);
	// my_sqli_num_rows digunakan untuk menghitung jumlah data hasil dari query

	if ($jumlah > 0) {
		// jika jumlahnya lebih dari nol, artinya terdapat data customer yang
		// sesuai dengan username dan password yang diinputkan ini blok kode jika login berhasil
		$customer = mysqli_fetch_array($query);

		$_SESSION["id_customer"] = $customer["id_customer"];
		$_SESSION["nama"] = $customer["nama"];
		$_SESSION["cart"] = array();

		header("location:index_customer.php");		
	} else {
		// jika jumlahnya nol, customer akan dikembalikan ke halaman login
		header("location:login_customer.php");
	}
}

if (isset($_GET["logout"])) {
	// proses logout
	// menghapus data session yang telah dibuat
	session_destroy();
	header("location:home.php");
}
 ?>