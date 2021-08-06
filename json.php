<?php
		session_start(0);
		include "config.php";

		
		
		
		
		


 //query tabel produk


        $query = "SELECT * FROM tb_barang a INNER JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_barang ";
        $sql  = mysqli_query($koneksi,$query);
        $data = array();
        while($row=mysqli_fetch_assoc($sql)) {
            $data[] = $row;
        }
        echo $json_info = json_encode($data);

             


		
		


		?>