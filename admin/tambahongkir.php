
<h2>Tambah Ongkir</h2>

<form action="" method="POST" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="">Nama Kota</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label for="">Tarif (Rp.)</label>
		<input type="number" class="form-control" name="tarif">
	</div>
	<button type="" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
	if (isset($_POST['save'])) {
		$koneksi ->query("INSERT INTO ongkir (nama_kota,tarif)
			VALUES ('$_POST[nama]','$_POST[tarif]')");

		echo "<div class='alert alert-info'>data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ongkir'>";
	}
 ?>
