<?php 

require_once '../../../assets/db_connect.php';
$kelas=$_GET['kelas'];
$peta=$_GET['aspek'];
$mpid=$_GET['mp'];
$output = array('data' => array());

$sql = "select * from kd where kelas='$kelas' and aspek='$peta' and mapel='$mpid' order by kd asc";
$query = $connect->query($sql);
while($s=$query->fetch_assoc()) {
	$ids=$s['id_kd'];	$actionButton = '			<ul class="pagination pg-primary">			<li class="page-item"><button data-target="#editKD" class="btn btn-icon btn-link btn-xs" type="button" id="'.$ids.'" data-toggle="modal" data-id="'.$ids.'"><i class="fa fa-edit"></i></button></li>			<li class="page-item"><button class="btn btn-icon btn-link btn-xs" data-toggle="modal" data-target="#removeKDModal" onclick="removeKD('.$s['id_kd'].')"> <i class="fa fa-trash"></i></button></li></ul>			';
	
	$output['data'][] = array(
		$s['kd'],
		$s['nama_kd'],
		$actionButton
	);
	
};

	

// database connection close
$connect->close();

echo json_encode($output);