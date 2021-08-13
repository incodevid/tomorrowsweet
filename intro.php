<!doctype html>
<html lang="en" class="grey-theme">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Intro</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <link rel="icon" href="img/logo-TS.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .orange-slice {
    margin-right: -99px;
    }
    .pinapple {
    margin-right: -80px;
    }
    .banana {
    margin-right: -70px;
    }
    </style>

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

<body oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;">
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
    <a href="login.php" class="btn btn-default button-rounded-54 shadow text-white float-bottom-right"><i class="material-icons">arrow_forward</i></a>
    

     
    <!-- Swiper -->
    <div class="swiper-container introduction vh-100 bg-template">
        <div class="swiper-wrapper">
            <div class="swiper-slide overflow-hidden bg-orange text-white">
                <div class="row no-gutters h-100 ">
                  
                    <img src="img/logo-TS-white.png" style="margin: 10px auto 20px;display: block;width:300px;height:auto;" alt="" class="align-self-center" >
                   
                    <img src="img/1.png" style="height: 440px;" alt="" class="orange-slice right-image align-self-center ">
                    <div class="col align-self-center px-3" style="background:rgba(0, 0, 0, 0.20) ;">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-left ">
                                        <h1 class="text-uppercase">Style Outfit</h1>
                                        <p>Tomorrow Sweet Store, Tersedia Berbagai Brand Lokal Untuk Koleksi Style Outfit Kamu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide overflow-hidden bg-grey text-white">
                <div class="row no-gutters h-100">
                    <img src="img/logo-TS-white.png" style="margin: 10px auto 20px;display: block;width:300px;height:auto;" alt="" class="align-self-center" >
                    
                    <img src="img/2.png" style="height: 520px;" alt="" class="pinapple right-image align-self-center">
                    <div class="col align-self-center px-3" style="background:rgba(0, 0, 0, 0.20) ;">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h1 class="text-uppercase">Outfit Of The Day</h1>
                                        <p>Tomorrow Sweet Store, Let's Date.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide overflow-hidden bg-orange text-white">
                <div class="row no-gutters h-100">
                    <img src="img/logo-TS-white.png" style="margin: 10px auto 20px;display: block;width:300px;height:auto;" alt="" class="align-self-center" >
                    
                    <img src="img/3.png" style="height: 420px;" alt="" class="banana right-image align-self-center">
                    <div class="col align-self-center px-3" style="background:rgba(0, 0, 0, 0.20) ;">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h1 class="text-uppercase">Style Different</h1>
                                        <p>Tomorrow Sweet Store, Cari tampil beda mu, hanya di store kami.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        
    </div>
    
   
       
    
    

    <!-- notification -->
    
    <!-- notification ends -->


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

    <!-- page level script -->
    <script>
        $(window).on('load', function() {
            var swiper = new Swiper('.introduction', {
                pagination: {
                    el: '.swiper-pagination',
                },
            });

            /* notification view and hide */
            setTimeout(function() {
                $('.notification').addClass('active');
                 setTimeout(function() {
                     $('.notification').removeClass('active');
                 }, 3500);
            }, 500);
            $('.closenotification').on('click', function(){
                $(this).closest('.notification').removeClass('active')
            });
        });

    </script>
</body>


<!-- Mirrored from maxartkiller.com/website/GoMobileUX/gofruit/introduction.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 09:28:27 GMT -->
</html>
