<?php
	
	$id_provinsi_pilih = $_POST['id_provinsi'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$id_provinsi_pilih,
		  CURLOPT_SSL_VERIFYHOST => true,
		  CURLOPT_SSL_VERIFYPEER => true,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 091cd2af1b6e9dfef167d53406edd4c3"
		  ),
		));
		$response = curl_exec($curl);

		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}else{
			$arrayresponse = json_decode($response,TRUE);
			$datakota = $arrayresponse["rajaongkir"]["results"];


			echo "<option value='' ></option>";

			foreach ($datakota as $key => $tiapkota) 
			{
				echo "<option 
					 value='".$tiapkota["city_id"]."'
					 id_provinsi='".$tiapkota["province_id"]."'
					 provinsi='".$tiapkota["province"]."'
					 data-provinsi='".$tiapkota["province"]."'
					 nama_kota='".$tiapkota["city_name"]."'
					 data-nama_kota='".$tiapkota["city_name"]."'
					 tipe_kota='".$tiapkota["type"]."'
					 kodepos='".$tiapkota["postal_code"]."' >";
				echo $tiapkota["type"]." ";
				echo $tiapkota["city_name"]."-".$tiapkota["city_id"];
				echo "</option>";
			}

		}

	
	

?>