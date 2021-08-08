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

    
    $kode_orderan   = $_POST['kodeBarang'];
    $jml_beli       = $_POST['jml_beli'];
    $id_akun        = $_POST['id_akun'];
    $nama_barang    = $_POST['nama_barang'];
    $nama_kategori  = $_POST['nama_kategori'];
    $harga_barang   = $_POST['harga_brg'];
    $subtotal_beli  = $_POST['subtotal_beli'];
    $stok_beli      = $_POST['stok_beli'];
    $warna_beli     = $_POST['warna_beli'];
    $bank_bayar     = $_POST['bankcek'];
    $jenis_kirim    = $_POST['jenis_kirim'];
    $ekspedisi      = $_POST['kurir'];
    $paket_kurir    = $_POST['paket'];
    $tarif_paket    = $_POST['tarif'];
    $berat_barang   = $_POST['berat_barang'];
    $tgl_pesanan    = $_POST['tgl_pesanan'];



            
            $query = "INSERT INTO tb_orderan (kode_orderan,jml_beli,id_akun,nama_barang,nama_kategori,harga_barang,subtotal_beli,stok_beli,warna_beli,bank_bayar,jenis_kirim,ekspedisi,paket_kurir,tarif_paket,berat_barang,tgl_pesanan,status_beli) 
            VALUES ";

            

          $index = 0; // Set index array awal dengan 0
          foreach($jml_beli as $databeli){

           // Kita buat perulangan berdasarkan nis sampai data terakhir

            $query .= "('".$kode_orderan[$index]."','".$databeli."','".$id_akun[$index]."','".$nama_barang[$index]."','".$nama_kategori[$index]."','".$harga_barang[$index]."','".$subtotal_beli[$index]."','".$stok_beli[$index]."','".$warna_beli[$index]."','".$bank_bayar."','".$jenis_kirim[$index]."','".$ekspedisi."','".$paket_kurir."','".$tarif_paket."','".$berat_barang[$index]."','".$tgl_pesanan[$index]."','Menunggu Pembayaran'),";
            $index++;
          }

          // Kita hilangkan tanda koma di akhir query
          // sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
          // INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
          $query = substr($query, 0, strlen($query) - 1).";";
          mysqli_query($koneksi, $query);

          $sql  = 'DELETE FROM tb_keranjang WHERE id_akun="'.$_SESSION[id_akun].'"';
          $querydel  = mysqli_query($koneksi,$sql);

          
            
            if ($query) {
               echo '<script>setTimeout(function() { 
                    swal("Ditambahkan!", "Data Berhasil Ditambahkan Ke Keranjang", "success").then(function() { 
                            window.location.href="../../notif_beli.php "; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Ditambahkan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="../../keranjang.php "; 
                        }); 
                    }); </script>' ;
             }

}

?>

<!-- jquery, popper and bootstrap js -->
<script src="../../js/sweetalert2.min.js"></script>
    </body>
    </html>