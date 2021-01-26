<?php 

session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script";
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
<section class="riwayat">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>
		<table class="table table-bordered" style="text-align: center">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$nomor = 1;

				//mendapat idpelanggan dari login session
				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
				$ambil = $koneksi -> query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
				while ($pecah = $ambil -> fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah ["tanggal_pembelian"] ?></td>
					<td><?php echo $pecah ["status_pembelian"] ?>
						<br>
						<?php if (!empty($pecah["resi_pengiriman"])): ?>
							Resi : <?php echo $pecah["resi_pengiriman"]; ?>
						<?php endif ?>
					</td>
					<td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
					<td colspan="2">
						<a href="nota.php?id=<?php echo $pecah ["id_pembelian"] ?>" class="btn btn-detail" title="">Nota</a>

						<?php if ($pecah["status_pembelian"]=="pending"): ?>
						<a href="pembayaran.php?id=<?php echo $pecah ["id_pembelian"]?>" class="btn btn-beli" title="">
							Konfirmasi Pembayaran
						</a>
						<?php else: ?>
							<a href="lihatpembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" title="" class="btn btn-beli">Lihat Pembayaran</a>
						<?php endif ?>

					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small blue fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="facebook.com/shokieng.123123" style="color: white">Prayogi Sukmana</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!-- Footer -->
<script src="https://kit.fontawesome.com/19970ecf48.js" crossorigin="anonymous"></script>

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



 