<?php


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
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

			$array_response = json_decode($response,TRUE);
			$dataprovinsi = $array_response["rajaongkir"]["results"];

			echo "<option value='' ></option>";

			foreach ($dataprovinsi as $key => $tiapprov) 
			{
				echo "<option 
					 value='".$tiapprov["province_id"]."' 
					 id_provinsi='".$tiapprov["province_id"]."'>";
				echo $tiapprov["province"];
				echo "</option>";
			}

		}
	

?>