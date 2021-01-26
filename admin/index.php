<?php 
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","atol");

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>location('login.php');</script>";
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>dosdos.id | Admin</title>
        <link rel="icon" type="image/png" href="../img/iconn.png">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: #f67280 !important;">
            <a class="navbar-brand" href="index.html">dosdos.id</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->

            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php?halaman=logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:#355c7d  !important;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="index.php?halaman=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="index.php?halaman=produk">
                                <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                                Produk
                            </a>
                            <a class="nav-link" href="index.php?halaman=pembelian">
                                <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link" href="index.php?halaman=pelanggan">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="index.php?halaman=ongkir">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                                Ongkir
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php 
                            if (isset($_GET['halaman'])) {
                                if ($_GET['halaman']=="produk") {
                                    include 'produk.php';
                                }elseif ($_GET['halaman']=="pembelian") {
                                    include 'pembelian.php';
                                }elseif ($_GET['halaman']=="pelanggan") {
                                    include 'pelanggan.php';
                                }elseif ($_GET['halaman']=="detail") {
                                    include 'detail.php';
                                }elseif ($_GET['halaman']=="tambahproduk") {
                                    include 'tambahproduk.php';
                                }elseif ($_GET['halaman']=="hapusproduk") {
                                    include 'hapusproduk.php';
                                }elseif ($_GET['halaman']=="ubahproduk") {
                                    include 'ubahproduk.php';
                                }elseif ($_GET['halaman']=="tambahpelanggan") {
                                    include 'tambahpelanggan.php';
                                }elseif ($_GET['halaman']=="hapuspelanggan") {
                                    include 'hapuspelanggan.php';
                                }elseif ($_GET['halaman']=="logout") {
                                    include 'logout.php';
                                }elseif ($_GET['halaman']=="pembayaran") {
                                    include 'pembayaran.php';
                                }elseif ($_GET['halaman']=="ongkir") {
                                    include 'ongkir.php';
                                }elseif ($_GET['halaman']=="tambahongkir") {
                                    include 'tambahongkir.php';
                                }elseif ($_GET['halaman']=="ubahongkir") {
                                    include 'ubahongkir.php';
                                }elseif ($_GET['halaman']=="hapusongkir") {
                                    include 'hapusongkir.php';
                                }elseif ($_GET['halaman']=="kategori") {
                                    include 'kategori.php';
                                }
                            }else{
                                include 'home.php';
                            }
                         ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; dosdos.id 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    </body>
</html>
