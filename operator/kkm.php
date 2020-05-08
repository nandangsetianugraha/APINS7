<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$mpm=mysqli_fetch_array(mysqli_query($koneksi, "select * from mapel where id_mapel='$mpid'"));
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
						<h4 class="page-title">Kriteria Ketuntasan Minimal (KKM)</h4>
						
					</div>
					<div class="row">
						<div class="col-md-3">
							<form class="form-horizontal" action="kkm.php?lihat" method="GET">
							<input type="hidden" name="tapel" class="form-control" value="<?php echo $tapel;?>">
							<input type="hidden" name="smt" class="form-control" value="<?php echo $smt;?>">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<select class="form-control" id="kelas" name="kelas" onchange="this.form.submit()">
									<?php 
									for($i = 1; $i < 7; $i++) {
									?>
									<option value="<?=$i;?>" <?php if($i==$romb){echo "selected";}; ?>>Kelas <?=$i;?></option>
									<?php };?>
								</select>
							</div>
							</form>
						</div>
					</div>
					<div class="card">
						<?php if(isset($_GET['lihat'])){ ?>
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title"><?=$mpm['nama_mapel'];?> Kelas <?=$ab;?></div>
								<div class="card-tools">
									<a href="kkm.php?tapel=<?=$tapel;?>&kelas=<?=$romb;?>" class="btn btn-info btn-border btn-round btn-sm mr-2">
										<span class="btn-label">
											<i class="fa fa-angle-double-left"></i>
										</span>
										Kembali
									</a>
									<a href="../cetak/cetakKKM.php?kelas=<?=$romb;?>&mapel=<?=$mpid;?>&tapel=<?=$tapel;?>" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fa fa-print"></i>
										</span>
										Print
									</a>
								</div>
							</div>
						</div>
						<?php }; ?>
						<div class="card-body">
							<?php if(isset($_GET['lihat'])){ ?>
								<div class="table-responsive">
									<table id="KKMTable" class="display table" >
										<thead>
										   <tr>
												<th>KD</th>
												<th>Kompetensi Dasar</th>
												<th>Karakteristik Muatan/Mata Pelajaran (Kompleksitas)</th>
												<th>Karakteristik Peserta Didik (Intake)</th>
												<th>Kondisi Satuan Pendidikan</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							<?php }else{ ?>
								<div class="table-responsive">
									<table id="KKMTablek" class="display table" >
										<thead>
										   <tr>
												<th>Mata Pelajaran</th>
												<th>KKM</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							<?php }; ?>
							
						</div>
					</div>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script>
	<?php 
	if(isset($_GET['lihat'])){
	?>
	var KKMTable;
	$(document).ready(function() {
		KKMTable = $("#KKMTable").DataTable({
			"searching": false,
			"paging":   false,
			"ajax": "modul/administrasi/kkmku.php?kelas=<?=$romb;?>&tapel=<?=$tpl_aktif;?>&mapel=<?=$mpid;?>",
			"order": []
		});
		$(document).on('submit', '#nilaiKKM', function(e){
			
			e.preventDefault();
			var form = $(this);
			$.ajax({
				url : form.attr('action'),
				type : form.attr('method'),
				data : form.serialize(),
				dataType : 'json'
			})
			.done(function(response){
				console.log(response);	
				if(response.success == true) {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
									message: response.messages,
								},{
									type: 'info',
									placement: {
										from: "bottom",
										align: "right"
									},
									time: 1000,
								});
								

								// reset the form
								
								// reload the datatables
								KKMTable.ajax.reload(null, false);

							} else {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
									message: response.messages,
								},{
									type: 'error',
									placement: {
										from: "bottom",
										align: "right"
									},
									time: 1000,
								});
							}  // /else		  // hide ajax loader	
			})
			.fail(function(){
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Error',
					message: 'Error Saat Menyimpan KKM',
				},{
					type: 'error',
					placement: {
						from: "bottom",
						align: "right"
					},
					time: 1000,
				});
			});
			
		});	
	});
	function highlightEdit(editableObj) {
			$(editableObj).css("background","#FFF0000");
		} 
		function saveKKM(editableObj,column,kelas,tapel,mpid,kda,jenis) {
			// no change change made then return false
			if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
			return false;
			// send ajax to update value
			$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
			$.ajax({
				url: "modul/administrasi/saveKKM.php",
				cache: false,
				data:'column='+column+'&value='+editableObj.innerHTML+'&kelas='+kelas+'&tapel='+tapel+'&mp='+mpid+'&kda='+kda+'&jenis='+jenis,
				success: function(response)  {
					console.log(response);
					// set updated value as old value
					$(editableObj).attr('data-old_value',editableObj.innerHTML);
					$(editableObj).css("background","#FDFDFD");	
					
				}          
		});
		};
	<?php }else{ ?>
	var KKMTablek;
	$(document).ready(function() {
		KKMTablek = $("#KKMTablek").DataTable({
			"searching": false,
			"paging":   false,
			"ajax": "modul/administrasi/kkmk.php?kelas=<?=$romb;?>&tapel=<?=$tpl_aktif;?>&level=<?=$level;?>",
			"order": []
		});
	});
	<?php };?>
</script>
</body>
</html>