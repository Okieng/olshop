

<h2>Data Transaksi</h2>

<table id="dataTable" class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>tanggal</th>
			<th>Status</th>
			<th>total</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_pelanggan'];;  ?></td>
			<td><?php echo $pecah ['tanggal_pembelian'];;  ?></td>
			<td><?php echo $pecah ['status_pembelian'];;  ?></td>
			<td><?php echo $pecah ['total_pembelian'];;  ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah ['id_pembelian']; ?>" class="btn btn-info" title="">Detail</a>

				<?php if ($pecah["status_pembelian"]!=="pending"): ?>
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah["id_pembelian"]; ?>" title="" class="btn btn-success">lihat Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>


