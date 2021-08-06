<?php
error_reporting(0);
include '../../config.php';

 ?>
<html lang="en" class="grey-theme">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
<meta name="description" content="">
<link rel="stylesheet" href="../../vendor/materializeicon/material-icons.css">

<!-- Bootstrap core CSS -->
<link href="../../vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Swiper CSS -->
<link href="../../vendor/swiper/css/swiper.min.css" rel="stylesheet">

<!-- Chosen multiselect CSS -->
<link href="../../vendor/chosen_v1.8.7/chosen.min.css" rel="stylesheet">

<!-- nouislider CSS -->
<link href="../../vendor/nouislider/nouislider.min.css" rel="stylesheet">


<!-- Custom styles for this template -->
<link href="../../css/style.css" rel="stylesheet">

<!--ini sweet css alertnya-->
<link rel="stylesheet" href="../../css/sweetalert2.min.css">



</head>

<body>
<?php 

      $id_barang = $_GET['id_barang'];
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang' ");
      $t = mysqli_fetch_assoc($sql);

    $id_barang      = $t['id_barang'];  
    $nama_barang    = $t['nama_barang'];
    $jam            = date('His');
    $namafolder     ="../../img/produk/";
    


if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  $nama_barang."-UPDATE-".$jam.".jpg";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $jpg)) {

            
            $sql = mysqli_query($koneksi,"UPDATE tb_barang SET  
                foto_barang='$jpg' WHERE id_barang='$id_barang'");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Dirubah!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="../../tambah_produk.php"; 
                        }); 
                    }); </script>' ;
      } else {
              echo '<script>setTimeout(function() { 
                    swal("Data Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../tambah_produk.php"; 
                        }); 
                    }); </script>' ;
       }
       } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Foto Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="../../tambah_produk.php"; 
        }); 
    }); 
    </script> 
    <?php
} 
    }
    else {    
     ?>
      <script>setTimeout(function() { 
      swal("Foto Gagal Dirubah! Format Foto bukan jpg/gambar", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
              window.location.href="../../tambah_produk.php"; 
          }); 
      }); 
      </script> 

      <?php
 } 
    }
  

?>
<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script> 
    </body>
    </html>