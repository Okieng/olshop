<h2>Data Pembayaran</h2>
<?php 

//mendapatkan id pembelian
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian ='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered">
				<tr>
					<td>Nama</td>
					<td><?php echo $detail ["nama"] ?></td>
				</tr>
				<tr>
					<td>Bank</td>
					<td><?php echo $detail ["bank"] ?></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>Rp. <?php echo number_format($detail["jumlah"]) ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td><?php echo $detail ["tanggal"] ?></td>
				</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../bukti/<?php echo $detail["bukti"]?>" style="width:100%;">
	</div>
</div>	

<form action="" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="">No Resi</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Status</label>
		<select name="status" class="form-control">
			<option value="">Pilih Status</option>
			<option value="Lunas">Lunas</option>}
			<option value="Barang Dikirim">Barang Dikirim</option>}
			<option value="Batal">Batal</option>}
		</select>
	</div>
	<button type="" class="btn btn-primary" name="proses">Proses</button>
</form>

<?php 

if (isset($_POST["proses"])) {
	
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi' , status_pembelian ='$status' WHERE id_pembelian ='$id_pembelian'");

	echo "<script>alert('Data Pembelian Terupdate');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}

 ?>