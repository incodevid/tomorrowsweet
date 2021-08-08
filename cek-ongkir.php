
<?php
error_reporting(0);
session_start();
include'config.php';
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) 
 {echo "<script>;document.location='login.php' </script> ";}
else {
     
    
            $id_akun=$_SESSION['id_akun'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun where id_akun='$id_akun' ");
            $t = mysqli_fetch_assoc($sql);



            $sqlk = mysqli_query($koneksi, "SELECT *,COUNT(id_barang) AS jumlah_item FROM tb_keranjang where id_akun='$id_akun' ");
            $dataker = mysqli_fetch_assoc($sqlk);
            
        
 ?>



<?php

$kota_tujuan = $_POST['kota_tujuan'];
$kurir       = $_POST['kurir'];
$berat       = $_POST['berat']*1000;

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "origin=".'206'."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
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

$hasil=$data['rajaongkir']['results'][0]['costs'];
?>    

<div class="panel panel-default">
        <div class="panel-body">
          
          <?php
          function harga1($rp1){
          $harga1 = number_format ($rp1, 0, ',', '.');
          return "Rp.".$harga1;
          }

                    $sqleks = mysqli_query($koneksi,"SELECT * FROM tb_keranjang a INNER JOIN tb_barang b ON a.id_barang=b.id_barang INNER JOIN tb_detail_barang c ON b.id_barang=c.id_barang WHERE a.id_akun=$id_akun");
                    while($dataeks  = mysqli_fetch_assoc($sqleks)){
                    $subtotaleks    = $dataeks[harga_barang]*$dataeks[jumlah_stok];
                    $totaleks       = $totaleks + $subtotaleks;
                    }
                    ?>
                    <br>
                    
            <div class="col-sm-9">
            <input type="text" id="output1" style="display:none;" value=""  >
            <input type="text" id="output2" style="display:none;" value="<?php echo $totaleks ?>" >
            <p  ></p>
            </div>
            <div class="card-body form-group  ">
              <label style="color:grey;float: left;">Paket Ekspedisi</label>                    
            </div>

<?php
     for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
    ?>
         <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
             <table  id="example"  style="width:100%">
                 <tr style="font:bold 12px Arial">
                     <th>No.</th>
                     <th>Jenis Layanan</th>
                     <th>ETD</th>
                     <th>Tarif</th>
                     <th>Pilih</th>
                 </tr>
                 <?php
    
                 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
                 ?>
                 <tr>
                     <td style="font:bold 12px Arial"><?php echo $l+1;?></td>
                     <td>
                         <div style="font:bold 10px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
                         <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
                     </td>
                     <td align="center">
                        <div style="font:normal 11px Arial">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> hari</div>
                    </td>
                     <td align="right">
                        <div style="font:normal 11px Arial">Rp. <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></div>
                     </td>
                     <td>
                    
                         <div class="radio">
                            <label>
                                <input type="radio" 
                                data-tarif="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']; ?>" 
                                data-ongkir="<?php echo $data['rajaongkir']['results'][$k]['name'][$l]['courier']; ?>" 
                                data-paket="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service']; ?>"
                                data-lama="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']; ?>"  name="jtarif" id="jtarif" class="jtarif" onclick="myFunctionSaya(this)" ></label>
                        </div>
                    </td>
                 </tr>
                 <?php
                 }
                 ?>
             </table>
         </div>
     <?php
    }
    ?>
    



<script type="text/javascript">
    $('.jtarif').on('click',function(){

        var tarif = $(this).data("tarif");
        var ongkir = $(this).data("ongkir");
        var paket = $(this).data("paket");
        var lama = parseInt($(this).data("lama"));

        $('#tarif').val(tarif);
        $('#ongkir').val(ongkir);
        $('#paket').val(paket);
        $('#lama').val(lama + ' hari');
    
    });

    function format_rupiah(nominal){
        var  reverse = nominal.toString().split('').reverse().join(''),
             ribuan = reverse.match(/\d{1,3}/g);
         return ribuan  = ribuan.join('.').split('').reverse().join('');
    }
</script> 

<script type="text/javascript">
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    </script>
   
          
        </div>
    </div>
    <?php } ?>

    


    


   