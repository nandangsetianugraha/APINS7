<?php 
require_once '../../../assets/db_connect.php';
function TanggalIndo($tanggal)
{
	$bulan = array ('Januari',
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
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1]-1 ] . ' ' . $split[0];
};
$output = array('data' => array());
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$sql = "select * from siswa where status='1' order by nama asc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['peserta_didik_id'];
	$sqlp = "SELECT * FROM penempatan WHERE peserta_didik_id='$idp' and tapel='$tapel'";
	$apn = $connect->query($sqlp)->num_rows;
	if($apn>0){
	$pn = $connect->query($sqlp)->fetch_assoc();
	$rmb=$pn['rombel'];
	}else{
		$rmb="";
	};
	$nisn=$row['nisn'];
	$jk=$row['jk'];
	$ids=$row['id'];
	if($apn>0){
	$actionButton = '
		<ul class="pagination pg-primary">
		<li class="page-item"><button data-target="#myModal" class="btn btn-info btn-border btn-round btn-sm" type="button" id="'.$ids.'" data-toggle="modal" data-id="'.$ids.'"><i class="fa fa-edit"></i></button></li>
		<li class="page-item"><button class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-target="#outMemberModal" onclick="outMember('.$pn['id_rombel'].')"><i class="fa fa-trash"></i></button></li>
		<li class="page-item"><button data-target="#MutasiModal" class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-id="'.$ids.'"><i class="fas fa-user-times"></i></button></li>
		</ul>
		';
	}else{
	$actionButton = '
		<ul class="pagination pg-primary">
		<li class="page-item"><button data-target="#myModal" class="btn btn-info btn-border btn-round btn-sm" type="button" id="'.$ids.'" data-toggle="modal" data-id="'.$ids.'"><i class="fa fa-edit"></i></button></li>
		<li class="page-item"><button class="btn btn-info btn-border btn-round btn-sm" data-toggle="modal" data-target="#penempatanMemberModal" onclick="penempatanMember('.$row['id'].')"><i class="fas fa-indent"></i></button></li>
		<li class="page-item"><button data-target="#MutasiModal" class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-id="'.$ids.'"><i class="fas fa-user-times"></i></button></li>
		</ul>
		';
	};
	$tgl=$row['tempat'].", ".TanggalIndo($row['tanggal']);
	$namasis=$row['nama'];
	$output['data'][] = array(
		$row['nama'],
		$row['nis'],
		$row['nisn'],
		$tgl,
		$row['jk'],
		$rmb,
		$actionButton
	);
}
$connect->close();
echo json_encode($output);