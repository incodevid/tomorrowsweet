<?php 
include"config.php";
?>
<!doctype html>
<html lang="en" class="grey-theme">
 

<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Buat Akun</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    
    <!-- Chosen multiselect CSS -->
    <link href="vendor/chosen_v1.8.7/chosen.min.css" rel="stylesheet">

    <!-- nouislider CSS -->
    <link href="vendor/nouislider/nouislider.min.css" rel="stylesheet">
      



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

<?php

if (isset($_POST['btnSimpan'])) {
    
    $nama_akun       = mysqli_real_escape_string($koneksi, $_POST['nama_akun']); 
    $username        = mysqli_real_escape_string($koneksi, $_POST['username']); 
    $password        = mysqli_real_escape_string($koneksi, $_POST['password']); 
    $jenis_kelamin   = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']); 
    $email           = mysqli_real_escape_string($koneksi, $_POST['email']); 
    $nomor_hp        = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    $provinsi        = mysqli_real_escape_string($koneksi, $_POST['provinsi']); 
    $nm_prov         = mysqli_real_escape_string($koneksi, $_POST['nm_prov']); 
    $nm_kab          = mysqli_real_escape_string($koneksi, $_POST['nm_kab']); 
    $kabupaten       = mysqli_real_escape_string($koneksi, $_POST['nama_kota']);
    $kecamatan       = mysqli_real_escape_string($koneksi, $_POST['kecamatan']);
    $kelurahan       = mysqli_real_escape_string($koneksi, $_POST['kelurahan']);
    $kode_pos        = mysqli_real_escape_string($koneksi, $_POST['kode_pos']);
    $alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $namafolder      ="img/akun/";


$sql = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE nama_akun='$nama_akun' OR username='$username' ") or die(mysql_error());
$cek=mysqli_num_rows($sql);

if ($cek>0){
   echo '<script>setTimeout(function() { 
        swal("Gagal Tersimpan! Nama atau Username Sudah Ada", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                window.history.back(-1); 
            }); 
        }); </script>' ;
} else {

if (!empty($_FILES["nama_file"]["tmp_name"])) {   
    $jenis_gambar=$_FILES['nama_file']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {      
     $jpg =  $nama_akun.".jpg";               
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $namafolder . $jpg)) {

            
            $sql = mysqli_query($koneksi,"INSERT INTO tb_akun (nama_akun,username,password,jenis_kelamin,email,nomor_hp,provinsi,nm_prov,kabupaten,nm_kab,kecamatan,kelurahan,kode_pos,alamat,foto,status_akun) 
            VALUES ('$nama_akun','$username','$password','$jenis_kelamin','$email','$nomor_hp','$provinsi','$nm_prov','$kabupaten','$nm_kab','$kecamatan','$kelurahan','$kode_pos','$alamat','$jpg','Member')");

            
            if ($sql) {
               echo '<script>setTimeout(function() { 
                    swal("Daftar Akun Anda Berhasil!", "Silahkan login dengan klik tombol dibawah untuk melanjutkan", "success").then(function() { 
                            window.location.href="login.php"; 
                        }); 
                    }); </script>' ;
            } else {
              echo '<script>setTimeout(function() { 
                    swal("Gagal Tersimpan!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
                            window.history.back(-1); 
                        }); 
                    }); </script>' ;
             }
             } else {
    ?>        
    <script>setTimeout(function() { 
    swal("Gagal Diupload!", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.history.back(-1); 
        }); 
    }); </script>
    <?php
} 
    }
    else {    
     ?>
     <script>setTimeout(function() { 
    swal("Gagal Diupload! File Bukan Jpg / Foto", "Klik tombol dibawah untuk melanjutkan", "error").then(function() { 
            window.history.back(-1); 
        }); 
    }); </script>

      <?php
 } 
    }

}

    }
    
             
    ?>

