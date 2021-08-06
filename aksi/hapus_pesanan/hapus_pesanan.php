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
$kode_orderan           = $_GET['kode_orderan'];

$pilih = mysqli_query($koneksi,"SELECT * FROM tb_orderan WHERE kode_orderan='$kode_orderan' ");
$data = mysqli_fetch_assoc($pilih);

$foto    = $data['foto_bukti'];

unlink("../../img/foto_bukti/".$foto);

$sql 	= 'DELETE FROM tb_orderan WHERE kode_orderan="'.$kode_orderan.'" ';
$query	= mysqli_query($koneksi,$sql);


if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Pesanan Berhasil Dihapus!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="../../orderan.php"; 
                        }); 
                    }); </script>' ;
             } else {
              echo '<script>setTimeout(function() { 
                    swal("Pesanan Gagal Dihapus!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../orderan.php"; 
                        }); 
                    }); </script>' ;
             }
?>
<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script>
    </body>
    </html>