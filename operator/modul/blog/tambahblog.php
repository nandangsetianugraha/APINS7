<?php 

require_once '../../../assets/db_connect.php';
function random($panjang)
{
   $karakter = 'abcdefghijklmnopqrstuvwxyz1234567890';
   $string = '';
   for($i = 0; $i < $panjang; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
    return $string;
};
function textToSlug($text='') {
  $text = trim($text);
  if (empty($text)) return '';
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
    return $text;
};
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$tanggal=$_POST['tanggal'];
	$tgl=substr($tanggal,3,2);
	$bln=substr($tanggal,0,2);
	$thn=substr($tanggal,6,4);
	$waktu=$thn."-".$bln."-".$tgl;
	$judul=$connect->real_escape_string($_POST['judul']);
	$slug=textToSlug($judul);
	$isi=$_POST['isi'];
	if(empty($tanggal) || empty($judul)){
		$validator['success'] = false;
		$validator['messages'] = "Tanggal dan Judul tidak boleh kosong";
	}else{
			$sql2 = "INSERT INTO berita VALUES('','$waktu','$judul','$slug', '$isi')";
			$query2 = $connect->query($sql2);
			if($query2 === TRUE) {			
				$validator['success'] = true;
				$validator['messages'] = "Artikel baru telah ditambahkan";		
			} else {		
				$validator['success'] = false;
				$validator['messages'] = "Ada yang tidak beres";
			};
	};
	$connect->close();
	echo json_encode($validator);
}