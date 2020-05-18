<?php 

require_once '../../../assets/db_connect.php';

if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$idr=$_POST['idp'];
	
	$nis=strip_tags($connect->real_escape_string($_POST['nis']));	$nisn=strip_tags($connect->real_escape_string($_POST['nisn']));	$nama=strip_tags($connect->real_escape_string($_POST['nama']));	$jk=$_POST['jk'];	$tempat=strip_tags($connect->real_escape_string($_POST['tempat']));	$tanggal=$_POST['tanggal'];	$nik=strip_tags($connect->real_escape_string($_POST['nik']));	$agama=$_POST['agama'];	$pend=strip_tags($connect->real_escape_string($_POST['pend_seb']));	$alamat=strip_tags($connect->real_escape_string($_POST['alamat']));	$ayah=strip_tags($connect->real_escape_string($_POST['ayah']));	$ibu=strip_tags($connect->real_escape_string($_POST['ibu']));
	$sql = "SELECT * FROM siswa WHERE id='$idr'";
	$usis = $connect->query($sql)->fetch_assoc();
	if(empty($nama)){
		$validator['success'] = false;
		$validator['messages'] = "Tidak Boleh Kosong Datanya!";
	}else{
			$sql = "update siswa set nis='$nis',nisn='$nisn',nama='$nama',jk='$jk',$agama='$agama',tempat='$tempat',tanggal='$tanggal',nik='$nik',alamat='$alamat',nama_ayah='$ayah',nama_ibu='$ibu' where id='$idr'";
			$query = $connect->query($sql);
			$validator['success'] = true;
			$validator['messages'] = "Data Siswa berhasil diperbaharui!";		
	};

	$connect->close();

	echo json_encode($validator);

}