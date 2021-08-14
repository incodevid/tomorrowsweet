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
    <meta name="author" content="Tomorrow Sweet">

    <title>Lupa Password</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <link rel="icon" href="img/logo-TS.png">

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

<body oncontextmenu="return false">
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



    <?php

    if (isset($_POST['btnCekPass'])) {

    $username        = mysqli_real_escape_string($koneksi, $_POST['username']); 

    $querycek =mysqli_query($koneksi,"SELECT username FROM tb_akun WHERE username='$username'") or die(mysql_error());
    $cek=mysqli_num_rows($querycek);

    if ($cek>0){
    $result=mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE username='$username'");
    $obj=mysqli_fetch_object($result);

    echo '<script>setTimeout(function() { 
        swal("Username '.$obj->username.' Password Anda '.$obj->password.'", "Klik tombol dibawah untuk melanjutkan", "success");
        }); </script>' ;

    }else{

    echo '<script>setTimeout(function() { 
        swal("Username yang anda masukkan belum pernah terdaftar!! silakan Hubungi Admin Untuk Informasi Lebih Lanjut !!", "Klik tombol dibawah untuk melanjutkan", "error");
        }); </script>' ;
    }

}

  ?> 


        
      
    <div class=" vh-100 proh bg-template">
        <div class="col align-self-center px-3  text-center bg-template">
            <img src="img/logo-TS-white.png" alt="logo" style="margin: 10px auto 20px;display: block;width:200px;height:auto;">
            <h2 class="text-white"><span class="font-weight-light">Lupa Kata</span> Sandi</h2>
            <form class="form-signin shadow " method="post" action="" enctype="multipart/form-data"  >

                <div class="form-group float-label active">
                    <input type="text" name="username" class="form-control" required  autofocus autocomplete="off">
                    <label class="form-control-label">Username</label>
                </div>
                
                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded shadow" name="btnCekPass">Kirim</button>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                <b><a href="login.php">Kembali Login.</a></b>
            </p>
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

<script type="text/javascript">
 document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
alert('@copyright Access denied')
return false;
}
}   
</script>   
    

    

</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:27 GMT -->
</html>
