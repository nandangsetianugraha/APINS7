<?php 
include "../assets/db.php";
include "../assets/global.php";
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
session_start();
if(!isset($_SESSION['userid'])){
	header('location:../login/');
	exit();
};
$sql_tahun=mysqli_query($koneksi, "select * from konfigurasi");
$esmanis=mysqli_fetch_array($sql_tahun);
$tpl_aktif=$esmanis['tapel'];
$smt_aktif=$esmanis['semester'];
$sekolah=$esmanis['nama_sekolah'];
$alamat=$esmanis['alamat_sekolah'];
$img_login=$esmanis['image_login'];
$maintenis=$esmanis['maintenis'];
$versi=$esmanis['versi'];
$level=$_SESSION['level'];
$idku=$_SESSION['userid'];
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$bioku = mysqli_fetch_array(mysqli_query($koneksi, "select * from ptk where ptk_id='$idku'"));
$status=$bioku['status_kepegawaian_id'];
$jns_ptk = mysqli_fetch_array(mysqli_query($koneksi, "select * from jenis_ptk where jenis_ptk_id='$level'"));
$status_ptk = mysqli_fetch_array(mysqli_query($koneksi, "select * from status_kepegawaian where status_kepegawaian_id='$status'"));
$rmku = mysqli_fetch_array(mysqli_query($koneksi, "select * from mengajar where ptk_id='$idku' and tapel='$tpl_aktif'"));
$kelas=$rmku['rombel'];
if($kelas===0){
	$kelas="1A";
};
$ab=substr($kelas,0,1);
if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/apins7/images/ptk/".$bioku['gambar'])){
	$avatar="../images/ptk/".$bioku['gambar'];
}else{
	$avatar="../images/user-default.png";
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>APINS 7.0.1</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="../assets/js/plugin/datepicker/css/bootstrap-datepicker.min.css">
	

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
