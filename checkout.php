<?php 

session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Harap Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
  echo "<script>alert('Silahkan Berbelanja Terlebih Dahulu');</script>";
  echo "<script>location='shop.php';</script>";
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

<section class="konten">
  <div class="container">
    <h2>Keranjang Belanja</h2>
    <table class="table table-bordered">
      <thead style="text-align: center">
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Total</th>
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
        </tr>
        <?php $nomor++; ?>
        <?php endforeach ?>
        <tr>
          <td colspan ="4">Total Bayar</td>
          <td>Rp. <?php echo number_format ($subtotal); ?></td>
        </tr>
      </tbody>
    </table> 
    <form action="" method="POST" accept-charset="utf-8">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["telepon"] ?>" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <select name="id_ongkir" class="form-control">
              <option value="">Pilih Ongkir</option>
              <?php 
                $ambil= $koneksi->query("SELECT * FROM ongkir");
                while ($perongkir = $ambil ->fetch_assoc()){
              ?>
              <option value="<?php echo $perongkir['id_ongkir'] ?>">
                <?php echo $perongkir['nama_kota'] ?> -
                Rp. <?php echo number_format($perongkir['tarif'])  ?>
              </option>
              <?php } ?>

            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="">Alamat Pengiriman</label>
          <textarea name="alamat_pengiriman" class="form-control" rows="10"></textarea>
        </div>
      </div><br>
      <button type="" class="btn btn-beli" name="checkout">Checkout</button><br><br>
    </form>   
    <?php 

    if (isset($_POST["checkout"])) {
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
      $arrayongkir = $ambil -> fetch_assoc();
      $nama_kota = $arrayongkir['nama_kota'];
      $tarif = $arrayongkir['tarif'];


      $total_pembelian = $subtotal + $tarif; 

      //menyimpan data ke tabel pembelian
      $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
      VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

      //mendapatkan id pembelian
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

        //mendapatkan data produk berdasarkan id produk
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil -> fetch_assoc();

        $nama = $perproduk['nama_produk'];
        $harga = $perproduk ['harga_produk'];
        $subharga = $perproduk['harga_produk']* $jumlah;


        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,subharga)
          VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$subharga')");


        //update stok
        $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk = '$id_produk'");
      }


      //mengkosongkan keranjang belanja
      unset($_SESSION["keranjang"]);


      //tampilan dialihkan ke halaman nota
      echo "<script>alert('Pembelian Sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

    }

     ?>
  </div>
</section>



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