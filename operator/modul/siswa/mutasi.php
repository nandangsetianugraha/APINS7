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
$sql = "select * from siswa where status<>'1' and status<>'7' order by nama asc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['peserta_didik_id'];
	$nisn=$row['nisn'];
	$jk=$row['jk'];
	$ids=$row['id'];
	$actionButton = '
		<ul class="pagination pg-primary">
		<li class="page-item"><a href="alumni.php?idp='.$ids.'" class="btn btn-info btn-border btn-round btn-sm"><i class="fas fa-search"></i></a></li>
		<li class="page-item"><button data-target="#MutasiModal" class="btn btn-info btn-border btn-round btn-sm" type="button" data-toggle="modal" data-id="'.$ids.'"><i class="fas fa-user-times"></i></button></li>
		</ul>
		';
	$tgl=$row['tempat'].", ".TanggalIndo($row['tanggal']);
	$namasis=$row['nama'];
	$output['data'][] = array(
		$row['nama'],
		$row['nis'],
		$row['nisn'],
		$tgl,
		$row['jk'],
		$actionButton
	);
}
$connect->close();
echo json_encode($output);