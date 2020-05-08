<?php 

require_once '../../../assets/db_connect.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$id=$_POST['idpd'];
	$ide=$_POST['ide'];
	$smt=$_POST['smt'];
	$tapel=$_POST['tapel'];
	$ket=$connect->real_escape_string($_POST['keterangan']);
	if(empty($ket) || empty($id)){
		$validator['success'] = false;
		$validator['messages'] = "Keterangan tidak boleh kosong";
	}else{
			$sql1 = "INSERT INTO data_ekskul VALUES('','$id','$smt','$tapel','$ide','$ket')";
			$query1 = $connect->query($sql1);
			if($query1 === TRUE) {			
				$validator['success'] = true;
				$validator['messages'] = "Kegiatan Ekstrakurikuler berhasil ditambahkan!";		
			} else {		
				$validator['success'] = false;
				$validator['messages'] = "Kok Error ya???";
			};
		
	};
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}