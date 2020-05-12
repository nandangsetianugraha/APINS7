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

$sql = "SELECT * FROM ptk WHERE status_keaktifan_id='1' order by jenis_ptk_id desc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['ptk_id'];
	$ids=$row['id'];
	$sqlp = "SELECT * FROM mengajar where tapel='$tapel' and ptk_id='$idp'";
	$queryp = $connect->query($sqlp);
	$ada = $queryp->num_rows;
	if($ada>0){
		$pn = $queryp->fetch_assoc();
		$rmb=$pn['rombel'];
		if($rmb=="0"){
			$ptn="Semua Kelas";
		}else{
			$ptn=$rmb;
		};
	}else{
		$rmb="";
		$ptn="Belum ada Kelas";
	};
	$niy=$row['niy_nigk'];
	if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/apins7/images/ptk/".$row['gambar'])){
		$gbr="../images/ptk/".$row['gambar'];
	}else{
		$gbr="../images/user-default.png";
	};
	$actionButton = '
	<a href="editptk.php?idp='.$idp.'" class="btn btn-effect-ripple btn-xs btn-success"><i class="fas fa-edit"></i></a>
	<button class="btn btn-effect-ripple btn-xs btn-danger" type="button" data-toggle="modal" data-target="#outMemberModal" onclick="outMember('.$ids.')"><i class="fas fa-user-times"></i></button>
	';
	
	$foto='<img src="'.$gbr.'" class="img-circle" alt="User Image" height="30px" width="30px">';
	$output['data'][] = array(
		$foto,
		$row['nama'],
		$row['nik'],
		$row['niy_nigk'],
		$row['nuptk'],
		$ptn,
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);