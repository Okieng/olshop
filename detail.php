<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php 

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

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

<!--main-->
<section class="konten">
	<div class="container">
    <h5>Detail Produk</h5>
    <a href="shop.php" title="" class="btn btn-detail">Kembali Ke Halaman Belanja</a><br><br>
		<div class="row">
			<div class="col-md-6">
				<img src="img/<?php echo $detail['foto_produk']; ?>" style="width:100%;">
			</div>
			<div class="col-md-6">
				<h1><?php echo $detail['nama_produk'] ?></h1>
				<p>Rp. <?php echo number_format($detail['harga_produk']); ?> </p>

        <h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>

				<form action="" method="POST" accept-charset="utf-8">
					<div class="form-group">
						<input type="number" name="jumlah" class="form-control" min="1" max="<?php echo $detail["stok_produk"]; ?>" style="width:50%;">
							<button class="btn btn-beli mt-3" name="beli" type="">Beli Produk</button>
					</div>
				</form>

				<?php 

				if (isset($_POST['beli'])) {
					//mendapat jumlah produk yang dibeli
					$jumlah = $_POST["jumlah"];
					//masukkan di keranjang belanja
					$_SESSION["keranjang"][$id_produk] = $jumlah;

					echo "<script>alert('produk telah ditambahkan ke keranjang');</script>";
					echo "<script>location='keranjang.php'</script>";
				}

				 ?>

				<p><?php echo $detail['deskripsi_produk'] ?></p>
        <ul>
          <li>Ukuran All Size : LD +-105cm, P +- 105cm </li>
          <li>Bahan rayon halus </li>
          <li>Pencucian disarankan tidak menggunakan mesin    cuci agar warna lebih awet</li>
        </ul>
			</div>
		</div>
	</div>
</section><br>
<?php include 'footer.php'; ?>
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