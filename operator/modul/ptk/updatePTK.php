<?php 
//if form is submitted
if($_POST) {	
	$validator = array('success' => false, 'messages' => array(), 'jenisptk' => array());
	$nama=strip_tags($connect->real_escape_string($_POST['nama']));
	$tempat=strip_tags($connect->real_escape_string($_POST['tempat']));
	//$=$_POST[''];
	//$=$_POST[''];
	if(empty($nama) || empty($tanggal)){
		$validator['success'] = false;
		$validator['messages'] = "Nama dan tanggal lahir tidak boleh kosong!";
	}else{