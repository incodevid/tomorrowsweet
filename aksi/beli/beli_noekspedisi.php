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

    
    $kode_orderan         = $_POST['kodeBarang2'];
    $jml_beli             = $_POST['jml_beli2'];
    $jml_beli2            = $_POST['jml_beli2'];
    $id_akun              = $_POST['id_akun2'];
    $nama_barang          = $_POST['nama_barang2'];
    $nama_kategori        = $_POST['nama_kategori2'];
    $harga_barang         = $_POST['harga_brg2'];
    $subtotal_beli        = $_POST['subtotal_beli2'];
    $stok_beli            = $_POST['stok_beli2'];
    $warna_beli           = $_POST['warna_beli2'];
    $ukuran_beli          = $_POST['ukuran_beli2'];
    $bank_bayar           = $_POST['bankcek2'];
    $jenis_kirim          = $_POST['jenis_kirim2'];
    $ekspedisi            = $_POST['kurir2'];
    $paket_kurir          = $_POST['paket2'];
    $tarif_paket          = $_POST['tarif2'];
    $berat_barang         = $_POST['berat_barang2'];
    $tgl_pesanan          = $_POST['tgl_pesanan2'];
    $id_detail_barang     = $_POST['id_detail_barang'];
    $sisa_stok            = $_POST['sisa_stok'];





      

            
            
            $query = "INSERT INTO tb_orderan (kode_orderan,jml_beli,id_akun,nama_barang,nama_kategori,harga_barang,subtotal_beli,stok_beli,warna_beli,ukuran_beli,bank_bayar,jenis_kirim,ekspedisi,paket_kurir,tarif_paket,berat_barang,tgl_pesanan,status_beli) 
            VALUES ";



            

          $index = 0; // Set index array awal dengan 0
          foreach($jml_beli as $databeli){

           // Kita buat perulangan berdasarkan nis sampai data terakhir

            $query .= "('".$kode_orderan[$index]."','".$databeli."','".$id_akun[$index]."','".$nama_barang[$index]."','".$nama_kategori[$index]."','".$harga_barang[$index]."','".$subtotal_beli[$index]."','".$stok_beli[$index]."','".$warna_beli[$index]."','".$ukuran_beli[$index]."','".$bank_bayar."','".$jenis_kirim[$index]."','".$ekspedisi."','".$paket_kurir."','".$tarif_paket."','".$berat_barang[$index]."','".$tgl_pesanan[$index]."','Menunggu Pembayaran'),";
            $index++;
          }

          // Kita hilangkan tanda koma di akhir query
          // sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
          // INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
          $query = substr($query, 0, strlen($query) - 1).";";
          mysqli_query($koneksi, $query);

         
          $selSto  =mysqli_query($koneksi, 'SELECT * FROM tb_keranjang WHERE id_akun="'.$_SESSION[id_akun].'"  ');
          while($sto =mysqli_fetch_assoc($selSto)){

          $qstok = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_detail_barang WHERE id_detail_barang='$sto[id_detail_barang]'"))  ; 
          $stok = $qstok[stok_barang] - $sto[jumlah_stok];

          mysqli_query($koneksi,"UPDATE tb_detail_barang SET stok_barang = '$stok' WHERE id_detail_barang= '$sto[id_detail_barang]' ");


         }


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