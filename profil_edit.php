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
            
        
 ?>
<!doctype html>
<html lang="en" class="grey-theme">


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/profile-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Profil Akun</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

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

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">


</head>

<body>
    <div class="row no-gutters vh-100 loader-screen" style="background-color: grey;">
        <div class="col align-self-center text-white text-center">
            <img src="img/alfazza_4.png" height="200px" alt="logo">
            <h1><span class="font-weight-light">ALFAZZA</span> <br>HOME SHOPING</h1>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <a href="profil.php"  class="btn  btn-link text-dark"><i class="material-icons">navigate_before</i></a>
                </div>
                <div class="col text-center"><img src="img/alfazza_4.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profil.php" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center">
                <div class="figure-profile shadow my-4">
                    <figure><img src="img/akun/<?php echo $t['foto']; ?>" alt=""></figure>
                    <div class="btn btn-dark text-white floating-btn">
                        <i data-toggle="modal" data-target="#exampleModalCenter" class="material-icons">camera_alt</i>
                    </div>
                </div>
            </div>
            <?php
            
           
        if (isset($_POST['btnSimpan'])) {
        
        $id_akun             = $_SESSION['id_akun'];
        $nama_akun           = $_POST['nama_akun']; 
        $email               = $_POST['email']; 
        $jenis_kelamin       = $_POST['jenis_kelamin']; 
        $nomor_hp            = $_POST['nomor_hp']; 
        $provinsi            = $_POST['provinsi'];
        $nm_prov             = $_POST['nm_prov']; 
        $nm_kab              = $_POST['nm_kab'];  
        $kabupaten           = $_POST['nama_kota'];
        $kecamatan           = $_POST['kecamatan'];
        $kelurahan           = $_POST['kelurahan'];
        $kode_pos            = $_POST['kode_pos'];
        $alamat              = $_POST['alamat'];
        

            

            $sql = mysqli_query($koneksi," UPDATE tb_akun SET nama_akun='$nama_akun', email='$email', jenis_kelamin='$jenis_kelamin', nomor_hp='$nomor_hp', provinsi='$provinsi',nm_prov='$nm_prov', kabupaten='$kabupaten', nm_kab='$nm_kab',kecamatan='$kecamatan', kelurahan='$kelurahan', kode_pos='$kode_pos', alamat='$alamat' WHERE id_akun='$id_akun'  ");
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Dirubah!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="profil_edit.php"; 
                        }); 
                    }); </script>' ;
             } else {
              echo '<script>setTimeout(function() { 
                    swal("Data Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="profil_edit.php"; 
                        }); 
                    }); </script>' ;
             }
            
/* 
}
*/
    }
     
           
    ?>
    <?php
