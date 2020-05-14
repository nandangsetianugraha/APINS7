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
	$lvl=$row['jenis_ptk_id'];
	if($lvl==98){
		$sqlp = "SELECT * FROM rombel where tapel='$tapel' and wali_kelas='$idp'";
		$queryp = $connect->query($sqlp);
		$ada = $queryp->num_rows;
		if($ada>0){
			$pn = $queryp->fetch_assoc();
			$rmb=$pn['nama_rombel'];
		}else{
			$rmb="";
		};
	}elseif($lvl==97){
		$sqlp = "SELECT * FROM rombel where tapel='$tapel' and pendamping='$idp'";
		$queryp = $connect->query($sqlp);
		$ada = $queryp->num_rows;
		if($ada>0){
			$pn = $queryp->fetch_assoc();
			$rmb=$pn['nama_rombel'];
		}else{
			$rmb="";
		};
	}elseif($lvl==96){
		$sqlp = "SELECT * FROM rombel where tapel='$tapel' and pai='$idp'";
		$queryp = $connect->query($sqlp);
		$ada = $queryp->num_rows;
		$rmb="";
		if($ada>0){
			while($pn = $queryp->fetch_assoc()){
			$rmb=$rmb.$pn['nama_rombel'].", ";
			};
		}else{
			$rmb="";
		};
	}elseif($lvl==95){
		$sqlp = "SELECT * FROM rombel where tapel='$tapel' and penjas='$idp'";
		$queryp = $connect->query($sqlp);
		$ada = $queryp->num_rows;
		$rmb="";
		if($ada>0){
			while($pn = $queryp->fetch_assoc()){
			$rmb=$rmb.$pn['nama_rombel'].", ";
			};
		}else{
			$rmb="";
		};
	}elseif($lvl==94){
		$sqlp = "SELECT * FROM rombel where tapel='$tapel' and inggris='$idp'";
		$queryp = $connect->query($sqlp);
		$ada = $queryp->num_rows;
		$rmb="";
		if($ada>0){
			while($pn = $queryp->fetch_assoc()){
			$rmb=$rmb.$pn['nama_rombel'].", ";
			};
		}else{
			$rmb="";
		};
	}elseif($lvl==99){
		$rmb="Kepala Sekolah";
	}elseif($lvl==5){
		$rmb="Tata Usaha";
	}else{
		$rmb="Operator Sekolah";
	};
	$niy=$row['niy_nigk'];
	if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/images/ptk/".$row['gambar'])){
		$gbr="../../images/ptk/".$row['gambar'];
	}else{
		$gbr="../../images/user-default.png";
	};
	$actionButton = '
	<ul class="pagination pg-primary">
	<li class="page-item"><a href="editptk.php?idp='.$idp.'" class="btn btn-info btn-border btn-round btn-sm"><i class="fas fa-edit"></i></a></li>
	<li class="page-item"><button data-target="#myModal" class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-id="'.$ids.'"><i class="fas fa-user-times"></i></button></li>
	</ul>
	';
	
	$foto='<img src="'.$gbr.'" class="img-circle" alt="User Image" height="30px" width="30px">';
	$output['data'][] = array(
		$foto,
		$row['nama'],
		$row['nik'],
		$row['niy_nigk'],
		$row['nuptk'],
		$rmb,
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);