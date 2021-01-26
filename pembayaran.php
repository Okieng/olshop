<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script";
}


//mendapatkan id dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$datpem = $ambil-> fetch_assoc();

//mendapatkan id pelanggan yang beli
$id_pelanggan_beli = $datpem["id_pelanggan"];

//mendapatkan id pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
	
	echo "<script>location='riwayat.php';</script";
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>dosdos.id</title>
	<link rel="icon" type="image/png" href="img/icon.png">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<?php include 'nav.php'; ?>


<!--main-->
<section class="konten">
	<div class="container">
		<h3>Konfirmasi Pembayaran</h3>
		<div class="alert alert-info">Tagihan Anda <strong>Rp. <?php echo number_format($datpem["total_pembelian"]); ?></strong>, Kirim Bukti Pembayaran Anda</div>
		<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label for="">Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label for="">Jumlah(Rp.)</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>
			<div class="form-group">
				<label for="">Foto</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">Bukti Transfer Harus Dalam Berbentuk JPG Maksimal 2MB</p>
			</div>
			<button type="" class="btn btn-detail" name="kirim" >Kirim</button>
		</form><br>
	</div>

	<?php 
	if (isset($_POST["kirim"])) {
		//upload dulu foto bukti
		$namabukti = $_FILES["bukti"]["name"]; 
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "bukti/$namafiks");

		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");

		//simpan pembayaran
		$koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) 
			VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

		//update status pembayaran
		$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Melakukan Pembayaran' WHERE id_pembelian='$idpem'");

		echo "<script>alert('Bukti Pembayaran Telah Dikirim');</script>";
		echo "<script>location='riwayat.php';</script>";
	}
	?>

</section>


<!-- Footer -->
<footer class="page-footer font-small blue fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="facebook.com/shokieng.123123" style="color: white">Prayogi Sukmana</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="js/wow.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script>
		$('.carousel').carousel({
			interval: 2000
		})
	</script>
</html>