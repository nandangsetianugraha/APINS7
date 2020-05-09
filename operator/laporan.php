<?php
include("../assets/db.php");
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
if($kelas=="0"){}else{echo "<option value='0'>Pilih Laporan</option>";echo "<option value='1'>Penilaian Tengah Semester</option>";echo "<option value='2'>Penilaian Akhir Semester</option>";};?>