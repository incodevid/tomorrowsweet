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


            $kode_orderan = $_GET['kode_orderan'];
            $sqlk = mysqli_query($koneksi, "SELECT *,SUM(subtotal_beli) AS total FROM tb_orderan a INNER JOIN tb_akun b ON a.id_akun=b.id_akun WHERE  kode_orderan='$kode_orderan' ");
            $dataodr = mysqli_fetch_assoc($sqlk);

            $total1 = $dataodr['total'] + $dataodr['tarif_paket'];
            
        
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cetak Invoice</title>

<link rel="icon" href="/images/favicon.png" type="image/x-icon">

<style>
	body{
		font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		text-align:center;
		color:#777;
	}
	
	body h1{
		font-weight:300;
		margin-bottom:0px;
		padding-bottom:0px;
		color:#000;
	}
	
	body h3{
		font-weight:300;
		margin-top:10px;
		margin-bottom:20px;
		font-style:italic;
		color:#555;
	}
	
	body a{
		color:#06F;
	}
	
	.invoice-box{
		max-width:800px;
		margin:auto;
		padding:30px;
		border:1px solid #eee;
		box-shadow:0 0 10px rgba(0, 0, 0, .15);
		font-size:16px;
		line-height:24px;
		font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		color:#555;
	}
	
	.invoice-box table{
		width:100%;
		line-height:inherit;
		text-align:left;
	}
	
	.invoice-box table td{
		padding:5px;
		vertical-align:top;
	}
	
	.invoice-box table tr td:nth-child(2){
		text-align:right;
	}
	
	.invoice-box table tr.top table td{
		padding-bottom:20px;
	}
	
	.invoice-box table tr.top table td.title{
		font-size:45px;
		line-height:45px;
		color:#333;
	}
	
	.invoice-box table tr.information table td{
		padding-bottom:40px;
	}
	
	.invoice-box table tr.heading td{
		background:#eee;
		border-bottom:1px solid #ddd;
		font-weight:bold;
	}
	
	.invoice-box table tr.details td{
		padding-bottom:20px;
	}
	
	.invoice-box table tr.item td{
		border-bottom:1px solid #eee;
	}
	
	.invoice-box table tr.item.last td{
		border-bottom:none;
	}
	
	.invoice-box table tr.total td:nth-child(2){
		border-top:2px solid #eee;
		font-weight:bold;
	}
	
	@media only screen and (max-width: 600px) {
		.invoice-box table tr.top table td{
			width:100%;
			display:block;
			text-align:center;
		}
		
		.invoice-box table tr.information table td{
			width:100%;
			display:block;
			text-align:center;
		}
	}
	</style>
</head>
<body oncontextmenu="return false">
<div class="invoice-box">
<table cellpadding="0" cellspacing="0" >
<tr class="top">
<td colspan="2">
<table>
<tr>
<td class="title">
<img src="img/logo-TS.png" style="width:100%; max-width:300px;">
</td>
<td>
Kode Pesanan #: <b><?php echo $dataodr['kode_orderan']; ?></b><br>
Tanggal Pesanan: <?php echo $dataodr['tgl_pesanan']; ?><br>
Bank Pembayaran: <b><?php echo $dataodr['bank_bayar']; ?></b><br>
</td>
</tr>
</table>
</td>
</tr>
<tr class="information">
<td colspan="2">
<table>
<tr>
<td align="left" >
<?php echo $dataodr['nama_akun']; ?><br>
<?php echo $dataodr['nomor_hp']; ?><br>
<?php echo $dataodr['email']; ?><br>
<?php echo $dataodr['alamat']; ?><br>
<?php echo $dataodr['nm_prov']; ?><br>
<?php echo $dataodr['nm_kab']; ?><br>
<?php echo $dataodr['kecamatan']; ?><br>
<?php echo $dataodr['kelurahan']; ?> - <?php echo $dataodr['kode_pos']; ?>
</td>
<td>
Owner Shop<br>
Benny Sarmoko<br>
benny54121@gmail.com<br>
Tomorrow Sweet STORE<br>
Jl. Tingang XV No.01<br>
Kalimantan Tengah<br>
Palangka Raya<br>
Jekan Raya<br>
Palangka - 73112<br>
</td>
</tr>
</table>
</td>
</tr>
</table>

<table width="60px" cellpadding="0" cellspacing="0" >
<tr class="heading"  >
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Nama
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Warna
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Jumlah
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Berat
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Harga
</td>
<td width="10px" align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Subtotal
</td>
</tr>
        <?php
            function harga($rp){
            $harga = number_format ($rp, 0, ',', '.');
            return "Rp.".$harga;
            }

            $kode_orderan = $_GET['kode_orderan'];
            $sqlkodr = mysqli_query($koneksi, "SELECT * FROM tb_orderan WHERE  kode_orderan='$kode_orderan' ");
            while($dataodr1 = mysqli_fetch_assoc($sqlkodr)){
        ?>
<tr class="item">
<td  align="left" valign="center" style="line-height: 1.5;font-size: 9px;">
<?php echo $dataodr1['nama_barang']; ?>
</td>
<td align="center" valign="center" style="white-space:wrap;font-size: 9px;">
<?php echo $dataodr1['warna_beli']; ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo $dataodr1['stok_beli']; ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo $dataodr1['berat_barang']; ?>(gr)
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo harga($dataodr1['harga_barang']) ?>
</td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
<?php echo harga($dataodr1['subtotal_beli']) ?>
</td>
</tr>
<?php } ?>
</table>
<table>
<tr class="total" align="right">
<td></td>
<td align="center" valign="center" style="white-space:nowrap;font-size: 9px;">
Jumlah Subtotal: <?php echo harga($dataodr['total']) ?><br>
Ekspedisi: <a style="text-transform: uppercase;color:black;"><?php echo $dataodr['ekspedisi']; ?></a><br>
Paket: <?php echo $dataodr['paket_kurir']; ?>-<?php echo harga($dataodr['tarif_paket']) ?><br>
Total: <?php echo harga($total1) ?>
</td>
</tr>
</table>
</div>
<?php } ?>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script>
		window.print();
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
</html>
