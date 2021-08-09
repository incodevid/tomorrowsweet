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

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!--Ini Datatablenya-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
    
    <script src="js/ckeditor/ckeditor.js"></script>
    

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
                <div class="col text-center"><img src="img/alfazza_4.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <?php
error_reporting(0);
        

if (isset($_POST['btnSimpan'])) {

    $harga    = $_POST['harga_barang'];
    $harga_str = preg_replace("/[^0-9]/", "", $harga);
    
    
    $nama_barang     = $_POST['nama_barang']; 
    $berat           = $_POST['berat']; 
    $id_kategori     = $_POST['id_kategori'];  
    $status_barang   = $_POST['status_barang']; 
    $deskripsi       = $_POST['deskripsi']; 
    $namafolder      ="img/produk/";

    


$sql = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE nama_barang='$nama_barang' ") or die(mysql_error());
$cek=mysqli_num_rows($sql);

if ($cek>0){
   echo '<script>setTimeout(function() { 
        swal("Gagal Tersimpan! Nama Barang Sudah Ada", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                window.location.href="tambah_produk.php"; 
            }); 
        }); </script>' ;
} else {

if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  $nama_barang.".jpg";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $jpg)) {

            
            $sql = mysqli_query($koneksi,"INSERT INTO tb_barang (nama_barang,berat,id_kategori,harga_barang,status_barang,deskripsi,foto_barang) 
            VALUES ('$nama_barang','$berat','$id_kategori','$harga_str','$status_barang','$deskripsi','$jpg')");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Barang Berhasil Ditambahkan!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="tambah_produk.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Tersimpan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="tambah_produk.php"; 
                        }); 
                    }); </script>' ;
             }
             } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Gagal Diupload!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_produk.php"; 
        }); 
    }); </script>
    <?php
} 
    }
    else {    
     ?>
     <script>setTimeout(function() { 
    swal("Gagal Diupload! File Bukan Jpg / Foto", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="tambah_produk.php"; 
        }); 
    }); </script>

      <?php
 } 
    }

}

    }
    
             
    ?>
        <div class="container">
                <center><h2>TAMBAH PRODUK</h2></center>
        <form   method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" name="nama_barang" oninvalid="this.setCustomValidity('Harap isi nama barang!')" oninput="setCustomValidity('')" required placeholder="Tuliskan nama barang">
                    </div>
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <select name="id_kategori" class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih kategori barang!')" oninput="setCustomValidity('')" required >
                            <option value="">--Pilih Kategori--</option>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                            while($datkat  = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $datkat['id_kategori']; ?>"><?php echo $datkat['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input name="harga_barang" type="text" class="form-control form-control-sm" autocomplete="off" maxlength="20" oninvalid="this.setCustomValidity('Harap isi harga barang!')" oninput="setCustomValidity('')" required onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="toRp(this)" id="number" placeholder="Masukkan harga barang">
                    </div>
                    <div class="form-group">
                        <label>Berat Barang (gram/g)</label>
                        <input name="berat" type="number" class="form-control form-control-sm" autocomplete="off"  oninvalid="this.setCustomValidity('Harap isi berat barang!')" oninput="setCustomValidity('')" required id="number" placeholder="Masukkan berat barang, Contoh: 100">
                    </div>
                    <div class="form-group">
                        <label>Status Barang</label>
                        <select name="status_barang" class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih status barang!')" oninput="setCustomValidity('')" required >
                            <option value="">--Pilih Status--</option>
                            <option value="Kosong">Kosong</option>
                            <option value="PO">PO</option>
                            <option value="Ready">Ready</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Tentang Barang</label>
                        <textarea name="deskripsi" id="deskripsitor"  class="form-control form-control-lg" rows="3" autocomplete="off" oninvalid="this.setCustomValidity('Harap isi deskripsi barang!')" oninput="setCustomValidity('')" required placeholder="Isi deskripsi dari barang"></textarea>
                    </div>
                    <div class="custom-file">
                        <label>Foto Barang</label>
                        <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file foto akun!')" oninput="setCustomValidity('')"  required >
                        <div class="invalid-feedback">Foto belum di pilih.</div>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"  name="btnSimpan">SIMPAN</button>
            <br>
        </form>
        <br>

        <center><h3>Daftar Produk</h3></center>
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Berat Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status Barang</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            function harga($rp){
            $harga = number_format ($rp, 0, ',', '.');
            return "Rp.".$harga;
            }
$query = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY id_barang DESC");
while($data  = mysqli_fetch_assoc($query)){



?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['berat']; ?> gram/g</td>
                <td><?php echo $data['nama_kategori'];?></td>
                <td><?php echo harga($data['harga_barang']) ?></td>
                <td><?php echo $data['status_barang'];?></td>
                <td><?php echo $data['deskripsi'];?></td>
                <td><img src="img/produk/<?php echo $data['foto_barang'];?>" style="height:170px;"></td>
                <td>
                    <a class="btn btn-primary btn-xs"><i data-toggle="modal" data-target="#exampleModalCenter<?php echo $data['id_barang']; ?>" class="material-icons">build</i></a> 

                    <a class="btn btn-warning btn-xs"><i data-toggle="modal" data-target="#ubahFoto<?php echo $data['id_barang']; ?>" class="material-icons">camera_alt</i></a>                                
                            
                    <a class="btn btn-danger btn-xs"><i data-toggle="modal" data-target="#hapusBarang<?php echo $data['id_barang']; ?>" class="material-icons">delete_forever</i></a> 
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
              
$query1 = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY id_barang DESC ");
while($data1  = mysqli_fetch_assoc($query1)){
?>

    <div class="modal fade" id="exampleModalCenter<?php echo $data1['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Ubah Data Barang</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/produk/<?php echo $data1['foto_barang']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data1['nama_barang']; ?></h5>
                   
                    <form class="was-validated" action="aksi/produk/ubah.php?id_barang=<?php echo $data1['id_barang']; ?>" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off"  name="nama_barang" oninvalid="this.setCustomValidity('Harap isi nama barang!')" oninput="setCustomValidity('')" required value="<?php echo $data1['nama_barang']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Berat Barang (gram/g)</label>
                        <input name="berat" type="number" class="form-control form-control-sm" autocomplete="off"  oninvalid="this.setCustomValidity('Harap isi berat barang!')" oninput="setCustomValidity('')" required value="<?php echo $data1['berat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <select name="id_kategori" class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih kategori barang!')" oninput="setCustomValidity('')" required >
                            <option selected value="<?php echo $data1['id_kategori']; ?>"><?php echo $data1['nama_kategori']; ?></option>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                            while($datkat  = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $datkat['id_kategori']; ?>"><?php echo $datkat['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input name="harga_barang" type="text" class="form-control form-control-sm" autocomplete="off" maxlength="20" oninvalid="this.setCustomValidity('Harap isi harga barang!')" oninput="setCustomValidity('')" required onkeypress="return event.charCode >= 48 && event.charCode <=57" onkeyup="toRp(this)" id="number" value="<?php echo $data1['harga_barang']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Status Barang</label>
                        <select name="status_barang" class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih status barang!')" oninput="setCustomValidity('')" required >
                            <option selected value="<?php echo $data1['status_barang']; ?>"><?php echo $data1['status_barang']; ?></option>
                            <option value="Kosong">Kosong</option>
                            <option value="PO">PO</option>
                            <option value="Ready">Ready</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Tentang Barang</label>
                        <textarea name="deskripsi" id="<?php echo $data1['id_barang']; ?>" class="form-control form-control-lg" rows="3" autocomplete="off" oninvalid="this.setCustomValidity('Harap isi deskripsi barang!')" oninput="setCustomValidity('')" required ><?php echo $data1['deskripsi']; ?></textarea>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" >SIMPAN</button>
            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( '<?php echo $data1['id_barang']; ?>' );
    </script>
<?php } ?>

<!--Modal Ubah data Foto-->
    <?php 
              
$query2 = mysqli_query($koneksi,"SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY id_barang DESC ");
while($data2  = mysqli_fetch_assoc($query2)){
?>
    <div class="modal fade" id="ubahFoto<?php echo $data2['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Ubah Data Foto Produk</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/produk/<?php echo $data2['foto_barang']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data2['nama_barang']; ?></h5>
                   
                    <form class="was-validated" action="aksi/produk/ubah_foto.php?id_barang=<?php echo $data2['id_barang']; ?>"  method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    
                    <div class="custom-file">
                        <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file foto !')" oninput="setCustomValidity('')"  required >
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

    <div class="modal fade" id="hapusBarang<?php echo $data2['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Hapus Data Produk</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/produk/<?php echo $data2['foto_barang']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $data2['nama_barang']; ?></h5>
                   
                    <form class="was-validated" action="aksi/produk/hapus_produk.php?id_barang=<?php echo $data2['id_barang']; ?>"  method="POST" enctype="multipart/form-data" >
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


     <!--Ini javascript sweet alertnya -->
    <script src="js/sweetalert2.min.js"></script>

    <!--Ini Datatablenya-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>

    <script type="text/javascript">
        
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
 
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    
    <script>
        CKEDITOR.replace( 'deskripsitor' );
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

    

    <script type="text/javascript">
function toA(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
function toR(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp. '+e(d)}

function toRp(e){
var angka = toA(e.value);      
if (!isNaN(angka)){
var hasil = toR(angka);
e.value = hasil;
}else{
e.value = 'Rp. 0';
}
}
</script>









</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/notification.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:27:40 GMT -->
</html>
