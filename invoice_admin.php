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


            $kode_orderan = $_GET['kode_orderan'];
            $sqlk = mysqli_query($koneksi, "SELECT *,SUM(subtotal_beli) AS total FROM tb_orderan a INNER JOIN tb_akun b ON a.id_akun=b.id_akun WHERE  kode_orderan='$kode_orderan' ");
            $dataodr = mysqli_fetch_assoc($sqlk);

            $total1 = $dataodr['total'] + $dataodr['tarif_paket'];
            
        
 ?>

<!doctype html>
<html lang="en" class="grey-theme">


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/thankyou.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>INVOICE</title>

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

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

    <!-- Poppins fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
    min-height: 100%;
    height: auto;
    overflow-y: auto;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 22px;
    -webkit-overflow-scrolling: touch;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    </style>

    <style type="text/css">
        .header-logo {
    height: 30px;
    max-height: 48px;
    display: inline-block;
    vertical-align: middle;
    margin: 15px auto 0px auto;
}
    </style>


</head>

<body>
    <div class="row no-gutters vh-100 loader-screen" style="background-color: grey;">
        <div class="col align-self-center text-white text-center">
            <img src="img/logo-TS-white.png" height="200px" alt="logo">
            <h1><span class="font-weight-light">Tomorrow Sweet</span> <br>STORE</h1>
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
                    <a href="orderan.php" class="btn  btn-link text-dark"><i class="material-icons">navigate_before</i></a>
                </div>
                <div class="col text-center"><img src="img/logo-TS-head-01.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="invoice-box">
<table cellpadding="0" cellspacing="0" >
<tr class="top">
<td colspan="2">
<table>
<tr>
<td class="title">
<a style="float:right;" href="cetak_admin.php?kode_orderan=<?php echo $dataodr['kode_orderan']; ?>" target="_BLANK" class="btn  btn-link text-dark"><i class="material-icons">get_app</i></a>
<img src="img/logo-TS.png" style="width:100%; max-width:300px;">
</td>
<td>
Kode Pesanan #: <b><?php echo $dataodr['kode_orderan']; ?></b><br>
Tanggal Pesanan: <?php echo $dataodr['tgl_pesanan']; ?><br>
Bank Pembayaran: <b><?php echo $dataodr['bank_bayar']; ?></b><br>
</td>
</tr>
</table>
</td>
</tr>
<tr class="information">
<td colspan="2">
<table>
<tr>
<td align="left" >
<?php echo $dataodr['nama_akun']; ?><br>
<?php echo $dataodr['nomor_hp']; ?><br>
<?php echo $dataodr['email']; ?><br>
<?php echo $dataodr['alamat']; ?><br>
<?php echo $dataodr['nm_prov']; ?><br>
<?php echo $dataodr['nm_kab']; ?><br>
<?php echo $dataodr['kecamatan']; ?><br>
<?php echo $dataodr['kelurahan']; ?> - <?php echo $dataodr['kode_pos']; ?>
</td>
<td>
Owner Shop<br>
Benny Sarmoko<br>
benny54121@gmail.com<br>
Tomorrow Sweet STORE<br>
Jl. Tingang XV No.01<br>
Kalimantan Tengah<br>
Palangka Raya<br>
Jekan Raya<br>
Palangka - 73112<br>
</td>
</tr>
</table>
</td>
</tr>
</table>

<table width="60px" cellpadding="0" cellspacing="0" >
<tr class="heading"  >
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Nama
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Warna
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Jumlah
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Berat
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Harga
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Subtotal
</td>
</tr>
        <?php
            function harga($rp){
            $harga = number_format ($rp, 0, ',', '.');
            return "Rp.".$harga;
            }

            $kode_orderan = $_GET['kode_orderan'];
            $sqlkodr = mysqli_query($koneksi, "SELECT * FROM tb_orderan WHERE  kode_orderan='$kode_orderan' ");
            while($dataodr1 = mysqli_fetch_assoc($sqlkodr)){
        ?>
<tr class="item">
<td  align="left" valign="center" style="line-height: 1.5;font-size: 9px;">
<?php echo $dataodr1['nama_barang']; ?>
</td>
<td align="center" valign="center" style="white-space:wrap;font-size: 9px;">
<?php echo $dataodr1['warna_beli']; ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo $dataodr1['stok_beli']; ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo $dataodr1['berat_barang']; ?>(gr)
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo harga($dataodr1['harga_barang']) ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo harga($dataodr1['subtotal_beli']) ?>
</td>
</tr>
<?php } ?>
</table>
<table>
<tr class="total" align="right">
<td></td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Jumlah Subtotal: <?php echo harga($dataodr['total']) ?><br>
Ekspedisi: <a style="text-transform: uppercase;"><?php echo $dataodr['ekspedisi']; ?></a><br>
Paket: <?php echo $dataodr['paket_kurir']; ?>-<?php echo harga($dataodr['tarif_paket']) ?><br>
Total: <?php echo harga($total1) ?>
</td>
</tr>
</table>
</div>
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>
</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/thankyou.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:47 GMT -->
</html>
