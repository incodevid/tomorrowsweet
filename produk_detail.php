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


            $id_barang=$_GET['id_barang'];
            $sqlb = mysqli_query($koneksi, "SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori WHERE a.id_barang='$id_barang' ");
            $barang = mysqli_fetch_assoc($sqlb);

            $id_barang=$_GET['id_barang'];
            $sqld = mysqli_query($koneksi, "SELECT *,SUM(stok_barang) AS jumlah FROM tb_detail_barang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang WHERE b.id_barang='$id_barang' GROUP BY a.id_detail_barang DESC");
            $detail = mysqli_fetch_assoc($sqld);

            $id_barang=$_GET['id_barang'];
            $sqlf = mysqli_query($koneksi, "SELECT * FROM tb_foto_barang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang WHERE a.id_barang='$id_barang' ");
            $foto_lainnya = mysqli_fetch_assoc($sqlf);

            $id_barang=$_GET['id_barang'];
            $sqlv = mysqli_query($koneksi, "SELECT * FROM tb_video_barang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang WHERE a.id_barang='$id_barang' ");
            $video_lainnya = mysqli_fetch_assoc($sqlv);

            function harga($rp){
            $harga = number_format ($rp, 0, ',', '.');
            return "Rp.".$harga;
            }
            
        
 ?>
