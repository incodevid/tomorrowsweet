<?php
error_reporting(0);
session_start();
include 'config.php';
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
function tglIndonesia($str){
       $tr   = trim($str);
       $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
       return $str;
   }
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) 
 {echo "<script>;document.location='login.php' </script> ";}
else {
     
    
            $id_akun=$_SESSION['id_akun'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun where id_akun='$id_akun' ");
            $t = mysqli_fetch_assoc($sql);



            $sqlk = mysqli_query($koneksi, "SELECT *,COUNT(id_barang) AS jumlah_item FROM tb_keranjang where id_akun='$id_akun' ");
            $dataker = mysqli_fetch_assoc($sqlk);
            
        
 ?>

<!doctype html>
<html lang="en" class="grey-theme">


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/thankyou.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Notifikasi Pembayaran</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Chosen multiselect CSS -->
    <link href="vendor/chosen_v1.8.7/chosen.min.css" rel="stylesheet">

    <!-- nouislider CSS -->
    <link href="vendor/nouislider/nouislider.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="row no-gutters vh-100 loader-screen" style="background-color: grey;">
        <div class="col align-self-center text-white text-center">
            <img src="img/alfazza_4.png" height="200px" alt="logo">
            <h1><span class="font-weight-light">ALFAZZA</span> <br>HOME SHOPING</h1>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <div class="text-center">
            <div class="figure-menu shadow">
                <figure><img src="img/akun/<?php echo $t['foto']; ?>" alt=""></figure>
            </div>
            <h5 class="mb-1 "><?php echo $t['nama_akun']; ?></h5>
            <p class="text-mute small"><?php echo $t['email']; ?></p>
        </div>
        <br>
        <div class="row mx-0">
            <div class="col">                
                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                    <a href="index.php" class="list-group-item list-group-item-action">Beranda</a>
                    <a href="all_produk.php" class="list-group-item list-group-item-action">Semua Produk</a>
                    <a href="riwayat.php" class="list-group-item list-group-item-action">Riwayat Transaksi <span class="badge badge-dark text-white"></span></a>
                    <a href="profil.php" class="list-group-item list-group-item-action">Profil Saya</a>
                    <?php 
                    if($_SESSION['status_akun']=="Admin"){
                    ?>
                    <a href="tambah_foto_barang.php" class="list-group-item list-group-item-action">Tambah Foto Barang</a>
                    <a href="tambah_video_barang.php" class="list-group-item list-group-item-action">Tambah Video Barang</a>
                    <a href="orderan.php" class="list-group-item list-group-item-action">Orderan</a>
                    <?php } ?>
                    <?php 
                    if($_SESSION['status_akun']=="Super"){
                    ?>
                    <a href="tambah_foto_barang.php" class="list-group-item list-group-item-action">Tambah Foto Barang</a>
                    <a href="tambah_video_barang.php" class="list-group-item list-group-item-action">Tambah Video Barang</a>
                    <a href="orderan.php" class="list-group-item list-group-item-action">Orderan</a>
                    <?php } ?>
                    <a href="tentang.php" class="list-group-item list-group-item-action">Tentang Aplikasi</a>
                    <a href="logout.php" class="list-group-item list-group-item-action mt-4">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="img/menu.png" alt=""></button>
                </div>
                <div class="col text-center"><img src="img/alfazza_4.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <br>
                    <img src="img/thankyou-payment.png" alt="" class="mt-5 mw-100">
                    <h1 class="my-4">Terima Kasih!</h1>
                    <h5>Telah menyelesaikan pembelian di Alfazza Shop</h5>
                    <p class="text-secondary">Diharapkan segera melakukan pembayaran dalam waktu 1x24 jam.<br>Apabila pembayaran tidak dilakuan dalam waktu 1x24 jam, orderan akan dibatalkan.<br><a href="riwayat.php">Lihat Transaksi</a></p>
                    <br>
                </div>
            </div>



        </div>
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <?php
                        if($_SESSION['status_akun']=="Super"){
                        ?>
                        <div class="col-auto">
                            <a href="tambah_produk.php" class="btn btn-link-default active">
                                <i class="material-icons">add_a_photo</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tambah_detail.php" class="btn btn-link-default active">
                                <i class="material-icons">add_to_photos</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="orderan.php" class="btn btn-default shadow centerbutton active">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tambah_kategori.php" class="btn btn-link-default active">
                                <i class="material-icons">style</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tambah_akun.php" class="btn btn-link-default active">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                    <?php } ?>
                        <?php 
    if($_SESSION['status_akun']=="Admin"){
        
        ?>
                        <div class="col-auto">
                            <a href="all_produk.php" class="btn btn-link-default active">
                                <i class="material-icons">store_mall_directory</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tambah_produk.php" class="btn btn-link-default active">
                                <i class="material-icons">add_a_photo</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="keranjang.php" class="btn btn-default shadow centerbutton active">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="riwayat.php" class="btn btn-link-default active">
                                <i class="material-icons">chat</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tambah_detail.php" class="btn btn-link-default active">
                                <i class="material-icons">add_to_photos</i>
                            </a>
                        </div>
                        <?php }?>
                        <?php 
                    if($_SESSION['status_akun']=="Member"){
                        
                        ?>
                        <div class="col-auto">
                            <a href="all_produk.php" class="btn btn-link-default active">
                                <i class="material-icons">store_mall_directory</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="tentang.php" class="btn btn-link-default">
                                <i class="material-icons">help_center</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="keranjang.php" class="btn btn-default shadow centerbutton">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="riwayat.php" class="btn btn-link-default">
                                <i class="material-icons">chat</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="profil.php" class="btn btn-link-default">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>     <script src="vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- cookie js -->     <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- nouislider js -->
    <script src="vendor/nouislider/nouislider.min.js"></script>

    <!-- chosen multiselect js -->
    <script src="vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>
</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/thankyou.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:47 GMT -->
</html>
