
 <?php
error_reporting(0);
session_start();
include '../../config.php';
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
function tglIndonesia($str){
       $tr   = trim($str);
       $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
       return $str;
   }
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) 
 {echo "<script>;document.location='../../login.php' </script> ";}
else {
    
    
            $id_akun=$_SESSION['id_akun'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun where id_akun='$id_akun' ");
            $t = mysqli_fetch_assoc($sql);
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
$id_keranjang   = $_GET['id_keranjang'];


$sql 	= 'DELETE FROM tb_keranjang WHERE id_keranjang="'.$id_keranjang.'"';
$query	= mysqli_query($koneksi,$sql);


if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Barang Dihapus!", "Data Berhasil Dihapus Dari Keranjang", "success").then(function() { 
                            window.location.href="../../keranjang.php"; 
                        }); 
                    }); </script>' ;
             } else {
              echo '<script>setTimeout(function() { 
                    swal("Data Gagal Dihapus!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../keranjang.php"; 
                        }); 
                    }); </script>' ;
             }

           }
?>

<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script> 
    </body>
    </html>