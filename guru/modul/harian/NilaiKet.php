<?php 
require_once '../../../assets/db_connect.php';
$tapel=$_GET['tapel'];
$smt=$_GET['smt'];
$kelas=$_GET['kelas'];
$peta=$_GET['peta'];
$mpid=$_GET['mp'];
$kd=$_GET['kd'];
$tema=$_GET['tema'];
$jns=$_GET['jns'];
$ab=substr($kelas, 0, 1);
$ada=0;
if($jns=="0"){
	echo "<div class='alert alert-info alert-dismissible'><h4><i class='icon fa fa-info'></i> Informasi</h4>Silahkan Pilih Penilaian</div>";
}else{
$sql11="select * from kd where kelas='$ab' and mapel='$mpid' group by kd";
$query11 = $connect->query($sql11);
while($h=$query11->fetch_assoc()) {
    $kdn=$h['kd'];
    $ckkm1=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kdn' and jenis='1'")->num_rows;
    $ckkm2=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kdn' and jenis='2'")->num_rows;
    $ckkm3=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kdn' and jenis='3'")->num_rows;
    if($ckkm1>0){$ada=$ada;}else{$ada=$ada+1;};
    if($ckkm2>0){$ada=$ada;}else{$ada=$ada+1;};
    if($ckkm3>0){$ada=$ada;}else{$ada=$ada+1;};
};
if($ada>0){
	$boleh=false;
}else{
	$boleh=true;
};
    if($boleh==false){
		?>
		<div class="error-page">
			<div class="error-content text-center" style="margin-left: 0;">
				<h3><i class="fa fa-info-circle text-danger"></i> Kesalahan </h3>
				<p>Belum Mengisi KKM <?=$mpm['nama_mapel'];?> Kelas <?=$ab;?>, silahkan isi terlebih dahulu dan lengkapi KKM <?=$mpm['nama_mapel'];?> Kelas <?=$ab;?>.</p>
			</div>
		</div>
	<?php 
	}else{	
		?>

<div class="table-responsive">
<table class="table table-bordered table-hover">
							<thead>
							   <tr>
								<th>Nama Siswa</th>
										<?php if($jns=="prak"){ ?>
										<th>Praktek</th>
										<?php }; ?>
										<?php if($jns=="proy"){ ?>
										<th>Proyek</th>
										<?php }; ?>
										<?php if($jns=="port"){ ?>
										<th>Portofolio</th>
										<?php }; ?>
								</tr>
							</thead>
							<tbody>	
<?php 
$sql="select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc";
$query = $connect->query($sql);
while($s=$query->fetch_assoc()) {
	$idp=$s['peserta_didik_id'];
	$sql1 = "select * from nk where id_pd='$idp' and smt='$smt' and tapel='$tapel' and mapel='$mpid' and tema='$tema' and kd='$kd' and jns='$jns'";
	$nh = $connect->query($sql1);
	$m=$nh->fetch_assoc();
	if(empty($m['nilai'])){
		$nHar='';
	}else{
		$nHar=number_format($m['nilai'],0);
	};
		$nh='
		<span class="input-group-addon" contenteditable="true" data-old_value="'.$nHar.'"  onBlur="saveDK4(this,\'nilai\',\''.$idp.'\',\''.$ab.'\',\''.$smt.'\',\''.$tapel.'\',\''.$mpid.'\',\''.$kd.'\',\''.$jns.'\',\''.$tema.'\')" onClick="highlightEdit(this);">'.$nHar.'</span>
		';
?>
<tr>
	<td><?=$s['nama'];?></td>
	<td><?=$nh;?></td>
</tr>
<?php
};
?>
															
							</tbody>
						</table>
						</div>
<?php };};?>