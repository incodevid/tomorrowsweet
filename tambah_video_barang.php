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

    <title>Tambah Produk </title>

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

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!--Ini Datatablenya-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

    <link href="dist/css/select2.min.css" rel="stylesheet" />

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
                <div class="col text-center"><img src="img/logo-TS-head-01.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <?php

if (isset($_POST['btnSimpan'])) {
    
    $id_barang     = $_POST['id_barang'];
    $jam           = date('His');  
    $namafolder    ="video_produk/";



if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="video/mp4")     {      
     $mp4 =  "Video Barang_".$id_barang."_".$jam.".mp4";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $mp4)) {

            
            $sql = mysqli_query($koneksi,"INSERT INTO tb_video_barang (id_barang,video_barang) 
            VALUES ('$id_barang','$mp4')");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Barang Berhasil Ditambahkan!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="tambah_video_barang.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Tersimpan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="tambah_video_barang.php"; 
                        }); 
                    }); </script>' ;
             }
             } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Gagal Diupload!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_video_barang.php"; 
        }); 
    }); </script>
    <?php
} 
    }
    else {    
     ?>
     <script>setTimeout(function() { 
    swal("Gagal Diupload! File Bukan Video / Mp4", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_video_barang.php"; 
        }); 
    }); </script>

      <?php
 } 
    }

}

    
    
             
    ?>
        <div class="container">
                <center><h2>TAMBAH VIDEO PRODUK</h2></center>
        <form  method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select class="custom-select" name="id_barang" id="selek2" class="form-control" autocomplete="off"  name="nama" oninvalid="this.setCustomValidity('Harap pilih barang!')" oninput="setCustomValidity('')" required>
                            <option value="">--Pilih Barang--</option>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_barang");
                            while($datbar  = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $datbar['id_barang']; ?>"><?php echo $datbar['nama_barang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="custom-file">
                        <label>Video Barang</label>
                        <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file video!')" oninput="setCustomValidity('')"  required >
                        <div class="invalid-feedback">Video belum di pilih.</div>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" value="SIMPAN"name="btnSimpan" >SIMPAN</button>
            <br>
        </form>
        <br>

        <center><h3>Daftar Video Produk</h3></center>
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Video</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $no = 1;
$query1 = mysqli_query($koneksi,"SELECT * FROM tb_video_barang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang ORDER BY a.id_video DESC");
while($data  = mysqli_fetch_assoc($query1)){
?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td>
                    <video width="320" height="240"  onclick="this.paused?this.play():this.pause()">
                    <source src="video_produk/<?php echo $data['video_barang']; ?>" type="video/mp4">
                    </video>
                </td>
                <td>                        
                            
                    <a class="btn btn-danger btn-xs"><i data-toggle="modal" data-target="#hapusBarang<?php echo $data['id_video']; ?>" class="material-icons">delete_forever</i></a> 
                </td>
            </tr>
        <?php $no++;  }  ?>
        </tbody>
    </table>
    <br>

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
    <!--Modal Ubah data Foto-->
    <?php 
              
$query2 = mysqli_query($koneksi,"SELECT * FROM tb_video_barang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang ");
while($data2  = mysqli_fetch_assoc($query2)){
?>
    

    <div class="modal fade" id="hapusBarang<?php echo $data2['id_video']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Hapus Data Produk</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                        
                        <video width="220" height="240" onclick="this.paused?this.play():this.pause()">
                        <source src="video_produk/<?php echo $data2['video_barang']; ?>" type="video/mp4">
                        </video>

                   
                    <h5 class="my-3"><?php echo $data2['nama_barang']; ?></h5>
                   
                    <form class="was-validated" action="aksi/video_produk/hapus_video_barang.php?id_video=<?php echo $data2['id_video']; ?>"  method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    
                    
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Hapus</button>
            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>

            <br>
        </form>
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

    <!--Ini javascript sweet alertnya -->
    <script src="js/sweetalert2.min.js"></script>

    <!--Ini Datatablenya-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

    <script src="dist/js/select2.min.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    </script>

   <script>
        $(document).ready(function() {
        $('#selek2').select2();
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
