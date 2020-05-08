<?php
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
include '../../../assets/db.php';
$idp=isset($_GET['idp']) ? $_GET['idp'] : $idku;
$sqsk=mysqli_query($koneksi, "select * from sk where ptk_id='$idp' order by tanggal_sk desc");$i=0;
?>													<ul class="timeline">													<?php 													while($skk=mysqli_fetch_array($sqsk)){														$i=$i+1;													?>														<li <?php if($i%2 == 0){echo "class='timeline-inverted'";}; ?>>															<div class="timeline-badge"><i class="flaticon-message"></i></div>															<div class="timeline-panel">																<div class="timeline-heading">																	<h4 class="timeline-title"><?=$skk['no_sk'];?></h4>																	<p><small class="text-muted"><i class="flaticon-message"></i> <?=TanggalIndo($skk['tanggal_sk']);?></small></p>																</div>																<div class="timeline-body">																	<p>																	Jabatan : <?=$skk['jabatan'];?><br/>																	Pengangkat : <?=$skk['pengangkat'];?><br/>																	</p>																	<p><a href="../cetak/cetakSK.php?id=<?=$skk['id_sk'];?>&idptk=<?=$idp;?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-print"></i> Print</a></p>																</div>															</div>														</li>													<?php }; ?>													</ul>