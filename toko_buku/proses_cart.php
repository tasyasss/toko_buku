<?php 
session_start();
include ("config.php");

// menambah barang ke caart
if (isset($_POST["add_to_cart"])) {
	// tampung koda_buku dan jumlah_beli
	$kode_buku = $_POST["kode_buku"];
	$jumlah_beli = $_POST["jumlah_beli"];

	// ambil data buku dari database
	$sql = "select * from buku where kode_buku='$kode_buku'";
	// eksekusi sintak
	$query = mysqli_query($connect, $sql);
	// tampung data dari database ke array
	$buku = mysqli_fetch_array($query);

	$item = [
		"kode_buku" => $buku["kode_buku"],
		"judul" => $buku["judul"],
		"image" => $buku["image"],
		"harga" => $buku["harga"],
		"jumlah_beli" => $jumlah_beli
	];

	// masukkan item ke keranjang
	array_push($_SESSION["cart"], $item);

	header("location:index_customer.php");
}

// mehapus item pada cart
if (isset($_GET["hapus"])) {
	// tampung data kode_buku yg dihapus
	$kode_buku = $_GET["kode_buku"];

	// cari indec cart sesuai yg kode_buku yg dihapus
	$index = array_search(
		$kode_buku, array_column(
			$_SESSION["cart"], "kode_buku"
		)
	);

	// hapus item pada cart
	array_splice($_SESSION["cart"], $index, 1);
	header("location:cart.php");
}

// checkout
if (isset($_GET["checkout"])) {
	// memasukkan data pada cart ke database
	// (tabel transaksi dan detail transaksi)
	// transaksi => id transaksi, tgl, id_customer
	// detail => id_transalsi, kode_buku, jumlah, harga_beli

	$id_transaksi = "ID".rand(1,10000);
	$tgl = date("Y-m-d H:i:s");
	// year month day, hours minute second

	$id_customer= $_SESSION["id_customer"];

	// buat query
	$sql = "insert into transaksi values ('$id_transaksi', '$tgl', '$id_customer')";
	mysqli_query($connect, $sql);

	foreach ($_SESSION["cart"] as $cart) {
		$kode_buku = $cart["kode_buku"];
		$jumlah = $cart["jumlah_beli"];
		$harga = $cart["harga"];
	
	// membuat query insert ke tabel detail
		$sql = "insert into detail_transaksi values (
		'$id_transaksi', '$kode_buku', '$jumlah', '$harga'
		)";

		mysqli_query($connect, $sql);

		$sql2 = "update buku set stok = stok - $jumlah where kode_buku='$kode_buku'";
		mysqli_query($connect, $sql2);		
	}
	// kosongkan cartnya
	$_SESSION["cart"]=array();
	header("location:transaksi.php");
}
 ?>