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
            
        
 ?>
<!doctype html>
<html lang="en" class="grey-theme">


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/notification.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:27:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Riwayat Transaksi </title>

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
                <div class="col-12 px-0">
                    <div class="list-group list-group-flush my-3">
                        <?php
                        $sql2 = mysqli_query($koneksi,"SELECT *,COUNT(kode_orderan) AS jumlah_item FROM tb_orderan WHERE id_akun='$id_akun'");
                        $data2 = mysqli_fetch_assoc($sql2);
                        if($data2['jumlah_item'] > "0"){

                        ?>

                        <?php
                        function harga($rp){
                        $harga = number_format ($rp, 0, ',', '.');
                        return "Rp.".$harga;
                        }



                        $hari_ini = date("Y-m");
                        $sql = mysqli_query($koneksi,"SELECT *,SUM(subtotal_beli) AS total,COUNT(foto_bukti) AS jml_foto,SUBSTR(kode_orderan,14) AS kode_odr FROM tb_orderan WHERE id_akun='$id_akun' AND LEFT(tgl_pesanan, 7)='$hari_ini' GROUP BY kode_orderan ");
                        while($data = mysqli_fetch_assoc($sql)){

                            $total = $data['total'] + $data['tarif_paket'];

                        ?>
                        <a  class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-2 text-dark">Transaksi pada tanggal</h6>
                                <small class="text-muted"><?php echo $data['tgl_pesanan']; ?></small>
                            </div>
                            <small class="text-muted">Kode Transaksi: <b><u onclick="window.location='invoice.php?kode_orderan=<?php echo $data['kode_orderan']; ?>'"><?php echo $data['kode_orderan']; ?></u></b></small><br>
                            <small class="text-muted">Status Transaksi: <b><?php echo $data['status_beli']; ?></b></small><br>
                            <small class="text-muted">Total Pembayaran: <b><?php echo harga($total) ?></b></small><br>
                            <small class="text-muted">Bank Pembayaran: <b><?php echo $data['bank_bayar']; ?></b></small><br>
                            <?php
                            if($data['jml_foto']=="0"){
                            ?>
                            <small class="text-muted">Bank Pembayaran: <b data-toggle="modal" data-target="#LihatBank<?php echo $data['kode_odr']; ?>">Lihat</b></small><br>
                            <small class="text-muted"><b data-toggle="modal" data-target="#KonfirBeli<?php echo $data['kode_odr']; ?>" class="btn  btn-default text-white  btn-rounded shadow" style="float:right;font-size: 11px;padding: 8px 9px;">Konfirmasi Pembayaran</b></small>
                            <?php } else { ?>
                                <img src="img/foto_bukti/<?php echo $data['foto_bukti']; ?>" align="center" style="height: 200px;display: block; margin: auto;">
                            <?php } ?>
                            <?php
                            if($data['status_beli']=="Pesanan Dikirim"){
                            ?>
                            <small class="text-muted">No. Resi: <b><u><?php echo $data['no_resi']; ?></u></b></small><br>
                            <small class="text-muted" >
                            <a class="list-group-item btn  btn-default text-white  btn-rounded shadow"  style="font-size: 11px;padding: 8px 9px;" href="https://wa.me/send?phone=6285248663206&text=Nama: <?php echo $_SESSION['nama_akun'] ?>, Kode Orderan: <?php echo $data['kode_orderan'] ?>, PESANAN SUDAH TIBA">Konfirmasi Pesanan Tiba</a>
                            </small><br>
                            <?php } else { ?>
                            <?php } ?>
                        </a>
                        <?php } ?>
                        
                        <?php }else{ ?>

                            <center><h5 class="my-3">Belum Ada Riwayat Transaksi</h5></center>
                        <img src="img/keranjang_ksg.png" align="center" style="height: 200px;display: block; margin: auto;">


                        <?php } ?>
                            
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

    <!-- Modal Konfirmasi -->
    <?php
                        $hariini = date("Y-m");
                        $sql1 = mysqli_query($koneksi,"SELECT *,SUBSTR(kode_orderan,14) AS kode_odr FROM tb_orderan WHERE id_akun='$id_akun' AND LEFT(tgl_pesanan, 7)='$hariini' GROUP BY kode_orderan ");
                        while($data1 = mysqli_fetch_assoc($sql1)){
                        ?>
    <div class="modal fade" id="KonfirBeli<?php echo $data1['kode_odr']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Konfirmasi Pembayaran</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/akun/<?php echo $t['foto']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $t['nama_akun']; ?></h5>
                    
                    <small>Kode Transaksi :<b> <?php echo $data1['kode_orderan']; ?></b></small>
                    
                    <form  class="was-validated" action="aksi/konfirmasi_bayar/tambah_foto.php?kode_orderan=<?php echo $data1['kode_orderan']; ?>" method="POST" enctype="multipart/form-data">
                    
                    <div class="custom-file">
                            <br>
                            <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file foto!')" oninput="setCustomValidity('')"  required >
                            <div class="invalid-feedback">Foto / Screenshot belum di pilih.</div>
                    </div>
                    <br><br>
                    <div class="text-center">
                        <button type="submit"  class="btn btn-default btn-rounded btn-block col">SIMPAN</button>
                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Lihat Rek Bank -->
    <?php
    

    $hariini = date("Y-m");
    $sql1 = mysqli_query($koneksi,"SELECT *,SUM(subtotal_beli) AS total,SUBSTR(kode_orderan,14) AS kode_odr FROM tb_orderan WHERE id_akun='$id_akun' AND LEFT(tgl_pesanan, 7)='$hariini' GROUP BY kode_orderan ");
    while($data1 = mysqli_fetch_assoc($sql1)){

        $total = $data1['total'] + $data1['tarif_paket'];
    ?>
    <div class="modal fade" id="LihatBank<?php echo $data1['kode_odr']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Nomor Rek Bank Pembayaran</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                   
                        <?php
                        if($data1['bank_bayar']=="BCA"){
                        ?>
                        <img src="img/bca.png" style="width: 200px;" >
                        <?php }else{ ?>
                        <img src="img/bri.png"  style="width: 100px;" >
                        <?php } ?>
                    <br>
                    <small>Kode Transaksi :<b> <?php echo $data1['kode_orderan']; ?></b></small><br>
                    <small>Total Pembayaran: <b><?php echo harga($total) ?></b></small><br>
                    <?php
                    if($data1['bank_bayar']=="BCA"){
                    ?>
                    <small>No. Rek: <b>(<?php echo $data1['bank_bayar']; ?>)-6575110481 a/n Benny Sarmoko</b></small>
                    <?php }else{ ?>
                    <small>No. Rek: <b>(<?php echo $data1['bank_bayar']; ?>)-225601007248507 a/n Benny Sarmoko</b></small>
                    <?php } ?>
                   
                    
                    
                    <br><br>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Tutup</button>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
<?php } ?>


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


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/notification.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:27:40 GMT -->
</html>
