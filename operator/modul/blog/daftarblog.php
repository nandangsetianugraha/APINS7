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

$sql = "SELECT * FROM berita order by tanggal desc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['id'];
	$actionButton = '	<ul class="pagination pg-primary">
	<li class="page-item"><a href="editblog.php?idp='.$idp.'" class="btn btn-info btn-border btn-round btn-sm"><i class="fas fa-edit"></i></a></li>	<li class="page-item"><button class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-target="#outMemberModal" onclick="outMember('.$idp.')"><i class="fas fa-user-times"></i></button></li>	</ul>
	';
	
	$output['data'][] = array(
		TanggalIndo($row['tanggal']),
		$row['judul'],
		substr($row['isi'],0,100)."...",
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);