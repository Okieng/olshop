
<h2>Tambah Pelanggan</h2>

<form action="" method="post" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="">Email : </label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label for="">Password : </label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label for="">Nama Lengkap : </label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label for="">Nomor Telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	<button type="" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
	if (isset($_POST['save'])) {
		$koneksi ->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon)
			VALUES ('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]')");

		echo "<div class='alert alert-info'>data tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
	}
 ?>



