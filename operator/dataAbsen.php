<?php 
require_once '../assets/db.php';
$bln=$_GET['bulan'];
$thn=$_GET['tahun'];
$tpl=$_GET['tapel'];
$kelas=$_GET['kelas'];
$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$sq2=mysqli_query($koneksi, "select * from penempatan JOIN siswa USING(peserta_didik_id) where siswa.jk='L' and penempatan.rombel='$kelas' and penempatan.tapel='$tpl'");
				$sq3=mysqli_query($koneksi, "select * from penempatan JOIN siswa USING(peserta_didik_id) where siswa.jk='P' and penempatan.rombel='$kelas' and penempatan.tapel='$tpl'");
				$juml=mysqli_num_rows($sq2);
				$jump=mysqli_num_rows($sq3);
				$jtot=mysqli_query($koneksi, "select * from siswa where status=1");
				$jjum=mysqli_num_rows($jtot);
				$jper=mysqli_query($koneksi, "select * from siswa where jk='P' and status=1");
				$jjper=mysqli_num_rows($jper);
				$jlak=mysqli_query($koneksi, "select * from siswa where jk='L' and status=1");
				$jjlak=mysqli_num_rows($jlak);
				
				$total=$juml+$jump;
				if($total>0){
					$perlak=($juml/$total)*100;
					$perper=($jump/$total)*100;
				}else{
					$perlak=0;
					$perper=0;
				};
$sabsen=mysqli_query($koneksi, "select * from penempatan where rombel='$kelas' and tapel='$tpl'");
$sakit=0;
$ijin=0;
$alfa=0;
while($mk=mysqli_fetch_array($sabsen)){
					$pds=$mk['peserta_didik_id'];
					$hari = cal_days_in_month(CAL_GREGORIAN, (int)$bln, $thn);
					for ($i=1; $i < $hari+1; $i++) { 
						if($i>9){
							$ac=$i;
						}else{
							$ac="0".$i;
						};
						$ttt=$thn."-".$bln."-".$ac;
						$snama=mysqli_query($koneksi, "select *,SUM(IF(absensi='S',1,0)) AS sakit,SUM(IF(absensi='I',1,0)) AS ijin,SUM(IF(absensi='A',1,0)) AS alfa from absensi where tanggal='$ttt' and peserta_didik_id='$pds'");
						$jab=mysqli_fetch_array($snama);
						$sakit=$sakit+$jab['sakit'];
						$ijin=$ijin+$jab['ijin'];
						$alfa=$alfa+$jab['alfa'];
					};
				};
$jkeh=$sakit+$ijin+$alfa;
$hef=mysqli_query($koneksi,"select * from hari_efektif where bulan='$bln' and tapel='$tpl'");$cektanggal=mysqli_num_rows($hef);if($cektanggal>0){
$efek=mysqli_fetch_array($hef);if($efek['hari']==0){
	$harim=23;
}else{
	$harim=$efek['hari'];};}else{	$harim=23;}
if($total==0){
	$ttl=1;
}else{
	$ttl=$total;
};
$hefek=round(($jkeh*100)/($harim*$ttl),2);
?>	<div class="row">	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">Hari Efektif</p>							<h4 class="card-title"><?=$harim;?> hari</h4>						</div>					</div>				</div>			</div>		</div>	</div>	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">Jumlah Absensi</p>							<h4 class="card-title"><?=$jkeh;?></h4>						</div>					</div>				</div>			</div>		</div>	</div>	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">% Absensi</p>							<h4 class="card-title"><?=$hefek;?>%</h4>						</div>					</div>				</div>			</div>		</div>	</div></div><div class="row">	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">Sakit</p>							<h4 class="card-title"><?=$sakit;?></h4>						</div>					</div>				</div>			</div>		</div>	</div>	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">Ijin</p>							<h4 class="card-title"><?=$ijin;?></h4>						</div>					</div>				</div>			</div>		</div>	</div>	<div class="col-sm-6 col-md-4">		<div class="card card-stats card-primary card-round">			<div class="card-body">				<div class="row">					<div class="col-5">						<div class="icon-big text-center">							<i class="flaticon-users"></i>						</div>					</div>					<div class="col-7 col-stats">						<div class="numbers">							<p class="card-category">Tanpa Keterangan</p>							<h4 class="card-title"><?=$alfa;?></h4>						</div>					</div>				</div>			</div>		</div>	</div></div>