<?php 
	function tambah()
{
	global $conn;
	// sesuaiin sama name yg di form
	$nama_produk = $_POST['nama_produk'];
	$harga_produk = $_POST['harga_produk'];
	$foto_produk = $_POST['foto_produk'];
	$deskripsi_produk = $_POST['deskripsi'];

	mysqli_query($conn, "INSERT INTO barang VALUES ('$nama_produk','$harga_produk','$foto_produk','$deskripsi_produk')");
	//header("Location:tampil2.php");
	

}
?>