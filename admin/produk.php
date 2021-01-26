<h2>Produk</h2>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary" title="">Tambah Produk</a><br><br>
<table id="dataTable" class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th>no</th>
			<th>Kategori</th>
			<th>nama</th>
			<th>harga</th>
			<th>gambar</th>
			<th>deskripsi</th>
			<th>Stok</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['nama_kategori'];;  ?></td>
			<td><?php echo $pecah ['nama_produk'];;  ?></td>
			<td>Rp. <?php echo number_format($pecah ['harga_produk']);   ?></td>
			<td>
				<img src="../img/<?php echo $pecah ['foto_produk'];;  ?>" width="100">
			</td>
			<td><?php echo $pecah ['deskripsi_produk'];;  ?></td>
			<td><?php echo $pecah ['stok_produk'];;  ?></td>
			<td colspan="2">
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning" title="">Edit</a>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger" title="">Delete</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

        <script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
        </script>