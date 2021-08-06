
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
                <select class="custom-select" autocomplete="off" oninvalid="this.setCustomValidity('Harap pilih paket ekspedisi!')" oninput="setCustomValidity('')"  name="jtarif" id="jtarif" onchange="myFunctionSaya(this)"  required>
                  <option value="">-- PILIH PAKET --</option>
                <?php
                foreach ($data['rajaongkir']['results'][0]['costs'] as $valuek) {

                foreach ($valuek['cost'] as $tarif) {
                echo "<option 
                value='".$tarif['value']."'
                data-tarif='".$tarif['value']."' 
                data-ongkir='".$kurir['courier']."' 
                data-paket='".$valuek['service']."'
                data-lama='".$tarif['etd']."' >Rp ". number_format($tarif['value'],2,',','.')." (".$kurir['courier']."-".$valuek['service']." ".$tarif['etd'].")</option>";
                }
                }
                ?>
                </select>
            </div>
          
        </div>
    </div>
    <?php } ?>

    


    


   