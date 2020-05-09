<?php
include("../assets/db.php");
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
if($kelas=="0"){}else{echo "<option value='0'>Pilih Penilaian</option>";echo "<option value='1'>Juz Amma</option>";echo "<option value='2'>Hadits Arbain</option>";echo "<option value='3'>Surah Pilihan</option>";echo "<option value='4'>Doa Sehari-hari</option>";echo "<option value='5'>Hadits Pilihan</option>";};?>