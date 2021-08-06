<?php
include 'config.php';
		 function cost($get,$weight,$courier)
		  {
			$origin ='326';
				$curl2=curl_init();
				curl_setopt_array($curl2, array(
				  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "origin=". $origin ."&destination=" .$get. "&weight=".$weight."&courier=".$courier,
				  CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded",
					"key: 091cd2af1b6e9dfef167d53406edd4c3"
				  ),
				));
				$response2 = curl_exec($curl2);
				$err2 = curl_error($curl2);
				curl_close($curl2);
				if ($err2) {
				  echo "cURL Error #:" . $err2;
				}
				else{
					$obj=json_decode($response2);
					if ($obj->rajaongkir->status->description=="OK") {

					//echo json_encode($obj); 
					//return json_encode($obj);		  
						return $response2;
				}
			}
		  }





if (isset($_GET['id'])){


$ndesti = 'Palangka Raya';
$provi = 'Kalimantan Tengah';


$string = file_get_contents("js/kota.json");
$json_a = json_decode($string, true);
for ($f = 0; $f < count($json_a);$f++){
  if ($json_a[$f]['prov'] == $provi ){
    for ($k = 0; $k < count($json_a[$f]['kota']);$k++ ){
      if ($json_a[$f]['kota'][$k]['nama'] == $ndesti){
        $destination =  $json_a[$f]['kota'][$k]['11'];
        break;
      }
    }
  }
}
}else if (isset($_GET['kota'])){
$destination = $_GET['kota'];
}

	$biaya[0] = cost($destination,'1','jne');	
	$biaya[1] = cost($destination,'1','tiki');	
	$biaya[2] = cost($destination,'1','pos');	

for ($i = 0; $i < 3; $i++){
$jbi = json_decode($biaya[$i], true);
$co = count($jbi['rajaongkir']['results']['0']['costs']);
for ($c = 0; $c<$co;$c++){
	if ($jbi['rajaongkir']['results']['0']['code'] == 'pos'){$c++;}
	?><input type="radio" name="ongkir" onclick="radio(this.value);" value="<?php echo strtoupper($jbi['rajaongkir']['results']["0"]["code"])."-".$jbi['rajaongkir']['results']['0']['costs'][$c]['service']."-".$jbi['rajaongkir']['results']['0']['costs'][$c]['cost']['0']['value'] ?>"> <?php
	echo strtoupper($jbi['rajaongkir']['results']["0"]["code"])." - ".$jbi['rajaongkir']['results']['0']['costs'][$c]['service']." - ";
	echo $jbi['rajaongkir']['results']['0']['costs'][$c]['cost']['0']['value']." ";
	echo " (".$jbi['rajaongkir']['results']['0']['costs'][$c]['cost']['0']['etd'].") <br>";
}
}
?>
	