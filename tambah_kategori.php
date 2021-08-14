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

    <link rel="icon" href="img/logo-TS.png">

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

    <!--Ini datatablenya-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

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
    
    $nama_kategori     = $_POST['nama_kategori']; 
    $contoh_kat        = $_POST['contoh_kat']; 
    $namafolder        ="img/kategori/";


$sql = mysqli_query($koneksi,"SELECT * FROM tb_kategori WHERE nama_kategori='$nama_kategori' ") or die(mysql_error());
$cek=mysqli_num_rows($sql);

if ($cek>0){
   echo '<script>setTimeout(function() { 
        swal("Gagal Tersimpan! Nama Kategori Sudah Ada", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                window.location.href="tambah_kategori.php"; 
            }); 
        }); </script>' ;
} else {


if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  $nama_kategori.".jpg";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $jpg)) {

            
            $sql = mysqli_query($koneksi,"INSERT INTO tb_kategori (nama_kategori,contoh_kat,foto_kategori) 
            VALUES ('$nama_kategori','$contoh_kat','$jpg')");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Ditambahkan!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="tambah_kategori.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Tersimpan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="tambah_kategori.php"; 
                        }); 
                    }); </script>' ;
             }
             } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Gagal Diupload!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_kategori.php"; 
        }); 
    }); </script>
    <?php
} 
    }
    else {    
     ?>
     <script>setTimeout(function() { 
    swal("Gagal Diupload! File Bukan Jpg / Foto", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_kategori.php"; 
        }); 
    }); </script>

      <?php
 } 
    }

}

    }
    
             
    ?>
        <div class="container">
                <center><h2>TAMBAH KATEGORI PRODUK</h2></center>
        <form  action="" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" maxlength="10" name="nama_kategori" oninvalid="this.setCustomValidity('Harap isi nama kategori barang!')" oninput="setCustomValidity('')" required placeholder="Masukkan nama kategori">
                    </div>
                    <div class="form-group">
                        <label>Berikan 3 Contoh Barang</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off"  name="contoh_kat" oninvalid="this.setCustomValidity('Harap isi contoh barang dalam kategori!')" oninput="setCustomValidity('')" required placeholder="Contoh: Gelas,Piring,Sendok">
                    </div>
                    <div class="form-group">
                        <label>Upload Foto Kategori</label>
                        <input type="file" class="form-control form-control-sm" autocomplete="off"  name="nama_file" oninvalid="this.setCustomValidity('Harap isi foto kategori!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>
                
                
            </div>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" name="btnSimpan">SIMPAN</button>
            <br>
        </form>
        <br>

        <center><h3>Daftar Kategori</h3></center>
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Contoh Barang</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $no = 1;
$query = mysqli_query($koneksi,"SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
while($data  = mysqli_fetch_assoc($query)){
?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['contoh_kat'];?></td>
                <td><img src="img/kategori/<?php echo $data['foto_kategori'];?>" style="height:170px;"></td>
                <td>
                    <a class="btn btn-primary btn-xs"><i data-toggle="modal" data-target="#exampleModalCenter<?php echo $data['id_kategori']; ?>" class="material-icons">build</i></a> 

                    <a class="btn btn-warning btn-xs"><i data-toggle="modal" data-target="#ubahFoto<?php echo $data['id_kategori']; ?>" class="material-icons">camera_alt</i></a>                                
                            
                    <a class="btn btn-danger btn-xs"><i data-toggle="modal" data-target="#hapusKat<?php echo $data['id_kategori']; ?>" class="material-icons">delete_forever</i></a> 
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


    <!-- Modal -->
      <?php 
              
$query = mysqli_query($koneksi,"SELECT * FROM tb_kategori ");
while($data  = mysqli_fetch_assoc($query)){
?>

    <div class="modal fade" id="exampleModalCenter<?php echo $data['id_kategori']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Ubah Data Kategori</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/kategori/<?php echo $data['foto_kategori']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data['nama_kategori']; ?></h5>
                   
                    <form class="was-validated" action="aksi/kategori/ubah.php?id_kategori=<?php echo $data['id_kategori']; ?>" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" maxlength="10" name="nama_kategori" oninvalid="this.setCustomValidity('Harap isi nama kategori barang!')" oninput="setCustomValidity('')" required value="<?php echo $data['nama_kategori']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Berikan 3 Contoh Barang</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off"  name="contoh_kat" oninvalid="this.setCustomValidity('Harap isi contoh barang dalam kategori!')" oninput="setCustomValidity('')" required value="<?php echo $data['contoh_kat']; ?>">
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" value="SIMPAN" >
            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--Modal Ubah data Foto-->
    <?php 
              
$query = mysqli_query($koneksi,"SELECT * FROM tb_kategori ");
while($data  = mysqli_fetch_assoc($query)){
?>
    <div class="modal fade" id="ubahFoto<?php echo $data['id_kategori']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Ubah Data Foto Kategori</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/kategori/<?php echo $data['foto_kategori']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data['nama_kategori']; ?></h5>
                   
                    <form class="was-validated" action="aksi/kategori/ubah_foto.php?id_kategori=<?php echo $data['id_kategori']; ?>"  method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    
                    <div class="custom-file">
                        <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file foto!')" oninput="setCustomValidity('')"  required >
                        <div class="invalid-feedback">Foto belum di pilih.</div>
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" value="SIMPAN"  >
            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusKat<?php echo $data['id_kategori']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Hapus Data Kategori</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/kategori/<?php echo $data['foto_kategori']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data['nama_kategori']; ?></h5>
                   
                    <form class="was-validated" action="aksi/kategori/hapus_kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>"  method="POST" enctype="multipart/form-data" >
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

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>

    <!--Ini javascript sweet alertnya -->
    <script src="js/sweetalert2.min.js"></script>

    <!--Ini datatablenya-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

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


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/notification.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:27:40 GMT -->
</html>
