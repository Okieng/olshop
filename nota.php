<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
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
<?php include 'nav.php'; ?><br>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil -> fetch_assoc();
 ?>


<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login , maka dilarikan ke riwayat-->
<?php 
//mendapat id pelanggan yang beli
$idpelangganyangbeli = $detail["id_pelanggan"]; 

//mendapatkan id pelanggan yang login
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
	echo "<script>location='riwayat.php';</script>";
}

?>


<!--main-->
<section class="konten">
	<div class="container">

		<?php 
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
		$detail = $ambil -> fetch_assoc();
		?>



		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<p style="text-align: center">Silahkan Transfer <strong> Rp. <?php echo number_format( $detail ['total_pembelian']); ?></strong> Ke <strong>BANK BCA 861-002245-2311 A/N Prayogi Sukmana</strong></p>
					<p style="text-align: center">Harap transfer terlebih dahulu , sebelum melakukan konfirmasi pembayaran</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 text-center">
				<h3>Data Pelanggan</h3>
				<p>Nama : <?php echo $detail['nama_pelanggan']; ?></p>
				<p>
					Email : <?php echo $detail['email_pelanggan']; ?>
				</p>
				<p>
					No Telepon : <?php echo $detail['telepon']; ?>
				</p>
			</div>
			<div class="col-md-4 text-center">
				<h3>Data Pengiriman</h3>
				<p>Kota : <?php echo $detail['nama_kota']; ?></p>
				<p>
					Ongkir : Rp. <?php echo number_format( $detail['tarif']); ?>
				</p>
				<p>Alamat : <?php echo $detail['alamat_pengiriman']; ?></p>
			</div>
			<div class="col-md-4 text-center">
				<h3>Data Pembelian</h3>
				<p>No. Pembelian : <?php echo $detail['id_pembelian']; ?></p>
				<p>
					Tanggal : <?php echo $detail['tanggal_pembelian']; ?>
				</p>
				<p>
					Total : Rp. <?php echo number_format ($detail['total_pembelian']); ?>
				</p>
			</div>
		</div>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>nama produk</th>
					<th>harga</th>
					<th>jumlah</th>
					<th>subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'") ?>
				<?php while ($pecah = $ambil -> fetch_assoc()){ ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama']; ?></td>
						<td>Rp. <?php echo number_format( $pecah['harga']); ?></td>
						<td><?php echo $pecah['jumlah']; ?></td>
						<td>
							Rp. <?php echo number_format($pecah['subharga']) ; ?>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
		<a href="riwayat.php" class="btn btn-beli" title="">
			Konfirmasi Pembayaran
		</a>
	</div>

</section><br>


<!-- Footer -->
<footer class="page-footer font-small blue fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="facebook.com/shokieng.123123" style="color: white">Prayogi Sukmana</a>
  </div>
  <!-- Copyright -->

</footer>
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