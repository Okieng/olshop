<h2>Edit Ongkir</h2>

<?php 

$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah = $ambil -> fetch_assoc();

 ?>

 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
 	<div class="form-group">
		<label for="">Nama Kota</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_kota']; ?>">
	</div>
	<div class="form-group">
		<label for="">Tarif (Rp.)</label>
		<input type="number" class="form-control" name="tarif" value="<?php echo $pecah ['tarif']; ?>">
	</div>
	<button type="" class="btn btn-warning" name="ubah">Ubah</button>
 </form>

 <?php 
if (isset($_POST['ubah'])) {
	$koneksi->query("UPDATE ongkir SET nama_kota='$_POST[nama]',
			tarif = '$_POST[tarif]'
			WHERE id_ongkir = '$_GET[id]' ");

	echo "<script>alert('data ongkir telah diubah');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
}
  ?>