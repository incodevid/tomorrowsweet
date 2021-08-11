<?php

include "config.php";

?>
<!DOCTYPE html> 
<html lang="en" class="grey-theme">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">

    <title>Login Akun</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!--ini sweet css alertnya-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

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
    <div class="row no-gutters vh-100 proh bg-template">
        <div class="col align-self-center px-3 text-center">
            <img src="img/alfazza_3.png" alt="logo" class="logo-small">
            <h2 class="text-white "><span class="font-weight-light">Masuk</span> Aplikasi</h2>
            
            <form class="form-signin shadow" method="POST">
                <div class="form-group float-label">
                    <input type="text"  name="username" autocomplete="off" class="form-control" oninvalid="this.setCustomValidity('Isi Username Kamu!')" oninput="setCustomValidity('')" required autofocus>
                    <label for="inputEmail" class="form-control-label">Username</label>
                </div>

                <div class="form-group float-label">
                    <input type="password"  name="password" autocomplete="off" class="form-control" oninvalid="this.setCustomValidity('Isi Password Kamu!')" oninput="setCustomValidity('')" required>
                    <label for="inputPassword" class="form-control-label">Password</label>
                </div>

                <br>

                <div class="row">
                    <div class="col-auto">
                        <input type="submit" name="blogin" value="Masuk" class="btn btn-lg btn-default btn-rounded shadow">
                    </div>

                    <div class="col align-self-center  pl-0">
                        Tidak Punya Akun?<br>
                      <a href="buat_akun.php">Buat Akun</a> disini.
                    </div>
                </div>
                
                <?php
error_reporting(0);

if (isset($_POST['blogin'])){
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$login=mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE username='$username' and password='$password'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_assoc($login);
// Apabila nama_admin dan password ditemukan
if ($ketemu > 0){
session_start();
$_SESSION['id_akun']        = $r['id_akun'];
$_SESSION['username']       = $r['username'];
$_SESSION['password']       = $r['password'];
$_SESSION['nama_akun']      = $r['nama_akun'];
$_SESSION['status_akun']    = $r['status_akun'];
 echo '<script> 
                window.location.href="index.php"; 
        </script>';
}
else {
    
    ?>
    
    <br>
    <div class="alert alert-danger"  role="alert">
        <strong>Maaf!</strong> Username atau Password Tidak Tepat.
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>  
<?php }} ?>
            </form>
            <br>
                <a href="privacy-policy.html">Privacy Policy</a>&nbsp;&nbsp;
                <a href="terms-condition.html">Terms Condition</a>
            
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

    <!-- template custom js -->
    <script src="js/main.js"></script>

    <script src="js/sweetalert2.min.js"></script>


    <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>



</body>


</html>
