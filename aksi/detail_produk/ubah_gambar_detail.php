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

    $id_detail_barang = $_GET['id_detail_barang'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_detail_barang WHERE id_detail_barang='$id_detail_barang' ");
    $t = mysqli_fetch_assoc($sql);
    
    $id_detail_barang       = $t['id_detail_barang'];  
    $jam                    = date('His');
    $namafolder             ="../../gambar_detail/";
    


if (!empty($_FILES["nama_file_detail"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file_detail']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  "gambar-detail_".$id_detail_barang."-UPDATE-".$jam.".jpg";               
    if (move_uploaded_file($_FILES['nama_file_detail']['tmp_name'], $namafolder . $jpg)) {

            
            $sql_detail = mysqli_query($koneksi,"UPDATE tb_detail_barang SET  
                gambar_detail='$jpg' WHERE id_detail_barang='$id_detail_barang'");

            
            if ($sql_detail) {
               echo '<script>setTimeout(function() { 
                    swal("Gambar Berhasil Dirubah!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="../../tambah_detail.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gambar Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../tambah_detail.php"; 
                        }); 
                    }); </script>' ;
       }
       } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Foto Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="../../tambah_detail.php"; 
        }); 
    }); 
    </script> 
    <?php
} 
    }
    else {    
     ?>
     <script>setTimeout(function() { 
      swal("Foto Gagal Dirubah! Format Foto bukan jpg/gambar", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
              window.location.href="../../tambah_detail.php"; 
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