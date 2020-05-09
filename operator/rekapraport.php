<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
$jns=isset($_GET['jns']) ? $_GET['jns'] : 'k3';
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
						<h4 class="page-title">Rekap Nilai Raport</h4>
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
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Jenis Raport</label>
							<select class="form-control" id="jns" name="jns">
							</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<a href="#" id="cetakT" title="Contacts" class="btn btn-info btn-border btn-round btn-sm">
											<span class="btn-label">
												<i class="fa fa-print"></i>
											</span>
										Cetak
										</a>
							<div id="diagram" class="table-responsive">
							<table id="Raportku" class="table table-bordered table-hover table-responsive no-padding">
							<thead>
								<tr>
									<th class="text-center">Nama Siswa</th>
									<th class="text-center">PAI</th>
									<th class="text-center">PKn</th>
									<th class="text-center">BIN</th>
									<th class="text-center">MTK</th>
									<th class="text-center">IPA</th>
									<th class="text-center">IPS</th>
									<th class="text-center">SBK</th>
									<th class="text-center">PJK</th>
									<th class="text-center">BID</th>
									<th class="text-center">BIG</th>
									<th class="text-center">PBP</th>
									<th class="text-center">Jumlah</th>
									<th class="text-center">Rerata</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
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
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			
			$.ajax({
				type : 'GET',
				url : 'jnsraport.php',
				data :  'kelas=' +kelas,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#jns").html(data);
				}
			});
		});
		$('#jns').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var jns = $('#jns').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			
			Raportku = $('#Raportku').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				
				"ajax": "modul/rekap/rekapnilai.php?tapel="+tapel+"&smt="+smt+"&kelas="+kelas+"&jns="+jns,
				"order": []
			} );
		});
		$( "#cetakT" ).click(function() {
			var jns = $('#jns').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			if(kelas==0 || jns==0){
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Error',
					message: 'Pilih Kelas atau Jenis Raport Dahulu',
					},{
						type: 'info',
						placement: {
						from: "bottom",
						align: "right"
					},
					time: 10,
				});
			}else if(jns=='k3'){
				window.open('../cetak/rekapnilai.php?kelas='+kelas+'&tapel='+tapel+'&smt='+smt+'&jns='+jns,' _blank');
			}else{
				window.open('../cetak/rekapnilaik.php?kelas='+kelas+'&tapel='+tapel+'&smt='+smt+'&jns='+jns,' _blank');
			};
		});
	});
</script>
</body>
</html>