<?php
error_reporting(0);
include "config.php";
function harga($rp){
$harga = number_format ($rp, 0, ',', '.');
return "Rp.".$harga;
}
$page = '';
$output = '';
$se=$_POST['se'];
$query = "SELECT * FROM tb_barang where nama_barang LIKE '%$se%' order by id_barang asc";
$result = mysqli_query($koneksi,$query);
$jumlah=mysqli_num_rows($result);
if($jumlah < 1){
$output .='<center><h4>Tidak Ditemukan Data Yang Sesuai Dengan
 Kata Kunci Yang Anda Masukan</h4></center';

}else{
$output .='<div class="row">';
        while($row = mysqli_fetch_assoc($result))
        {
        $output .= '
        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card shadow-sm border-0 mb-4" >
                        <div class="card-body" >
                            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18"></i></button>
                            <div class="badge badge-success float-right mt-1">' . $row["status_barang"] . '</div>
                            <figure class="product-image">
                                <img src="img/produk/' . $row["foto_barang"] . '" alt="" class="">
                            </figure>
                            <a  class="text-dark mb-1 mt-2 h6 d-block">' . $row["nama_barang"] . '</a>
                            <p class="text-secondary small mb-2">' . $row["nama_kategori"] . '</p>
                            <h5 class="text-success font-weight-normal mb-0" style="font-size: 15px;">' . harga($row["harga_barang"]) . '</h5>
                            <br>
                            <br>
                            <?php
                            if(' . $row["status_barang"] . '=="Kosong"){
                            ?>
                        <?php }else{ ?>
                            <a href="produk_detail.php?id_barang=' . $row["id_barang"] . '" class="btn btn-default button-rounded-36 shadow-sm float-bottom-right"><i class="material-icons md-18">shopping_cart</i></a>
                        <?php } ?> 
                        </div>
                    </div>
                </div>
        ';
        }
        $output .= '
    
</div>';

}
echo $output;
?>