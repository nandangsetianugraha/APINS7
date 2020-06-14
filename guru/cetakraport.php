<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
if($level==96){ //guru pai
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
}elseif($level==95){ //guru penjas
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 8;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
}elseif($level==94){ //guru bahasa inggris
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 10;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
}else{
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 2;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;
	$ab=substr($romb, 0, 1);
};
?>
	<div class="wrapper overlay-sidebar">
		<?php include "partial/main-header.php"; ?>

		<!-- Sidebar -->
		<?php include "partial/sidebar.php"; ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Cetak Raport Kelas <?=$romb;?></h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					<div class="card">
						<div class="card-body">
							<div id="diagram" class="table-responsive">
							<table id="Raportku" class="table table-bordered">
								<thead>
								    <tr>
										<th width="45%">Nama</th>
										<th>KI-1</th>
										<th>KI-2</th>
										<th>KI-3</th>
										<th>KI-4</th>
										<th></th>
									</tr>
								</thead>
								<tbody>	
																
								</tbody>
							</table>
							</div>
						</div>
					</div>
					<?php }else{ ?>
					<div class="card">
						<div class="card-body">
							<div class="alert alert-info alert-dismissible">
								<h4><i class="icon fa fa-info"></i> Informasi</h4>
								Hanya bisa diakses Guru Kelas atau Guru Pendamping
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script type="text/javascript" language="javascript" class="init">
	var Raportku;
	$(document).ready(function() {
		Raportku = $("#Raportku").DataTable({
			"searching": false,
			"paging":false,
			"ajax": "modul/rekap/Scetak.php?kelas=<?=$romb;?>&tapel=<?=$tpl_aktif;?>&smt=<?=$smt;?>",
			"order": []
		});
	});
</script>
</body>
</html>