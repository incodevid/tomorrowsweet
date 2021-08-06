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

$id_video   = $_GET['id_video'];
$pilih = mysqli_query($koneksi,"SELECT * FROM tb_video_barang WHERE id_video='$id_video' ");
$data = mysqli_fetch_assoc($pilih);

$video    = $data['video_barang'];

unlink("../../video_produk/".$video);

$sql 	= 'DELETE FROM tb_video_barang WHERE id_video="'.$id_video.'"';
$query	= mysqli_query($koneksi,$sql);


if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Dihapus!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="../../tambah_video_barang.php"; 
                        }); 
                    }); </script>' ;
             } else {
              echo '<script>setTimeout(function() { 
                    swal("Data Gagal Dihapus!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../tambah_video_barang.php"; 
                        }); 
                    }); </script>' ;
             }
?>
<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script> 
    </body>
    </html>