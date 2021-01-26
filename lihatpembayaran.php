<?php 

session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script";
}
$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

//jika blm ada data pembayaran
if (empty($detbay)) {
	echo "<script>alert('Belum Ada Data Pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}

//jika data pembayaran tidak sesuai dengan login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]) {
	echo "<script>alert('404');</script>";
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
		<h3>Lihat Pembayaran</h3>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-dark">
						<tr>
							<td>Nama</td>
							<td><?php echo $detbay["nama"];?></td>
						</tr>
						<tr>
							<td>Bank</td>
							<td><?php echo $detbay["bank"];?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td><?php echo $detbay["tanggal"];?></td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td>Rp. <?php echo number_format( $detbay["jumlah"]);?></td>
						</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="bukti/<?php echo $detbay["bukti"]?>" alt="" style="width:100%;">
			</div>
		</div>
	</div>
</section>
<!-- Footer -->
<footer class="page-footer font-small blue">

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


