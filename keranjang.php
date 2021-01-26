<?php 
session_start();

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
	<?php include 'nav.php'; ?>
<br>
<!--main-->
<section class="konten">
	<div class="container">
    <h3>Keranjang Belanja</h3>
		<table class="table table-bordered">
			<thead style="text-align: center">
        <?php 
        if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
          error_reporting(0);
          echo "<h5>Data Keranjang Anda Kosong</h5>";
        }

        ?>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php $subtotal = 0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<!--menampilkan looping-->
				<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
					$pecah = $ambil -> fetch_assoc();
					$total = $pecah["harga_produk"]*$jumlah;
					$subtotal += $total ;
				?>
				<tr style="text-align: center;">
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($total); ?></td>
          <td><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
				<tr>
					<td colspan ="5">Total Bayar</td>
					<td>Rp. <?php echo number_format ($subtotal); ?></td>
				</tr>
				<tr>
					<td colspan="5"><a href="shop.php" class="btn btn-detail" title="">Lanjutkan Belanja</a></td>
					<td><a href="checkout.php" class="btn btn-beli" title="">Checkout</a></td>
				</tr>
			</tbody>
		</table>		
	</div>
</section><br><br><br>
<!--end main-->
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

</html>