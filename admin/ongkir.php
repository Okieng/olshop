<h2>Ongkir</h2>

<a href="index.php?halaman=tambahongkir" class="btn btn-primary" title="">Tambah Ongkir</a><br><br>
<table id="dataTable" class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Kota</th>
			<th>Tarif</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM ongkir"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_kota'];;  ?></td>
			<td>Rp. <?php echo number_format($pecah ['tarif']);   ?></td>
			<td colspan="2">
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_ongkir']; ?>" class="btn btn-warning" title="">Edit</a>
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['id_ongkir']; ?>" class="btn btn-danger" title="">Delete</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>