<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
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
						<h4 class="page-title">Rekap Nilai</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<select class="form-control" id="kelas" name="kelas">
									<option value="0">Pilih Rombel</option>
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tapel' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
							<table id="Raportku" class="table table-bordered">
								<thead>
								   <tr>
										<th>Nama</th>
										<?php 
										$sql_mp=mysqli_query($koneksi, "select * from mapel");
										while($np=mysqli_fetch_array($sql_mp)){
										?>
										<th><?=$np['kd_mapel'];?></th>
										<?php }; ?>
									</tr>
								</thead>
								<tbody>	
																
								</tbody>
							</table>
							</div>
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
	<script type="text/javascript" language="javascript" class="init">
	var Raportku;
	$(document).ready(function() {
		Raportku = $("#Raportku").DataTable({
			"destroy":true,
				"searching": false,
				"paging":false,
			"ajax": "modul/rekap/rekap.php?kelas=0&tapel=0&smt=0",
			"order": []
		});
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			
			Raportku = $("#Raportku").DataTable({
			"destroy":true,
				"searching": false,
				"paging":false,
			"ajax": "modul/rekap/rekap.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt,
			"order": []
			});
		});
		$( "#cetakT" ).click(function() {
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			if(kelas == 0){
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Error',
					message: 'Pilih Kelas Dulu',
					},{
					type: 'info',
					placement: {
						from: "bottom",
						align: "right"
					},
					time: 10,
				});
			}else{
				window.open('../cetak/penyerahanraport.php?kelas='+kelas+'&tapel='+tapel+'&smt='+smt,' _blank');
			}
		});
		$( "#cetakKI3" ).click(function() {
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			if(kelas == 0){
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Error',
					message: 'Pilih Kelas Dulu',
					},{
					type: 'info',
					placement: {
						from: "bottom",
						align: "right"
					},
					time: 10,
				});
			}else{
				window.open('../cetak/rekapnilai.php?kelas='+kelas+'&tapel='+tapel+'&smt='+smt+'&jns=k3',' _blank');
			}
		});
		$( "#cetakKI4" ).click(function() {
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			if(kelas == 0){
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Error',
					message: 'Pilih Kelas Dulu',
					},{
					type: 'info',
					placement: {
						from: "bottom",
						align: "right"
					},
					time: 10,
				});
			}else{
				window.open('../cetak/rekapnilaik.php?kelas='+kelas+'&tapel='+tapel+'&smt='+smt+'&jns=k4',' _blank');
			}
		});
	});
</script>
</body>
</html>