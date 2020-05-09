<?php
include("../assets/db.php");
$kelas=$_GET['kelas'];$tapel=$_GET['tapel'];
$ab=substr($kelas,0,1);
if($kelas=="0"){}else{	?>	<option value="0">Pilih Siswa</option>	<?php	$sql2 = "select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc";$qu3 = mysqli_query($koneksi,$sql2) or die("database error:". mysqli_error($koneksi));while($po=mysqli_fetch_array($qu3)){?><option value="<?=$po['peserta_didik_id'];?>"><?=$po['nama'];?></option><?php };};?>