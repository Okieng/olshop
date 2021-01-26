<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	</style>
	<title>dosdos.id</title>
	<link rel="icon" type="image/png" href="img/iconn.png">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>
<!--main-->
<section class="konten">

	<div class="jumbotron card card-image" style="background-image: url(img/headerr.jpg); background-size: cover; text-align: right;">
		<div class="text-white text-center py-5 px-4">
			<div>
				<h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>dosdos.id</strong></h2>
				<div id="divider"></div>
				<p class="mx-5 mb-5">Daster bali gables motif bunga tangan pendek dengan warna yang cerah, Cocok untuk dipakai sehari-hari atau untuk baju tidur.
				</p>
				<a href="shop.php" class="btn btn-beli"><i class="fa fa-shopping-cart"></i> Belanja Sekarang</a>
			</div>
		</div>
	</div>
</section>

<section class="produk wow fadeInUp">
	<div class="container">
		<h4 style="text-align: center;">Featured Product</h4>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY stok_produk ASC LIMIT 6"); ?>
			<?php while ($perproduk = $ambil-> fetch_assoc()){ ?>
			<div class="col-sm-4">
				<div class="card" style="margin-bottom: 10%; text-align: center;">
					<div class="card-body">
						<img src="img/<?php echo $perproduk['foto_produk']; ?>" alt="" style="width: 100%;">
						<h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
						<p class="card-text"><?php echo $perproduk['deskripsi_produk']; ?></p>
						<p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
						<hr>
						<a href="beli.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-beli">Tambah Ke Keranjang</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-detail">Detail Produk</a>
					</div>
				</div>
			</div>
			<?php } ?>

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