<!doctype html>
<html lang="en" class="grey-theme">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">

    <title>Produk Detail</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>

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
        .inline-group {
        max-width: 20rem;
        padding: .5rem;
        }

        .inline-group .form-control {
        text-align: center;
        }

        .form-control[type="number"]::-webkit-inner-spin-button,
        .form-control[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

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
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <a href="all_produk.php" class="btn  btn-link text-dark"><i class="material-icons">navigate_before</i></a>
                </div>
                <div class="col text-center"><img src="img/logo-TS-head-01.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">

            <!-- Swiper -->
            <div class="swiper-container product-details">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" >
                        <?php
                        $id_barang = $_GET['id_barang']; 
$query1 = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori WHERE id_barang='$id_barang' ");
while($data  = mysqli_fetch_assoc($query1)){
?>
                        <img src="img/produk/<?php echo $data['foto_barang']; ?>" style="border-radius: 20px;"  alt="">
                    <?php } ?>
                    </div>
                    
                 <?php
                $id_barang = $_GET['id_barang']; 
                $queryf = mysqli_query($koneksi,"SELECT * FROM tb_foto_barang WHERE id_barang='$id_barang' ");
                $dataf  = mysqli_num_rows($queryf);
                ?>
                <?php
                if($dataf <= 0 ){
                   echo "
                   <div class='swiper-slide'>
                   <img src='img/alfazza_4.png' alt='Foto Belum Ada'>
                   </div>"; 
                }else{
                    while($datafot = mysqli_fetch_assoc($queryf)){
                ?>      
                        <div class="swiper-slide">
                        <img src="img/foto_produk_lainnya/<?php echo $datafot['foto_barang_kedua']; ?>" style="border-radius: 20px;" >
                        </div>
                <?php }} ?>
                    
                         <?php
                $id_barang = $_GET['id_barang']; 
                $queryv = mysqli_query($koneksi,"SELECT * FROM tb_video_barang WHERE id_barang='$id_barang' ");
                $datav  = mysqli_num_rows($queryv);
                ?>
                <?php
                if($datav <= 0 ){
                   echo "
                   <div class='swiper-slide'>
                   <img src='img/alfazza_4.png' alt='Foto Belum Ada'>
                   </div>"; 
                }else{
                    while($datavid = mysqli_fetch_assoc($queryv)){
                ?>
                    <div class="swiper-slide" >
                    <video width="100%" height="auto"  onclick="this.paused?this.play():this.pause()">
                    <source src="video_produk/<?php echo $datavid['video_barang']; ?>"  type="video/mp4">
                    </video>
                    </div>
                
                <?php }} ?>
                
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination">
                    
                </div>
                
            </div>
            
            
            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18"></i></button>
            
            <div class="badge badge-success float-right mt-1">
                
                <a style="color: white;font:bold 15px Poppins, sans-serif;">Stok</a> <a style="color: white;font:bold 15px Poppins, sans-serif;" id="stok1"><?php echo $detail['stok_barang']; ?></a>
                
                    
            </div>
            <!--
            <p class="text-secondary my-3 small">
                <i class="material-icons text-warning md-18 vm">star</i>
                <i class="material-icons text-warning md-18 vm">star</i>
                <i class="material-icons text-warning md-18 vm">star</i>
                <i class="material-icons text-secondary md-18 vm">star</i>
                <i class="material-icons text-secondary md-18 vm">star</i>
                <span class="text-dark vm ml-2">Rating 4.2</span> <span class="vm">based on 245 reviews</span>
            </p>-->

            <a href="#" class="text-dark mb-1 mt-2 h6 d-block" style="font:bold 15px Poppins, sans-serif;"><?php echo $barang['nama_barang']; ?>
            </a>
                <div class=" small float-right badge bg-warning">
                    
                    <i class="material-icons h5 mb-1">brush</i>
                    <a style="color: black;font:bold 19px Poppins, sans-serif;" id="warna1">
                     <?php echo $detail['warna_barang']; ?></a>
                </div>

            


            <p class="text-secondary small mb-2"><?php echo $barang['nama_kategori']; ?></p>


            <h6 class="subtitle">Varian Barang</h6>
                <div class="row">
                <!-- Swiper -->
                <div class="swiper-container small-slide">
                    <div class="swiper-wrapper">
                        <?php 
$id_barang=$_GET['id_barang'];
$query1 = mysqli_query($koneksi,"SELECT * FROM  tb_detail_barang a 
RIGHT JOIN tb_barang b ON a.id_barang=b.id_barang WHERE a.id_barang='$id_barang' GROUP BY a.`id_detail_barang` DESC  ");

$cek=mysqli_num_rows($query1);

if ($cek>0){

while($data  = mysqli_fetch_assoc($query1)){


    
?>
                        <div class="swiper-slide" >
                            <div class="card shadow-sm border-0" style="background-image:url(gambar_detail/<?php echo str_replace('', '%20', $data[gambar_detail] ) ?>);background-repeat: no-repeat;width: 100%;height: 100%;background-size: 100%;">
                                <div class="card-body">
                                    <div class="row no-gutters h-100" >
                                        
                                        <div class="col-12">
                                            <a  class="badge badge-info text-white mb-1 mt-1 h6 d-block float-right" id="varian<?php echo $data['id_detail_barang'] ?>" data-stok="<?php echo $data['stok_barang'] ?>"
                                            data-warna="<?php echo $data['warna_barang'] ?>"><i class="material-icons h5 mb-1">check</i></a>
                                        </div>
                                      
                                        <div class="col-12">
                                            <a  class="badge badge-warning text-dark mb-1 mt-1 h6 d-block float-right"><?php echo $data['warna_barang']; ?> </a>
                                            <a  class="badge badge-info text-white mb-1 mt-1 h6 d-block float-right">Ukuran: <?php echo $data['ukuran']; ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">

                        $('#varian<?php echo $data['id_detail_barang'] ?>').on('click',function(){
                        var stok = $(this).attr('data-stok');
                        var warna = $(this).attr('data-warna');
                        $("#stok1").text(stok);
                        $("#warna1").text(warna);
                        });

                        </script>
                        
                        <?php }?>
                        <?php }else{?>
            
              <div style="margin: 10px auto 20px;display: block;" >
              <h4>Tidak Ada Varian</h4>
              </div>

            <?php } ?>
                    </div>
                </div>
                </div>

            


            

          
            <a style="color: black;">Deskripsi :</a>
            <p><a class="text-secondary small mb-5" ><?php echo $barang['deskripsi']; ?></a></p>
        
            

            
            
           
         

            
                
           

            <div class="row mb-4">
                <div class="col">
                    <h3 class="text-success font-weight-normal mb-0"><?php echo harga($barang['harga_barang']) ?></h3>
                    <p class="text-secondary text-mute mb-0">Berat : <?php echo $barang['berat']; ?> (gram/g)</p>
                    <p class="text-secondary text-mute mb-0"><?php echo $barang['status_barang']; ?></p>
                </div>
                <div class="col-auto align-self-center">
                    <button data-toggle="modal" data-target="#exampleModalCenter<?php echo $barang['id_barang']; ?>" class="btn btn-lg btn-default shadow btn-rounded">Beli <i class="material-icons md-18">shopping_cart</i></button>
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

    <!-- Modal -->
      <?php 
              
$queryk = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_detail_barang b ON a.id_barang=b.id_barang WHERE b.id_barang='$barang[id_barang]' ");
while($datak  = mysqli_fetch_assoc($queryk)){


?>

    <div class="modal fade" id="exampleModalCenter<?php echo $datak['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Apakah Anda Ingin Memasukan Barang Ke Keranjang Beli?</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/produk/<?php echo $datak['foto_barang']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $datak['nama_barang']; ?></h5>
                   
                    <form class="was-validated" action="aksi/beli_keranjang/tambah_keranjang.php" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-sm" autocomplete="off" maxlength="20" name="id_barang" value="<?php echo $barang['id_barang'] ?>"  >
                        <input type="hidden" class="form-control form-control-sm" required name="warna_beli" id="warna_beli"  value="" >
                        <input type="hidden" class="form-control form-control-sm" required name="ukuran_beli"  id="ukuran_beli"   value="" >
                        <input type="hidden" class="form-control form-control-sm" required   id="stokb"  value="" >
                        <input type="hidden" class="form-control form-control-sm" required  id="tambah_stok" value="" >

                    </div>
                    <label>Pilih Warna</label>
                    <div class="form-group">
                       
                        <select name="id_detail_barang" id="pilih_detil"  class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih warna yang dibeli!')" oninput="setCustomValidity('')" required onchange="myFunction(this.value)">
                            <option value="">--Pilih Warna--</option>
                            <?php 
                            $queryd = mysqli_query($koneksi,"SELECT * FROM tb_detail_barang WHERE id_barang='$datak[id_barang]' ");
                            while($datad  = mysqli_fetch_assoc($queryd)){

                            ?>
                            <option value="<?php echo $datad['id_detail_barang']; ?>"
                                data-warna1="<?php echo $datad['warna_barang'] ?>"
                                data-ukuran1="<?php echo $datad['ukuran'] ?>"
                                data-stok1="<?php echo $datad['stok_barang'] ?>"
                                ><?php echo $datad['warna_barang'] ?>--Ukuran (<?php echo $datad['ukuran'] ?>)--Stok (<?php echo $datad['stok_barang']; ?>)</option>

                            

                            
                            <?php } ?>
                        </select>

                        <script type="text/javascript">

                            $('#pilih_detil').on('change', function(){
                                 var warna1 = $(this).find('option:selected').data('warna1');
                                 var ukuran1 = $(this).find('option:selected').data('ukuran1');
                                 var stok1 = $(this).find('option:selected').data('stok1');
                              
                                $('#warna_beli').val(warna1);
                                $('#ukuran_beli').val(ukuran1);
                                $('#stokb').val(stok1);
                                
                                

                                

                            });

                        </script>
                        
                    </div>
                    <label>Jumlah Beli</label>
                    <!--INI COBA-->
                    <div id="tbstok" style="display: none;">
                    <div class="input-group inline-group" id="only-number" >
                      <div class="input-group-prepend">
                        <button  class="btn btn-outline-secondary btn-minus btn-light-grey px-1" type="button">
                          <i class="material-icons">remove</i>
                        </button>
                      </div>
                      <input class="form-control hasMaxInput" name="jumlah_stok" id="number" onchange="hitung(this.value,<?php echo $n ?>)" min="1" value="1" type="number" pattern="\d*" readonly
                       max="">
                      <div class="input-group-append">
                        <button onclick="$(this).prev()[0].stepUp();preventDefault()" class="btn btn-outline-secondary btn-plus btn-light-grey px-1">
                          <i class="material-icons">add</i>
                        </button>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"  >SIMPAN KE KERANJANG</button>
            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

    <!-- Modal -->
    <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-end" role="document">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h6 class="subtitle mt-0">Share with</h6>
                    <div class="row">
                        <div class="col-12">
                            <figure class="avatar avatar-50 border-0 mx-1">
                                <img src="img/facebook.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50 border-0 mx-1">
                                <img src="img/whatsapp.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50 border-0 mx-1">
                                <img src="img/linkdedin.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50 border-0 mx-1">
                                <img src="img/twitter.png" alt="">
                            </figure>
                        </div>
                    </div>

                    <p class="subtitle text-secondary">Recent Connected</p>
                    <div class="row">
                        <div class="col-12">
                            <figure class="avatar avatar-50">
                                <img src="img/user1.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50">
                                <img src="img/user2.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50">
                                <img src="img/user3.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50">
                                <img src="img/user4.png" alt="">
                            </figure>
                            <figure class="avatar avatar-50">
                                <img src="img/user2.png" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>     
    <script src="vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- cookie js -->     
    <script src="vendor/cookie/jquery.cookie.js"></script>

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
            var swiper = new Swiper('.product-details ', {
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination'
                }
            });

            var swiper = new Swiper('.small-slide', {
                slidesPerView: 'auto',
                spaceBetween: 0,
            });



            

        });

    </script>


    <script>
    $(function() {
      $('#only-number').on('keydown', '#number', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
        })
    </script>

    <script>
    $('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-group').find('input');
    if (input.is('input')) {
    input[0][isNegative ? 'stepDown' : 'stepUp']()
    }

    var jml_stok = document.getElementById("number").value;
    document.getElementById("tambah_stok").value=jml_stok;

    var max=document.getElementById("stokb").value;
    var inp=document.getElementById("tambah_stok").value;
    if (inp >= max) {
        setTimeout(function() { 
        swal("Jumlah melebihi stok tersedia barang", "Klik tombol dibawah untuk melanjutkan", "error"); 
        });
        $("#number").val(max);
    } else {
         // cont.
    }

    });

    $('form').on('click', 'button:not([type="submit"])', function(e){
      e.preventDefault();
    })

    </script>

    <script>
        function myFunction() {
                var x = document.getElementById("pilih_detil").value;

                if ( x == "" ) {

                document.getElementById("tbstok").style.display = "none";
            }else{
             
                document.getElementById("tbstok").style.display = "block";

        };
    }
           
    </script>
  
    <!-- jquery, popper and bootstrap js -->
<script src="js/sweetalert2.min.js"></script>
   

    

   

</body>


</html>
