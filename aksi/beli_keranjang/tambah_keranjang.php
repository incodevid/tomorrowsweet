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

    $id_barang       = $_POST['id_barang']; 
    $jumlah_stok     = $_POST['jumlah_stok']; 
    $warna_beli      = $_POST['warna_beli']; 
    $id_akun         = $_SESSION['id_akun'];


    $sql1 = mysqli_query($koneksi,"SELECT * FROM tb_keranjang WHERE id_barang='$id_barang' AND warna_beli='$warna_beli'  AND id_akun='$id_akun' ") or die(mysql_error());
    $cek=mysqli_num_rows($sql1);

          $sqlnol = mysqli_query($koneksi,"SELECT * FROM tb_detail_barang WHERE id_barang='$id_barang' AND stok_barang='0' ") or die(mysql_error());
          $ceknol=mysqli_fetch_assoc($sqlnol);

if ($cek>0){
   echo '<script>setTimeout(function() { 
        swal("Gagal Tersimpan! Warna tidak boleh sama", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                window.location.href="../../produk_detail.php?id_barang='.$id_barang.'"; 
            }); 
        }); </script>' ;
} else {


        if ($ceknol['stok_barang'] == '0'){
        echo '<script>setTimeout(function() { 
        swal("Gagal Tersimpan! Stok sudah habis", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                window.location.href="../../produk_detail.php?id_barang='.$id_barang.'"; 
            }); 
        }); </script>' ;
        } else {
            
            $sql = mysqli_query($koneksi,"INSERT INTO tb_keranjang (id_barang,jumlah_stok,warna_beli,id_akun) 
            VALUES ('$id_barang','$jumlah_stok','$warna_beli','$id_akun')");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Ditambahkan!", "Data Berhasil Ditambahkan Ke Keranjang", "success").then(function() { 
                            window.location.href="../../produk_detail.php?id_barang='.$id_barang.' "; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Ditambahkan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../produk_detail.php?id_barang='.$id_barang.' "; 
                        }); 
                    }); </script>' ;
             }


           }

      }

}

?>

<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script>
    </body>
    </html>