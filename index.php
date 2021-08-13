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
 {echo "<script>;document.location='intro.php' </script> ";}
else {
     
    
            $id_akun=$_SESSION['id_akun'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun where id_akun='$id_akun' ");
            $t = mysqli_fetch_assoc($sql);
            
        
 ?>
<!doctype html>
<html lang="en" class="grey-theme">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="alfazza" content="alfazza">

    <title>Tomorrow Sweet | STORE</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css">
        .loader-screen {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 99;
    background-color: #ffffff;
}
    </style>
    
    <script src="js/angular.min.js"></script>

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

<body oncontextmenu="return false">
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
                    <a href="riwayat.php" class="list-group-item list-group-item-action">Riwayat Transaksi</a>
                    <a href="keranjang.php" class="list-group-item list-group-item-action">Keranjang Belanja</a>
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
                <div class="col text-center"><img src="img/logo-TS-head-01.png" alt="" class="header-logo" ></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <!--PENCARIAN PRODUK-->
            <form method="POST" role="form">
            <input type="text" class="form-control form-control-lg search my-3" name="txtCountry" id="txtCountry" placeholder="Cari Barang Disini" autocomplete="off">
            </form>

            <h6 class="subtitle">Kategori</h6>
            <div class="row">
                <!-- Swiper -->
                <div class="swiper-container small-slide">
                    <div class="swiper-wrapper">
                        <?php 
$query1 = mysqli_query($koneksi,"SELECT * FROM  tb_kategori ");
while($data  = mysqli_fetch_assoc($query1)){
    if($data['id_kategori'] > "0"){
?>
                        <div class="swiper-slide" >
                            <div class="card shadow-sm border-0" style="background-image:url(img/kategori/<?php echo str_replace('', '%20', $data[foto_kategori] ) ?>);background-repeat: no-repeat;width: 100%;height: 100%;background-size: 100%;">
                                <div class="card-body">
                                    <div class="row no-gutters h-100" >
                                        <div class="col-12">
                                            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18"></i></button>
                                            <a  class="badge badge-warning text-dark mb-1 mt-2 h6 d-block float-right"><?php echo $data['nama_kategori']; ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
            
              <div style="margin: 10px auto 20px;display: block;" >
              <h4>Tidak Ada Kategori</h4>
              </div>

            <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <h6 class="subtitle">Produk Terbaru <a href="all_produk.php" class="float-right small">Lihat Semua</a></h6>
            <div id="card_barang">
            <div class="row">
                <?php 
                function harga($rp){
                $harga = number_format ($rp, 0, ',', '.');
                return "Rp.".$harga;
                }
                $queryt = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_barang DESC LIMIT 10 ");
                while($datat  = mysqli_fetch_assoc($queryt)){
                    if($datat['id_barang'] > "0"){
                ?>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card shadow-sm border-0 mb-4" >
                        <div class="card-body" >
                            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18"></i></button>
                            <div class="badge badge-success float-right mt-1"><?php echo $datat['status_barang']; ?></div>
                            <figure class="product-image">
                                <img src="img/produk/<?php echo $datat['foto_barang']; ?>" style="border-radius: 10%;" alt="" class="">
                            </figure>
                            <a  class="text-dark mb-1 mt-2 h6 d-block"><?php echo $datat['nama_barang']; ?></a>
                            <p class="text-secondary small mb-2"><?php echo $datat['nama_kategori']; ?></p>
                            <h5 class="text-success font-weight-normal mb-0" style="font-size: 15px;"><?php echo harga($datat['harga_barang']) ?></h5>
                            <br>
                            <br>
                            <?php
                            if($datat['status_barang']=="Kosong"){
                            ?>
                        <?php }else{ ?>
                            <a href="produk_detail.php?id_barang=<?php echo $datat['id_barang']; ?>" class="btn btn-default button-rounded-36 shadow-sm float-bottom-right"><i class="material-icons md-18">shopping_cart</i></a>
                        <?php } ?> 
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
            
              <div style="margin: 10px auto 20px;display: block;" >
              <h4>Tidak Ada Produk</h4>
              </div>

            <?php } ?>
                <?php } ?>
            </div>
            </div>
        </div>
        <div class="container-fluid bg-dark text-white my-3">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">
                        <div class="col">
                            <h1 class="text-uppercase mb-3">Welcome to styles area</h1>
                        </div>
                        <div class="col-5 col-md-3 col-lg-2 col-xl-2">
                            <img src="img/logo-TS-white.png" style="height: auto ; width: 150% ; margin: 0 -55px;" alt="" class=" mb-3">
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <p>Tomorrow Sweet STORE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h6 class="subtitle">Informasi Produk Terbaru</h6>
            <div class="row">
                <!-- Swiper -->
                <div class="swiper-container news-slide">
                    <div class="swiper-wrapper">
                        <?php 
                $querytt = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_barang DESC LIMIT 10 ");
                while($datatt  = mysqli_fetch_assoc($querytt)){
                    if($datatt['id_barang'] > "0"){
                ?>
                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 bg-dark text-white">
                                <figure class="background">
                                    <img src="img/produk/<?php echo $datatt['foto_barang']; ?>" alt="">
                                </figure>
                                <div class="card-body">
                                    <a href="produk_detail.php?id_barang=<?php echo $datatt['id_barang']; ?>" class="btn btn-default button-rounded-36 shadow-sm float-bottom-right"><i class="material-icons md-18">arrow_forward</i></a>
                                    <h5 class="small"><?php echo $datatt['nama_barang']; ?></h5>
                                    <p class="text-mute small"><?php echo $datatt['nama_kategori']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
            
              <div style="margin: 10px auto 20px;display: block;" >
              <h4>Tidak Ada Produk</h4>
              </div>

            <?php } ?>
                    <?php } ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="container mb-3">
            <div class="row">
                <div class="col text-center">
                    <h5 class="subtitle mb-1">Fitur Paling Menyenangkan Dan Mudah</h5>
                    <p class="text-secondary">Lihatlah Layanan Kami</p>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <i class="material-icons mb-4 md-36 text-template">card_giftcard</i>
                           
                            <p class="text-secondary text-mute">Transaksi Mudah</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <i class="material-icons mb-4 md-36 text-template">subscriptions</i>
                           
                            <p class="text-secondary text-mute">Video Produk</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <i class="material-icons mb-4 md-36 text-template">local_florist</i>
                            
                            <p class="text-secondary text-mute">Ramah Lingkungan</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <i class="material-icons mb-4 md-36 text-template">location_city</i>
                            
                            <p class="text-secondary text-mute">Toko Terpercaya</p>
                        </div>
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
    
    <!-- notification -->
    
    <!-- notification ends -->
    
    
    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>     <script src="vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- cookie js -->     
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- swiper js -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>
    
    
    <script src="js/typeahead.js"></script>

    <script src="js/changer.js"></script>
    <script defer src="js/styleswitch.js"></script> 

    <script>
$(document).ready(function () {
  $('#txtCountry').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "search.php",
        data: 'query=' + query,
        dataType: "json",
        type: "POST",
        success: function (data) {
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });

});

/*Pencarian*/
$(document).ready(function(){

  $(document).on('change', '#txtCountry',  function(){
   var se = this.value;
   $.ajax({
    url:"result.php",
    method:"POST",
    data:{se:se},
    success:function(data){
     $('#card_barang').html(data);

   }
 })
 });

});


</script> 
    
    

    <!-- page level script -->
    <script>
        $(window).on('load', function() {
            /* swiper slider carousel */
            var swiper = new Swiper('.small-slide', {
                slidesPerView: 'auto',
                spaceBetween: 0,
            });

            var swiper = new Swiper('.news-slide', {
                slidesPerView: 5,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 0,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    }
                }
            });

            /* notification view and hide */
           
        });

    </script>
<script type="text/javascript">
 document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
}   
</script>

</body>


</html>
