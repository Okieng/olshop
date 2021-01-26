<?php $ambil = $koneksi->query("SELECT * FROM admin"); ?>
<?php while($pecah = $ambil -> fetch_assoc()){ ?>
	
		<marquee><h2>Selamat datang <?php echo $pecah ['nama_lengkap'];;  ?></h2></marquee>

	
<?php } ?>

