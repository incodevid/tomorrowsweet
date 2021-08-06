<?php  
error_reporting(0);

$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "db_tomorrowsweet";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo "<script>alert('Database not connected'); </script>".mysqli_connect_error();
}

//sebutkan tcharset untuk menampilkan data yang besar sampai puluhan ribu
mysqli_set_charset($koneksi,"utf8");


date_default_timezone_set('Asia/Jakarta');

function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}


function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}




function tgl_indo2($string){
    // contoh : 2019-01-30
    
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
 
    $tanggal = explode("-", $string)[2];
    $bulan = explode("-", $string)[1];
    $tahun = explode("-", $string)[0];
 
    return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
}


function DateToIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}









?>