if (isset($_POST['btnSimpanFoto'])) {
    
    
    $id_akun                = $t['id_akun'];  
    $nama_akun              = $t['nama_akun'];
    $jam                    = date('His');
    $namafolder             ="img/akun/";
    


if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  $nama_akun."-UPDATE-".$jam.".jpg";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $jpg)) {

            
            $sql = mysqli_query($koneksi,"UPDATE tb_akun SET  
                foto='$jpg' WHERE id_akun='$id_akun'");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Data Berhasil Dirubah!", "Klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="profil_edit.php"; 
                        }); 
                    }); </script>' ;
      } else {
              echo '<script>setTimeout(function() { 
                    swal("Data Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.location.href="profil_edit.php"; 
                        }); 
                    }); </script>' ;
       }
       } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Foto Gagal Dirubah!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.location.href="profil_edit.php"; 
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
              window.location.href="profil_edit.php"; 
          }); 
      }); 
      </script> 

      <?php
 } 
    }

  }
  
       
  ?>

            <form method="POST" enctype="multipart/form-data" >

            <h6 class="subtitle">Ubah / Perbarui Informasi Akun</h6>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group float-label active">
                        <input type="text" class="form-control" name="nama_akun" oninvalid="this.setCustomValidity('Harap isi nama lengkap sesuai KTP!')" oninput="setCustomValidity('')" required value="<?php echo $t['nama_akun']; ?>">
                        <label class="form-control-label">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group float-label active">
                        <input type="text" class="form-control" name="email" oninvalid="this.setCustomValidity('Harap isi email yang aktif!')" oninput="setCustomValidity('')" required value="<?php echo $t['email']; ?>" autocomplete="off">
                        <label class="form-control-label">Alamat Email</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group float-label active">
                        <select class="form-control" name="jenis_kelamin" oninvalid="this.setCustomValidity('Harap pilih jenis kelamin!')" oninput="setCustomValidity('')" required>
                            <option value="<?php echo $t['jenis_kelamin']; ?>"><?php echo $t['jenis_kelamin']; ?></option>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label class="form-control-label">Jenis Kelamin</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group float-label active">
                        <input type="text" class="form-control" autocomplete="off" maxlength="12" name="nomor_hp" oninvalid="this.setCustomValidity('Harap isi nomor hp/wa yang aktif!')" oninput="setCustomValidity('')" required value="<?php echo $t['nomor_hp']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" >
                        <label class="form-control-label">No. HP/ WA</label>
                    </div>
                </div>
            </div>

            <h6 class="subtitle">Alamat Lengkap</h6>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group float-label ">
                        <select class="form-control" id="provinsi" name="provinsi" oninvalid="this.setCustomValidity('Harap pilih provinsi!')" oninput="setCustomValidity('')" required autocomplete="off"></select>
                    <label class="form-control-label">Pilih Provinsi</label>
                    <input type="hidden" id="nm_prov" name="nm_prov">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group float-label ">
                        <select class="form-control " id="nama_kota"  name="nama_kota" oninvalid="this.setCustomValidity('Harap pilih kabupaten!')" oninput="setCustomValidity('')" required autocomplete="off">
                    </select>
                    <label class="form-control-label">Pilih Kabupaten</label>
                    <input type="hidden" id="nm_kab" name="nm_kab">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group float-label ">
                        <input class="form-control" id="kecamatan" name="kecamatan" oninvalid="this.setCustomValidity('Harap pilih kecamatan!')" oninput="setCustomValidity('')" required autocomplete="off" >
                        <label class="form-control-label">Kecamatan</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group float-label ">
                        <input type="text" id="pertama" autocomplete="off" maxlength="5" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="kode_pos" class="form-control" oninvalid="this.setCustomValidity('Harap isi kode pos!')" oninput="setCustomValidity('')" required  >
                        <label class="form-control-label">Kode Pos</label>
                    </div>
                    <i><span id="kdpos_ingat" style="color: red;" >5</span> <a style="color:red;">Dari batas jumlah nomor</a></i>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group float-label ">
                        <input class="form-control" id="kelurahan" name="kelurahan" oninvalid="this.setCustomValidity('Harap pilih kelurahan!')" oninput="setCustomValidity('')" required autocomplete="off" >
                        <label class="form-control-label">Kelurahan</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group float-label ">
                        <input type="text" class="form-control" maxlength="100" autocomplete="off" required oninvalid="this.setCustomValidity('Harap isi alamat!')" oninput="setCustomValidity('')" name="alamat"  >
                        <label class="form-control-label">Alamat</label>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow" value="SIMPAN" name="btnSimpan">
            <br>
        </form>
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

    <!-- Modal -->
     
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Ubah Foto</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="img/akun/<?php echo $t['foto']; ?>" alt="user image">
                    </figure>
                    <h5 class="my-3"><?php echo $t['nama_akun']; ?></h5>
                   
                    <form  class="was-validated" method="POST" enctype="multipart/form-data">
                    
                    <div class="custom-file">
                            <input name="nama_file" type="file"  class="form-control" oninvalid="this.setCustomValidity('Harap pilih file foto!')" oninput="setCustomValidity('')"  required >
                            <div class="invalid-feedback">Foto belum di pilih.</div>
                    </div>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" name="btnSimpanFoto" class="btn btn-default btn-rounded btn-block col">SIMPAN</button>
                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default text-white btn-block btn-rounded shadow">Batal</button>
                    </div>
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

    <!-- chart js -->
    <script src="vendor/chartjs/Chart.min.js"></script>
    <script src="vendor/chartjs/utils.js"></script>

    <!-- chosen multiselect js -->
    <script src="vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>

    <!--Ini javascript sweet alertnya -->
    <script src="js/sweetalert2.min.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {});

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
$( document ).ready(function() {
   
  $.ajax({
      type: "post",
      url: "data-prov.php", 
      success: function(hasil_provinsi)
      {

       $("select[name=provinsi]").html(hasil_provinsi);                                                     
      }
    });
  
  $("select[name=provinsi]").on("change",function(){
    var id_provinsi_pilih = $("option:selected",this).attr("id_provinsi");
    $.ajax({
      type:'post',
      url:'data_kota.php',
      data:'id_provinsi='+id_provinsi_pilih,
      success:function(hasil_kota)
      {
        $("select[name=nama_kota]").html(hasil_kota);
        console.log(hasil_kota);
      }
    });
  });

  $("select[name=nama_kota]").on("change",function(){
    var provinsi = $(this).find('option:selected').data('provinsi');
    var nama_kota = $(this).find('option:selected').data('nama_kota');

    $("#nm_prov").val(provinsi);
    $("#nm_kab").val(nama_kota);

  });
    
});


  </script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>

<script type="text/javascript">
    var maxLength = 5;
$('#pertama').keyup(function() {
  var textlen = maxLength - $(this).val().length;
  $('#kdpos_ingat').text(textlen);
});
</script>



</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/profile-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:24 GMT -->
</html>
