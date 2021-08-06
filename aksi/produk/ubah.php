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

    $harga    = $_POST['harga_barang'];
    $harga_str = preg_replace("/[^0-9]/", "", $harga);
    var_dump($harga_str);

    $nama_barang    = $_POST['nama_barang']; 
    $berat          = $_POST['berat']; 
    $id_kategori    = $_POST['id_kategori'];  
    $status_barang  = $_POST['status_barang']; 
    $deskripsi      = $_POST['deskripsi']; 
    $id_barang      = $_GET['id_barang'];



            
            $sql = mysqli_query($koneksi,"UPDATE tb_barang SET nama_barang='$nama_barang',berat='$berat',id_kategori='$id_kategori',harga_barang='$harga_str',status_barang='$status_barang',deskripsi='$deskripsi' WHERE id_barang='$id_barang'");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Dirubah!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="../../tambah_produk.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Terubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../tambah_produk.php"; 
                        }); 
                    }); </script>' ;
             }

?>
<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script> 
    </body>
    </html>