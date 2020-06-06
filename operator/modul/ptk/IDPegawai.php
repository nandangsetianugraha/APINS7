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
$output = array('data' => array());

$sql = "SELECT * FROM ptk WHERE status_keaktifan_id='1' order by jenis_ptk_id desc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['ptk_id'];
	$ids=$row['id'];
	$lvl=$row['jenis_ptk_id'];
	$niy=$row['niy_nigk'];
	$sql1 = "select * from id_pegawai where ptk_id='$idp'";
	$query1 = $connect->query($sql1);
	$ada = $query1->num_rows;
	if($ada>0){
		$peg_id = $query1->fetch_assoc();
		$id_peg=$peg_id['pegawai_id'];
		$idpeg=$peg_id['id'];
		$actionButton = '
		<ul class="pagination pg-primary">
		<li class="page-item"><button class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-target="#hapusData" onclick="outMember('.$idpeg.')"><i class="fa fa-trash"></i></button></li></ul>';
	}else{
		$id_peg="";
		$actionButton='
		<div class="btn-group">
		<a class="btn btn-info btn-border btn-round btn-sm" data-toggle="modal" data-target="#tambahNilai" data-pdid="'.$idp.'" id="getSosial"><i class="fa fa-plus"></i></a>
		</div>';
	};
	if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/images/ptk/".$row['gambar'])){
		$gbr="../../images/ptk/".$row['gambar'];
	}else{
		$gbr="../../images/user-default.png";
	};
	$foto='<img src="'.$gbr.'" class="img-circle" alt="User Image" height="30px" width="30px">';
	$output['data'][] = array(
		$foto,
		$row['nama'],
		$id_peg,
		$actionButton
	);
}
$connect->close();
echo json_encode($output);