<div class="wrapper ">
        <div class="header bg-template">
            <div class="row no-gutters bg-template">
                <div class="col text-center"><img src="img/alfazza_4.png" alt="" class="header-logo"></div>
            </div>
        </div>
      
    <div class=" vh-100 proh bg-template">
        <div class="col align-self-center px-3  text-center bg-template">
            <img src="img/alfazza_3.png" alt="logo" class="logo-small">
            <h2 class="text-white"><span class="font-weight-light">Buat</span> Akun</h2>
            <form class="form-signin shadow " method="POST" enctype="multipart/form-data" >

                <div class="form-group float-label active">
                    <input type="text" name="nama_akun" class="form-control" required  autofocus autocomplete="off">
                    <label class="form-control-label">Nama Lengkap</label>
                </div>

                <div class="form-group float-label ">
                    <input type="email" name="email" class="form-control" required  autofocus autocomplete="off">
                    <label class="form-control-label">Email</label>
                </div>

                <div class="form-group float-label ">
                    <select name="jenis_kelamin" class="form-control" required autocomplete="off">
                        <option value=""></option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label class="form-control-label">Pilih Jenis Kelamin</label>
                </div>
                
                <div class="form-group float-label ">
                    <input type="text" minlength="5" name="username"  class="form-control"  required autocomplete="off">
                    <label  class="form-control-label">Username</label>
                </div>

                <div class="form-group float-label">
                    <input type="password" minlength="6" name="password"  class="form-control" required autocomplete="off" id="pass">
                    <label  class="form-control-label">Password &nbsp;&nbsp;<span class="float-right" id="mybutton" onclick="change()"><i class="material-icons">visibility_off</i></span></label>
                    
                </div>

                <div class="form-group float-label ">
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="nomor_hp" maxlength="12" class="form-control" required  autocomplete="off">
                    <label class="form-control-label">Nomor Hp/Telp</label>
                </div>

                <div class="form-group float-label ">
                    <input type="text" name="alamat" class="form-control" required  autocomplete="off">
                    <label class="form-control-label">Alamat</label>
                </div>

                <div class="form-group float-label ">
                    <select class="form-control" id="provinsi" name="provinsi" required="" autocomplete="off"></select>
                    <label class="form-control-label">Pilih Provinsi</label>
                    <input type="hidden" id="nm_prov" name="nm_prov">
                </div>

                <div class="form-group float-label ">
                    <select class="form-control " id="nama_kota"  name="nama_kota" required="" autocomplete="off">
                    </select>
                    <label class="form-control-label">Pilih Kabupaten</label>
                    <input type="hidden" id="nm_kab" name="nm_kab">
                </div>

                <div class="form-group float-label ">
                    <input class="form-control" id="kecamatan" name="kecamatan" required autocomplete="off">
                    <label class="form-control-label">Kecamatan</label>
                </div>

                <div class="form-group float-label ">
                    <input class="form-control" id="kelurahan" name="kelurahan" required autocomplete="off">
                    <label class="form-control-label">Kelurahan</label>
                </div>

                <div class="form-group float-label ">
                    <input type="text" maxlength="5" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="kode_pos" class="form-control" required  autocomplete="off">
                    <label class="form-control-label">Kode Pos</label>
                </div>

                <div class="form-group float-label active">
                    <input type="file" name="nama_file" class="form-control" required  >
                    <label class="form-control-label " style="font-size:15px;">Foto Akun</label>
                </div>

                <div class="form-group my-4 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Saya Menerima <a href="#">Persayaratan dan Ketentuan</a></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded shadow" name="btnSimpan">Buat Akun</button>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Sudah Mempunyai Akun?<br>
                <a href="login.php">Masuk</a> disini.
            </p>
            <br>
            <br>
            <br>
        </div>
    </div>

    </div>
    <div class="footer bg-template">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                   
                        <div class="row no-gutters justify-content-center bg-template">
                            <div class="col text-center"></div>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>
  



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

    <!-- chosen multiselect js -->
    <script src="vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- template custom js -->
    <script src="js/main.js"></script>

    <!--Ini javascript sweet alertnya -->
    <script src="js/sweetalert2.min.js"></script>

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

<script type="text/javascript">
    function change()
         {
            var x = document.getElementById('pass').type;

            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="material-icons">visibility</i>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="material-icons">visibility_off</i>';
            }
         }
</script>

   
    

    

</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:27 GMT -->
</html>
