<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;
if($romb==0){$romb='1A';};
$ab=substr($romb, 0, 1);
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
						<h4 class="page-title">Cetak Raport Tahfidz</h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<select class="form-control" id="kelas" name="kelas">
									<option value="<?=$romb;?>"><?=$romb;?></option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Nama Siswa</label>
							<select class="form-control" id="idsis" name="idsis">
								<option value="0">Pilih Siswa</option>
								<?php 
								$sql_mk=mysqli_query($koneksi, "select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc");
								while($nk=mysqli_fetch_array($sql_mk)){
								?>
								<option value="<?=$nk['peserta_didik_id'];?>"><?=$nk['nama'];?></option>
								<?php };?>
							</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="card">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-tools">
									<div id="box">
										<a href="#" id="cetakT" title="Contacts" class="btn btn-info btn-border btn-round btn-sm">
											<span class="btn-label">
												<i class="fa fa-print"></i>
											</span>
										Cetak
										</a>
									</div>											
								</div>
							</div>
						</div>
						<div class="card-body">
							<div id="nilaiHarian">
								<div class="alert alert-info alert-dismissible">
									<h4><i class="icon fa fa-info"></i> Informasi</h4>
									Silahkan Pilih Penilaian
								</div>
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
	$(document).ready(function() {
		$('#box').hide();
		$('#idsis').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var idsis = $('#idsis').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			
			$.ajax({
				type : 'GET',
				url : '../cetak/cetakTahfidz.php',
				data :  'idp=' + idsis+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel,
				beforeSend: function()
				{	
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai Tahfidz....</h4></div>');
				},
				success: function (data) {
					if(idsis=="0"){
						$("#box").hide();
						$("#nilaiHarian").html("Pilih Siswa dong ah!!");
					}else{
					//jika data berhasil didapatkan, tampilkan ke dalam option select kd
					$("#box").show();
					$("#nilaiHarian").html("Sukses");
					};
				}
			});
		});
		$( "#cetakT" ).click(function() {
			var idsis = $('#idsis').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			window.open('../cetak/tahfidz.php?idp='+idsis+'&kelas='+kelas+'&tapel='+tapel+'&smt='+smt,' _blank');
		});
	});
</script>
</body>
</html>