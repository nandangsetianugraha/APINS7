<?php include "partial/head.php"; 

?>
<link rel="stylesheet" href="croppie.css" />
<style>
#imgChange {
	background: url("overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
	bottom: 0;
	color: #FFFFFF;
	display: block;
	height: 30px;
	left: 0;
	line-height: 32px;
	position: absolute;
	text-align: center;
	width: 100%;
}
#imgChange input[type="file"] {
	bottom: 0;
	cursor: pointer;
	height: 100%;
	left: 0;
	margin: 0;
	opacity: 0;
	padding: 0;
	position: absolute;
	width: 100%;
	z-index: 0;
}
</style>
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<?php include "partial/main-header.php"; ?>

		<!-- Sidebar -->
		<?php include "partial/sidebar.php"; ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">
						<a href="kelas.php" class="btn btn-icon btn-link">
							<i class="fas fa-angle-double-left"></i>
						</a>
						Tambah Siswa Baru
					</h4>
							
							
							<div class="row">
								<div class="col-md-12">
									<div class="card card-with-nav">
										<div class="card-header">
											<div class="row row-nav-line">
												<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata Siswa</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Biodata Orang Tua</a>
													</li>
												</ul>
											</div>
										</div>
										<form autocomplete="off" action="modul/siswa/tambahSiswa.php" autocomplete="off" method="POST" id="tambahSiswaForm">
										<div class="card-body">
											<div class="tab-content mt-2 mb-3" id="pills-tabContent">
												<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>NIS</label>
																<input type="text" name="nis" autocomplete=off class="form-control">
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>NISN</label>
																<input type="text" name="nisn" autocomplete=off class="form-control">
															</div>
														</div>
													</div>
													<div class="form-group form-group-default">
														<label>Nama Lengkap</label>
														<input type="text" name="nama" autocomplete=off class="form-control">
													</div>
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Jenis Kelamin</label>
																<select class="form-control" name="jk">
																	<option value="L">Laki-laki</option>
																	<option value="P">Perempuan</option>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Tempat Lahir</label>
																<input type="text" name="tempat" autocomplete=off class="form-control">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label>Tanggal Lahir (YYYY-MM-DD)</label>
														<div class="input-group">
															<input type="text" class="form-control" name="tanggal">
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="fa fa-calendar-check"></i>
																</span>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>NIK</label>
																<input type="text" name="nik" autocomplete=off class="form-control">
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Agama</label>
																<select class="form-control" name="agama" id="agama">
																	<?php 
																	$sql_mk=mysqli_query($koneksi, "select * from agama");
																	while($nk=mysqli_fetch_array($sql_mk)){
																	?>
																	<option value="<?=$nk['id_agama'];?>"><?=$nk['nama_agama'];?></option>
																	<?php };?>
																</select>
															</div>
														</div>
													</div>
													<div class="form-group form-group-default">
														<label>Pendidikan Sebelumnya</label>
														<input type="text" name="pend_seb" autocomplete=off class="form-control">
													</div>
													<div class="form-group form-group-default">
														<label>Alamat Siswa</label>
														<input type="text" name="alamat" autocomplete=off class="form-control">
													</div>
												</div>
												
												<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Nama Ayah</label>
																<input type="text" name="ayah" autocomplete=off class="form-control">
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Nama Ibu</label>
																<input type="text" name="ibu" autocomplete=off class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Pekerjaan Ayah</label>
																<select class="form-control" name="pek_ayah">
																	<?php 
																	$sql_mk=mysqli_query($koneksi, "select * from pekerjaan");
																	while($nk=mysqli_fetch_array($sql_mk)){
																	?>
																	<option value="<?=$nk['id_pekerjaan'];?>"><?=$nk['nama_pekerjaan'];?></option>
																	<?php };?>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Pekerjaan Ibu</label>
																<select class="form-control" name="pek_ibu">
																	<?php 
																	$sql_mk=mysqli_query($koneksi, "select * from pekerjaan");
																	while($nk=mysqli_fetch_array($sql_mk)){
																	?>
																	<option value="<?=$nk['id_pekerjaan'];?>"><?=$nk['nama_pekerjaan'];?></option>
																	<?php };?>
																</select>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label>Alamat Orang Tua</label>
													</div>
													<?php

													
													?>
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Provinsi</label>
																<select class="form-control" name="provinsi" id="provinsi">
																	<option>Pilih Provinsi</option>
																	<?php 
																	$sql_mk=mysqli_query($koneksi, "select * from provinsi");
																	while($nk=mysqli_fetch_array($sql_mk)){
																	?>
																	<option value="<?=$nk['id_prov'];?>"><?=$nk['nama'];?></option>
																	<?php }	?>
																</select>
															</div>
														</div>
													
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Kabupaten</label>
																<select class="form-control" name="kabupaten" id="kabupaten">
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Kecamatan</label>
																<select class="form-control" name="kecamatan" id="kecamatan">
																</select>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group form-group-default">
																<label>Desa/Kelurahan</label>
																<select class="form-control" name="kelurahan" id="kelurahan">
																</select>
															</div>
														</div>
													</div>
													<div class="form-group form-group-default">
														<label>Jalan</label>
														<input type="text" name="jalan" autocomplete=off class="form-control">
													</div>
													
												</div>
											</div>
											<button type="submit" class="btn btn-info btn-border btn-round">Simpan</button>
										</div>
										</form>
									</div>
								</div>
								
							</div>
							
				</div>
			</div>
			
			<!--Modal Profile-->
			
			
			
			
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script src="croppie.js"></script>
	<script> 
$(document).ready(function(){
		$('#provinsi').change(function(){

			var prov = $('#provinsi').val();

			

			$.ajax({

				type : 'GET',

				url : 'kabupaten.php',

				data :  'prov_id=' + prov,

				success: function (data) {




					$("#kabupaten").html(data);

				}

			});

		});

		$('#kabupaten').change(function(){

			var kab = $('#kabupaten').val();

			

			$.ajax({

				type : 'GET',

				url : 'kecamatan.php',

				data :  'id_kabupaten=' + kab,

				success: function (data) {

					$("#kecamatan").html(data);

				}

			});

		});



		$('#kecamatan').change(function(){
			var desa = $('#kecamatan').val();
			$.ajax({

				type : 'GET',

				url : 'desa.php',

				data :  'id_kecamatan=' + desa,

				success: function (data) {

					$("#kelurahan").html(data);

				}

			});

		});
		
		$("#tambahSiswaForm").unbind('submit').bind('submit', function() {
						var form = $(this);

							$.ajax({
								url: form.attr('action'),
								type: form.attr('method'),
								data: form.serialize(),
								dataType: 'json',
								success:function(response) {
									if(response.success == true) {
										$.notify({
											icon: 'flaticon-alarm-1',
											title: 'Sukses',
											message: response.messages,
										},{
											type: 'info',
											placement: {
											from: "bottom",
											align: "left"
										},
											time: 10,
										});
				
									} else {
										$.notify({
											icon: 'flaticon-alarm-1',
											title: 'Error',
											message: response.messages,
										},{
											type: 'info',
											placement: {
											from: "bottom",
											align: "left"
										},
											time: 10,
										});
									}
								} 
							}); 

						return false;
					});

	});

</script>
</body>
</html>