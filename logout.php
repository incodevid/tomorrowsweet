<html lang="en" class="grey-theme">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
<meta name="description" content="">
<link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

<!-- Roboto fonts CSS -->
<link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">


<!-- Swiper CSS -->
<link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">

<!--ini sweet css alertnya-->
<link rel="stylesheet" href="css/sweetalert2.min.css">

</head>

<body>
	
<?php
  error_reporting(0);
  session_start();
  include "config.php";
  session_destroy();
  echo '<script> 
                window.location.href="login.php"; 
            </script>';
?>
		
	


    <script src="js/sweetalert2.min.js"></script> 
<!-- jquery, popper and bootstrap js -->

    </body>
    </html>