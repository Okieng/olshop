<?php include 'koneksi.php'; ?>

<?php 

$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk  LIKE '%$keyword%' OR deskripsi_produk  LIKE '%$keyword%' ");
while ($pecah = $ambil->fetch_assoc()){
	$semuadata[]=$pecah;
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
<br><br><br>
<div class="container">
	<h5>Hasil Pencarian : <?php echo $keyword; ?></h5><br>
	<a href="shop.php" title="" class="btn btn-detail">Kembali Ke Halaman Belanja</a><br><br>
	<?php if (empty($semuadata)): ?>
		<div class="alert alert-danger">
			Pencarian <?php echo $keyword; ?> tidak ditemukan
		</div>
	<?php endif ?>
	<div class="row">
		<?php foreach ($semuadata as $key => $value): ?>
			

		<div class="col-md-4">
			<div class="card" style="margin-bottom: 10%; text-align: center;">
					<div class="card-body">
						<img src="img/<?php echo $value['foto_produk']; ?>" alt="" style="width: 100%;">
						<h5 class="card-title"><?php echo $value['nama_produk']; ?></h5>
						<p class="card-text">Rp. <?php echo number_format($value['harga_produk']); ?></p>
						<a href="beli.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-beli">Tambah Ke Keranjang</a>
						<a href="detail.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-detail">Detail Produk</a>
					</div>
				</div>
		</div>

		<?php endforeach ?>

	</div>
</div>
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