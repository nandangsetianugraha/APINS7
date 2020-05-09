<?php
include("../assets/db.php");
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
if($kelas=="0"){}else{echo "<option value='0'>Pilih Raport</option>";echo "<option value='k3'>Pengetahuan (KI-3)</option>";echo "<option value='k4'>Ketrampilan (KI-4)</option>";};?>