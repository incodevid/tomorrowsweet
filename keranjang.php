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



            $sqlk = mysqli_query($koneksi, "SELECT *,COUNT(id_barang) AS jumlah_item FROM tb_keranjang where id_akun='$id_akun' ");
            $dataker = mysqli_fetch_assoc($sqlk);
            
        
 ?>
<!DOCTYPE html>
<html lang="en" class="grey-theme">


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Keranjang Belanja</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

   

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

    <!--Ini Datatablenya-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">

    <!-- Poppins fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
    min-height: 100%;
    height: auto;
    overflow-y: auto;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 22px;
    -webkit-overflow-scrolling: touch;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    </style>

    <style type="text/css">
        .header-logo {
    height: 30px;
    max-height: 48px;
    display: inline-block;
    vertical-align: middle;
    margin: 15px auto 0px auto;
}
    </style>
    
</head>

<body>
    <div class="row no-gutters vh-100 loader-screen" style="background-color: grey;">
        <div class="col align-self-center text-white text-center">
            <img src="img/logo-TS-white.png" height="200px" alt="logo">
            <h1><span class="font-weight-light">Tomorrow Sweet</span> <br>STORE</h1>
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
                <div class="col text-center"><img src="img/logo-TS-head-01.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="subtitle h6">
                <div class="d-inline-block">
                    Keranjang Belanja Ku<br>
                    <p class="small text-mute"><?php echo $dataker['jumlah_item'] ?> Items</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 px-0">
                    <ul class="list-group list-group-flush mb-4">
                        <?php 
                        function toangka($u){
                        $uang = intval(ereg_replace("[^0-9]", "", $u));
                        return $uang;
                        }
                        function harga($rp){
                            $harga = number_format ($rp, 0, ',', '.');
                            return "Rp.".$harga;
                            }
                        function toangka1($u1){
                        $uang1 = intval(ereg_replace("[^0-9]", "", $u1));
                        return $uang1;
                        }
                        
                        $n = 1; 
                        $queryk1 = mysqli_query($koneksi,"SELECT *,c.berat AS jml_ber FROM tb_keranjang a INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` 
                            INNER JOIN tb_barang c ON b.`id_barang`=c.`id_barang` 
                            WHERE a.id_akun='$id_akun'");
                        while($datak1  = mysqli_fetch_assoc($queryk1)){
                            $subtotal2      = $datak1[harga_barang]* $datak1[jumlah_stok];
                            $total2         = $total2 + $subtotal2;
                            

                        $queryk2 = mysqli_query($koneksi,"SELECT *,SUM(c.berat) AS jml_berat,SUM(a.jumlah_stok) AS jml_qty FROM tb_keranjang a 
                            INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` INNER 
                            JOIN tb_barang c ON b.`id_barang`=c.`id_barang` WHERE a.id_akun='$id_akun'");
                        $datak2 = mysqli_fetch_assoc($queryk2);

                        $jml_berat_sub  = $datak1[jml_ber] * $datak1[jumlah_stok] ;
                        $gtotal_berat   = $gtotal_berat + $jml_berat_sub;
                        $tot_hitung_berat = $datak2[jml_berat] / 1000;
                             
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-auto align-self-center">
                                    <a href="aksi/beli_keranjang/hapus_barang.php?id_keranjang=<?php echo $datak1['id_keranjang']; ?>" class="btn btn-sm btn-link p-0 float-right"><i class="material-icons">remove_circle</i></a>
                                </div>
                                <div class="col-2 pl-0 align-self-center">
                                    <figure class="product-image h-auto"><img src="img/produk/<?php echo $datak1['foto_barang']; ?>" alt="" class="vm"></figure>
                                </div>
                                <div class="col px-0">
                                    <a href="#" class="text-dark mb-1 h6 d-block"><?php echo $datak1['nama_barang']; ?></a>
                                    <h5 class="text-success font-weight-normal mb-0"><?php echo harga($datak1['harga_barang']) ?></h5>
                                    <p class="text-secondary small text-mute mb-0"><?php echo $datak1['status_barang']; ?><span class=" text-info ml-2">Stok <?php echo $datak1['stok_barang']; ?></span></p>
                                    <p class="text-secondary small text-mute mb-0"><span style="font-size: 12px;color:brown;" >Sub-Total <?php echo harga($subtotal2) ?></span></p>
                                    
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="input-group input-group-sm" >
                                        <div class="input-group-prepend">
                                            <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">remove</i></button>
                                        </div>
                                        <input  type="number" min="1" class="form-control w-35" placeholder="" value="<?php echo $datak1[jumlah_stok]; ?>" readonly>
                                        <input style="display: none" type="text"  value="<?php echo $datak1[harga_barang] ?>" />
                                        <div class="input-group-append">
                                            <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">add</i></button>
                                        </div>
                                    </div>
                                </div>
                                



                            </div>
                        </li>
                    <?php $n++; } ?>
                    </ul>
                </div>
                
                <?php

                $sqlkrnjg = mysqli_query($koneksi, "SELECT *,COUNT(id_detail_barang) AS jumlah_item_krjg FROM tb_keranjang where id_akun='$id_akun' ");
                $datakrnjg = mysqli_fetch_assoc($sqlkrnjg);

                if($datakrnjg['jumlah_item_krjg'] > "0"){
                ?>
                
                <div class="container">
                <div class="row bg-white">
                    <div class="col-12 col-md-12 col-lg-12">
                        <br>
                        <div class="card-body form-group float-label ">
                            <select class="form-control" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih kategori barang!')" oninput="setCustomValidity('')" required name="jasa" id="jasa" onchange="myFunction()">
                                <option></option>
                                <option value="ekspedisi" >EKSPEDISI</option>
                                <option value="ambil di toko">AMBIL DI TOKO</option>
                            </select>
                            <label class="form-control-label" style="color:grey ;">Pilih Cara Pengiriman</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else{ ?>

             <img src="img/keranjang_ksg.png" align="center" style="height: 200px;display: block; margin: auto;">
        <?php } ?>


        </div>




            

            <script>
                function myFunction() {
                        var x = document.getElementById("jasa").value;
                        if (x == "ekspedisi" ) {
                        document.getElementById("kat").style.display = "block";
                        document.getElementById("kat1").style.display = "none";
                    }else{

                        if (x == "ambil di toko" ) {
                        document.getElementById("kat").style.display = "none";
                        document.getElementById("kat1").style.display = "block";
                        }else{
                            document.getElementById("kat").style.display = "none";
                            document.getElementById("kat1").style.display = "none";
                        }
                   
                }
            }
                   
            </script>
            <br>
            <div id="kat" style="display: none;" class="row bg-white">
            <div class="form-group" >
            <form  method="POST">
            <br>    
            <div class="col-12 col-md-12 col-lg-12" style="display:none;">
                <div class="card-body form-group float-label ">
                    <select class="form-control " id="kota_tujuan"  name="kota_tujuan" required="" onchange="myFunctionSaya1(this.value)">
                    </select>
                    <label class="form-control-label" style="color:grey ;">Kota Tujuan</label>
                </div>
            </div>
            <div class="form-group" style="display:none;">
              <label class="control-label col-sm-3">Kota Tujuan</label>
              <div class="col-sm-9">          
                <input type="text" name="kota_tujuan" id="tujuan1" value="<?php echo $t['kabupaten']; ?>" >
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-body form-group float-label ">
                    <select class="form-control" id="kurir"  name="kurir" required="" onchange="myFunctionSaya2(this.value)" >
                      <option></option>
                      <option value="jne">JNE</option>
                      <option value="tiki">TIKI</option>
                      <option value="pos">POS INDONESIA</option>
                    </select>
                    <label class="form-control-label" style="color:grey ;">Ekspedisi</label>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-body form-group float-label active">
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control" id="berat" name="berat" required="" value="<?php echo $tot_hitung_berat ?>" readonly>
                    </div>
                    <label class="form-control-label" style="color:grey ;">Total Berat (Kg)</label>
                </div>
            </div>
          </form>
           </div>
          <?php

    
    $kota_tujuan = $_POST['kota_tujuan'];
    $kurir       = $_POST['kurir'];
    $berat       = $_POST['berat'] / 1000;

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=".'326'."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: 091cd2af1b6e9dfef167d53406edd4c3"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $data= json_decode($response, true);
    $kurir=$data['rajaongkir']['results'][0]['name'];
    $kotaasal=$data['rajaongkir']['origin_details']['city_name'];
    $provinsiasal=$data['rajaongkir']['origin_details']['province'];
    $kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
    $provinsitujuan=$data['rajaongkir']['destination_details']['province'];
    $berat=$data['rajaongkir']['query']['weight']/1000;

?>

          
         <div class="card mb-4 border-0 shadow-sm border-top-dashed">
            <div class="card-body text-center">
            <p class="text-secondary my-1">Total Pembayaran</p>
            <p class="text-secondary my-1"><?php echo $t['nama_akun']; ?></p>
                    <h3 class="mb-0" id="hasiltot2" ><?php
                     
                     echo harga($total2)
                    
                     ?></h3>
                    <br>
                    <a id="btn_periksa" style="display: none ;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"><span>Periksa Pesanan</span><i class="material-icons">arrow_forward</i></a>
                </div>
            </div>
          </div> 
          <div class="card mb-4 border-0 shadow-sm border-top-dashed" id="kat1" style="display: none;">
                <div class="card-body text-center">
                    <p class="text-secondary my-1">Total Pembayaran</p>
                    <p class="text-secondary my-1"><?php echo $t['nama_akun']; ?></p>
                    <h3 class="mb-0"  ><?php echo harga($total2) ?></h3>
                    <br>
                    <a data-toggle="modal" data-target="#tanpaKurirModal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"><span>Periksa Pesanan</span><i class="material-icons">arrow_forward</i></a>
                </div>
            </div>    
            

            
            



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
                            <a href="keranjang.php" class="btn btn-default shadow centerbutton active">
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

    <!-- Modal Checkout -->


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <center><h5 class="header-title mb-0 align-self-center">Cek Pembelian</h5></center>
                </div>
                <div class="modal-body text-center pr-7 pl-7">
            <form class="was-validated" action="aksi/beli/beli.php" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 px-0">
                    <ul class="list-group list-group-flush mb-4">
                        <?php 
                        $n = 1; 
                        $queryk12 = mysqli_query($koneksi,"SELECT * FROM tb_keranjang a INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` 
                            INNER JOIN tb_barang c ON b.`id_barang`=c.`id_barang` 
                            WHERE a.id_akun='$id_akun'");
                        while($datak12  = mysqli_fetch_assoc($queryk12)){
                            $subtotal    = $datak12[harga_barang]* $datak12[jumlah_stok];
                            $total       = $total + $subtotal;
                              
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-auto align-self-center">
                                    <a href="aksi/beli_keranjang/hapus_barang.php?id_keranjang=<?php echo $datak12['id_keranjang']; ?>" class="btn btn-sm btn-link p-0 float-right"><i class="material-icons">remove_circle</i></a>
                                </div>
                                <div class="col-2 pl-0 align-self-center">
                                    <figure class="product-image h-auto"><img src="img/produk/<?php echo $datak12['foto_barang']; ?>" alt="" class="vm"></figure>
                                </div>
                                <div class="col px-0">
                                    <a href="#" class="text-dark mb-1 h6 d-block"><?php echo $datak12['nama_barang']; ?></a>
                                    <h5 class="text-success font-weight-normal mb-0"><?php echo harga($datak12['harga_barang']) ?></h5>
                                    <p class="text-secondary small text-mute mb-0"><?php echo $datak12['status_barang']; ?></p>
                                    <p><span class=" text-info ml-2">Warna : <?php echo $datak12['warna_beli']; ?></span><br>
                                        <span class=" text-info ml-2">Ukuran : <?php echo $datak12['ukuran_beli']; ?></span><br>
                                        <span style="font-size: 12px;color:brown;" id="total[<?php echo $n ?>]" >Sub-Total <?php echo harga($subtotal) ?></span>
                                    </p>
                                    <p class="text-secondary small text-mute mb-0"></p>
                                </div>
                                
                            </div>
                            <div class=" align-self-center">
                                    <div class="input-group input-group-sm" >
                                        <div class="input-group-prepend">
                                            <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">remove</i></button>
                                        </div>
                                        <input id="jumlah_stok[<?php echo $n ?>]" name="jumlah_stok[<?php echo $n ?>]" onchange="hitung(this.value,<?php echo $n ?>)"  type="number" min="1" class="form-control w-35" placeholder="" value="<?php echo $datak12[jumlah_stok]; ?>" readonly>
                                        <input style="display: none" type="text" id="harga_barang[<?php echo $n ?>]" name="harga_barang[<?php echo $n ?>]" value="<?php echo $datak12[harga_barang] ?>" />
                                        <div class="input-group-append">
                                            <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">add</i></button>
                                        </div>
                                    </div>
                                </div>
                        </li>
                    <?php $n++; } ?>
                    </ul>
                </div>
            </div>
            <script>

            function toA(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
            
            function toR(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Sub-Total Rp. '+e(d)}

            function toS(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.'+e(d)}

           

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
            <script type="text/javascript">
            function hitung(a,n){   
            document.getElementById("hasiltot").style.display = "none";            
            var harga_barang = document.getElementById("harga_barang["+n+"]").value;
            document.getElementById("total["+n+"]").innerHTML = toR(a*harga_barang);
            total();
            }
            function total(){
            var has = 0;
            for ( i = 1; i < <?php echo $n ?>;i++) {

            tot = document.getElementById("total["+i+"]").innerHTML;
            has += toA(tot);
            }


            document.getElementById("hasil").innerHTML = toS(has);

            }


            
            </script>
            
            <div class="col-12 px-0" id="response_ongkir" ></div>
             
             
  

    

    
    
    <script>
      

      function toP(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.'+e(d)}
    </script>


    
          
            
            <script>
                function myFunctionBank() {
                        var x = document.getElementById("bankcek").value;
                        if (x == "BRI") {
                        document.getElementById("hatot").style.display = "block";
                    }else{
                        if (x == "BCA") {
                        document.getElementById("hatot").style.display = "block";
                        }else{
                        document.getElementById("hatot").style.display = "none";
                     }
                   
                }
            }
                   
            </script>
            
           
            <div class="card-body form-group  ">
            <label style="color:grey;float: left;">Pembayaran Melalui Bank</label>
                <select class="custom-select" style="font:normal 14px Arial" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih bank pembayaran!')" name="bankcek" id="bankcek" oninput="setCustomValidity('')" onchange="myFunctionBank(this.value)" required>
                    <option value="" >-- PILIH BANK BAYAR --</option>
                    <option value="BRI">BRI</option>
                    <option value="BCA">BCA</option>
                </select>
            </div>
           
           
            
            <?php 
                        $t = 1; 
                        $today = date("Ymd");
                        $sqljang = mysqli_query($koneksi,"SELECT * FROM tb_keranjang a INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` 
                        INNER JOIN tb_barang c ON b.`id_barang`=c.`id_barang` INNER JOIN tb_kategori d ON 
                        c.id_kategori=d.id_kategori WHERE a.id_akun='$id_akun'");
                        while($datakjang  = mysqli_fetch_assoc($sqljang)){
                            $subtotaljang    = $datakjang[harga_barang]* $datakjang[jumlah_stok];
                            $totaljang       = $totaljang + $subtotaljang;

                            // mengambil data barang dengan kode paling besar
                            $querykod = mysqli_query($koneksi, "SELECT max(kode_orderan) as kodeTerbesar FROM tb_orderan");
                            $datakod = mysqli_fetch_assoc($querykod);
                            $kodeBarang = $datakod['kodeTerbesar'];
                         
                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan = (int) substr($kodeBarang, 13, 3);
                         
                            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                            $urutan++;
                         
                            // membentuk kode barang baru
                            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                            
                            $huruf = "INV-".$today."-";
                            $kodeBarang = $huruf.sprintf("%03s", $urutan);
                              
                        ?>
           
                <input type="hidden" name="kodeBarang[]" value="<?php echo $kodeBarang ?>" class="form-control">
                <input type="hidden" name="jml_beli[]" value="<?php echo $t ?>" class="form-control">
                <input type="hidden" name="id_akun[]" value="<?php echo $_SESSION['id_akun']; ?>" class="form-control">
                <input type="hidden" name="nama_barang[]" value="<?php echo $datakjang['nama_barang']; ?>" class="form-control">
                <input type="hidden" name="nama_kategori[]" value="<?php echo $datakjang['nama_kategori']; ?>" class="form-control">
                <input type="hidden" name="harga_brg[]" value="<?php echo $datakjang['harga_barang']; ?>" class="form-control ">
                <input type="hidden" name="stok_beli[]" value="<?php echo $datakjang['jumlah_stok']; ?>" class="form-control ">
                <input type="hidden" name="warna_beli[]" value="<?php echo $datakjang['warna_beli']; ?>" class="form-control">
                <input type="hidden" name="ukuran_beli[]" value="<?php echo $datakjang['ukuran_beli']; ?>" class="form-control">
                <input type="hidden" name="berat_barang[]" value="<?php echo $datakjang['berat']; ?>" class="form-control">
                <input type="hidden" name="subtotal_beli[]" value="<?php echo $subtotaljang ?>" class="form-control ">
                <input type="hidden" name="tgl_pesanan[]" value="<?php echo date('Y-m-d H:i:s') ?>" class="form-control ">
                <input type="hidden" name="jenis_kirim[]" value="EKSPEDISI" class="form-control ">
          

                <?php $t++; } ?>

            
            
                <input type="hidden" name="kurir" id="kurir1" value="" >
                <input type="hidden" name="tarif"  id="tarif" value="" class="form-control ">
                <input type="hidden" name="ongkir" id="ongkir" value="" class="form-control ">
                <input type="hidden" name="paket"  id="paket" value="" class="form-control ">
                <input type="hidden" name="lama"   id="lama" value="" class="form-control ">
          


            <div class="card mb-4 border-0 shadow-sm border-top-dashed">
                <div class="card-body text-center">
                    <p class="text-secondary my-1">Total Pembayaran</p>
                    <h3 class="mb-0" id="hasil" ><?php echo harga($total) ?></h3>
                    <br>
                </div>
                <div class="card-body text-center" id="hatot2" style="display: none;" >
                    <p class="text-secondary my-1">Grand Total Pembayaran</p>
                    <h3 class="mb-0" id="hasiltot" ><?php echo harga($total) ?></h3>
                    <br>
                </div>
            </div>
            <br>
            <button id="hatot" style="display: none;" type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"  >BELI</button>
            <button type="button" onClick="window.location.reload();" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>



<!--MODAL TANPA EKSPEDISI-->

    <div class="modal fade" id="tanpaKurirModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <center><h5 class="header-title mb-0 align-self-center">Cek Pembelian</h5></center>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
            <form class="was-validated" action="aksi/beli/beli_noekspedisi.php" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-12 px-0">
                    <ul class="list-group list-group-flush mb-4">
                        <?php 
                        $h = 1; 
                        $querytot2 = mysqli_query($koneksi,"SELECT * FROM tb_keranjang a INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` 
                        INNER JOIN tb_barang c ON b.`id_barang`=c.`id_barang` INNER JOIN tb_kategori d ON 
                        c.id_kategori=d.id_kategori WHERE a.id_akun='$id_akun'");
                        while($dataktot2  = mysqli_fetch_assoc($querytot2)){
                            $subtotaltot2    = $dataktot2[harga_barang]* $dataktot2[jumlah_stok];
                            $totaltot2       = $totaltot2 + $subtotaltot2;
                              
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-auto align-self-center">
                                    <a href="aksi/beli_keranjang/hapus_barang.php?id_keranjang=<?php echo $dataktot2['id_keranjang']; ?>" class="btn btn-sm btn-link p-0 float-right"><i class="material-icons">remove_circle</i></a>
                                </div>
                                <div class="col-2 pl-0 align-self-center">
                                    <figure class="product-image h-auto"><img src="img/produk/<?php echo $dataktot2['foto_barang']; ?>" alt="" class="vm"></figure>
                                </div>
                                <div class="col px-0">
                                    <a href="#" class="text-dark mb-1 h6 d-block"><?php echo $dataktot2['nama_barang']; ?></a>
                                    <h5 class="text-success font-weight-normal mb-0"><?php echo harga($dataktot2['harga_barang']) ?></h5>
                                    <p class="text-secondary small text-mute mb-0"><?php echo $dataktot2['status_barang']; ?><span class=" text-info ml-2">Warna <?php echo $dataktot2['warna_beli']; ?></span><br>
                                        <span class=" text-info ml-2">Ukuran : <?php echo $dataktot2['ukuran_beli']; ?></span><br>
                                        <span style="font-size: 12px;color:brown;" id="total1[<?php echo $h ?>]" >Sub-Total <?php echo harga($subtotaltot2) ?></span>
                                    </p>
                                    <p class="text-secondary small text-mute mb-0"></p>
                                </div>
                                
                            </div>
                            <div class=" align-self-center">
                                <div class="input-group input-group-sm" >
                                    <div class="input-group-prepend">
                                        <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">remove</i></button>
                                    </div>
                                    <input id="jumlah_stok[<?php echo $h ?>]" name="jumlah_stok[<?php echo $h ?>]" onchange="hitung1(this.value,<?php echo $h ?>)" type="number" min="1" class="form-control w-35" placeholder="" value="<?php echo $dataktot2[jumlah_stok]; ?>" readonly >
                                    <input style="display: none" type="text" id="harga_barang[<?php echo $h ?>]" name="harga_barang[<?php echo $h ?>]" value="<?php echo $dataktot2[harga_barang] ?>" />
                                    <div class="input-group-append">
                                        <button  class="btn btn-light-grey px-1" type="button"><i class="material-icons">add</i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php $h++; } ?>
                    </ul>
                </div>
            </div>
            <script>

            function toJ(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Sub-Total Rp. '+e(d)}

            function toY(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.'+e(d)}

            function toH(rps){return parseInt(rps.replace(/,.*|\D/g,''),10)}

            </script>
            <script type="text/javascript">
            function hitung1(f,h){               
            var harga_barang = document.getElementById("harga_barang["+h+"]").value;
            document.getElementById("total1["+h+"]").innerHTML = toJ(f*harga_barang);
            total1();
            }
            function total1(){
            var has1 = 0;
            for ( i = 1; i < <?php echo $h ?>;i++) {

            tot1 = document.getElementById("total1["+i+"]").innerHTML;
            has1 += toH(tot1);
            }




            document.getElementById("hasilNoKurir").innerHTML = toY(has1);
            }
            </script>
            
            
            <div class="card-body form-group  ">
                <select class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih kategori barang!')" name="bankcek2" oninput="setCustomValidity('')" required>
                    <option value="">-- PILIH BANK BAYAR --</option>
                    <option value="BRI">BRI</option>
                    <option value="BCA">BCA</option>
                </select>
            </div>
            <?php 
                        $i = 1; 
                        $today2 = date("Ymd");
                        $sqljang2 = mysqli_query($koneksi,"SELECT * FROM tb_keranjang a INNER JOIN tb_detail_barang b ON a.`id_detail_barang`=b.`id_detail_barang` 
                        INNER JOIN tb_barang c ON b.`id_barang`=c.`id_barang` INNER JOIN tb_kategori d ON 
                        c.id_kategori=d.id_kategori WHERE a.id_akun='$id_akun'");
                        while($datakjang2  = mysqli_fetch_assoc($sqljang2)){
                            $subtotaljang2    = $datakjang2[harga_barang] * $datakjang2[jumlah_stok];
                            $totaljang2       = $totaljang2 + $subtotaljang2;

                            $sisa_stok        = $datakjang2[stok_barang] - $datakjang2[jumlah_stok];


                            // mengambil data barang dengan kode paling besar
                            $querykod2 = mysqli_query($koneksi, "SELECT max(kode_orderan) as kodeTerbesar FROM tb_orderan");
                            $datakod2 = mysqli_fetch_assoc($querykod2);
                            $kodeBarang2 = $datakod2['kodeTerbesar'];
                         
                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan2 = (int) substr($kodeBarang2, 15, 3);
                         
                            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                            $urutan2++;
                         
                            // membentuk kode barang baru
                            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                            
                            $huruf2 = "INVTK-".$today2."-";
                            $kodeBarang2 = $huruf2.sprintf("%03s", $urutan2);
                              
                        ?>
                
                
                <input type="hidden" name="kodeBarang2[]" value="<?php echo $kodeBarang2 ?>" class="form-control">
                <input type="hidden" name="jml_beli2[]" value="<?php echo $i ?>" class="form-control">
                <input type="hidden" name="id_akun2[]" value="<?php echo $_SESSION['id_akun']; ?>" class="form-control">
                <input type="hidden" name="nama_barang2[]" value="<?php echo $datakjang2['nama_barang']; ?>" class="form-control">
                <input type="hidden" name="nama_kategori2[]" value="<?php echo $datakjang2['nama_kategori']; ?>" class="form-control">
                <input type="hidden" name="harga_brg2[]" value="<?php echo $datakjang2['harga_barang']; ?>" class="form-control ">
                <input type="hidden" name="stok_beli2[]" value="<?php echo $datakjang2['jumlah_stok']; ?>" class="form-control ">
                <input type="hidden" name="warna_beli2[]" value="<?php echo $datakjang2['warna_beli']; ?>" class="form-control">
                <input type="hidden" name="ukuran_beli2[]" value="<?php echo $datakjang2['ukuran_beli']; ?>" class="form-control">
                <input type="hidden" name="berat_barang2[]" value="<?php echo $datakjang2['berat']; ?>" class="form-control">
                <input type="hidden" name="subtotal_beli2[]" value="<?php echo $subtotaljang2 ?>" class="form-control ">
                <input type="hidden" name="tgl_pesanan2[]" value="<?php echo date('Y-m-d H:i:s') ?>" class="form-control ">
                <input type="hidden" name="jenis_kirim2[]" value="AMBIL DI TOKO" class="form-control ">
        
            <?php $i++; } ?>

                <input type="hidden" name="kurir2"  value="-" >
                <input type="hidden" name="paket2"  value="-" class="form-control ">
                <input type="hidden" name="tarif2"   value="-" class="form-control ">

            <div class="card mb-4 border-0 shadow-sm border-top-dashed">
                <div class="card-body text-center">
                    <p class="text-secondary my-1">Grand Total Pembayaran</p>
                    <h3 class="mb-0" id="hasilNoKurir" ><?php echo harga($totaltot2) ?></h3>
                    <br>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow"  >BELI</button>
            <button type="button" onClick="window.location.reload();" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
            <br>
        </form>
                </div>
            </div>
        </div>
    </div>


            

    

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

    <!--Ini Datatablenya-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    

    <!-- template custom js -->
    <script src="js/main.js"></script>


    <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
    <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script> 
     <script>
            function myFunctionSaya1() {
              var kot1 = document.getElementById("kota_tujuan").value;
              document.getElementById("tujuan1").value = kot1;
            }
            function myFunctionSaya2(){
          var y = document.getElementById("kurir").value;
          document.getElementById("kurir1").value = y;

          if ( y == "") {
            document.getElementById("btn_periksa").style.display = "none";
        }else{
            document.getElementById("btn_periksa").style.display = "block";
        };


        }
            </script>
        <script>
        $( document ).ready(function() {
           $('#kota_asal').select2({
              placeholder: 'Pilih kota/kabupaten asal',
              language: "id"
           });

           $('#kota_tujuan').select({
              placeholder: 'Pilih kota/kabupaten tujuan',
              language: "id"
           });

            $.ajax({
              type: "GET",
              dataType: "html",
              url: "data-kota.php?q=kotaasal", 
              success: function(msg){
              $("select#kota_asal").html(msg);                                                     
              }
            });    
         
          $.ajax({
              type: "GET",
              dataType: "html",
              url: "data-kota.php?q=kotatujuan",
              success: function(msg){
              $("select#kota_tujuan").html(msg);                                                     
              }
           });


         
          $("select[name=kurir]").on("change",function(){
              var kurir_terpilih = $("input[name=kurir]").val();
              var tujuan_terpilih = $("input[name=kota_tujuan]").val();
              var total_berat = $("input[name=berat]").val();
              $.ajax({
                  url: 'cek-ongkir.php',
                  type: 'post',
                  data: 'kurir='+kurir_terpilih+'&kota_tujuan='+tujuan_terpilih+'&berat='+total_berat,
                  success: function(data) {
                    $("#response_ongkir").html(data);
                  }
              });
        });

        });


          </script>


    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });

    </script>

    

    

    


</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:21 GMT -->
</html>
