<?php
include "config.php";

	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$sql = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE nama_barang LIKE '%$search_param%'");
	$result = mysqli_num_rows($sql);
	if ($result > 0) {
		while($row = mysqli_fetch_assoc($sql)) {
		$countryResult[] = $row["nama_barang"];
		}
		echo json_encode($countryResult);
	}

?>

