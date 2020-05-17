<?php 

require_once '../../../assets/db_connect.php';
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
};
$tapel=$_GET['tapel'];
$output = array('data' => array());

$sql = "SELECT * FROM pengguna";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['ptk_id'];
	$sqlp = "SELECT * FROM ptk where ptk_id='$idp'";
	$queryp = $connect->query($sqlp)->fetch_assoc();
	if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/images/ptk/".$queryp['gambar'])){
		$gbr="../../images/ptk/".$queryp['gambar'];
	}else{
		$gbr="../../images/user-default.png";
	};
	$actionButton = '
	<button class="btn btn-effect-ripple btn-xs btn-danger" type="button" data-toggle="modal" data-target="#outMemberModal" onclick="outMember('.$idp.')"><i class="fas fa-user-times"></i></button>
	';
	
	$foto='<img src="'.$gbr.'" class="img-circle" alt="User Image" height="30px" width="30px">';
	$output['data'][] = array(
		$foto,
		$queryp['nama'],
		$row['username'],
		$row['password'],
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);