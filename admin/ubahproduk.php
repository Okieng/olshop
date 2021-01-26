<h2>Edit Produk</h2>

<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil -> fetch_assoc();

 ?>

 <?php 
$datakategori = array();

$ambil = $koneksi -> query("SELECT * FROM kategori");

while($tiap = $ambil -> fetch_assoc()){
	$datakategori[] = $tiap;
}

 ?>

 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
 	<div class="form-group">
		<label for="">Nama Kategori</label>
		<select name="id_kategori" class="form-control">
			<option>Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>
				
			<option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){ echo "selected"; } ?>  >
				<?php echo $value["nama_kategori"] ?>
				
			</option>
			<?php endforeach ?>
		</select>
	</div>
 	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label for="">Harga (Rp.)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah ['harga_produk']; ?>">
	</div>
	<div class="form-group">
	  	<img src="../img/<?php echo $pecah ['foto_produk'];;  ?>" style="width:20%;">
	</div>
	<div class="form-group">
	  	<label>Ganti Foto</label>
	  	<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label for="">Deskripsi</label>
		<textarea type="number" class="form-control" name="deskripsi" rows="10"><?php echo $pecah ['deskripsi_produk']; ?>
		</textarea>
	</div>
	<div class="form-group">
		<label for="">Stok</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah ['stok_produk']; ?>">
	</div>
	<button type="" class="btn btn-warning" name="ubah">Ubah</button>
 </form>

 <?php 
if (isset($_POST['ubah'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../img/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk = '$_POST[harga]',
			foto_produk ='$namafoto',
			deskripsi_produk = '$_POST[deskripsi]',
			stok_produk = '$_POST[stok]',
			id_kategori = '$_POST[id_kategori]' 
			WHERE id_produk = '$_GET[id]' ");
	}else{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk = '$_POST[harga]',
			deskripsi_produk = '$_POST[deskripsi]',
			stok_produk = '$_POST[stok]',
			id_kategori = '$_POST[id_kategori]'   
			WHERE id_produk = '$_GET[id]' ");
	}
	echo "<script>alert('data produk telah diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
  ?>