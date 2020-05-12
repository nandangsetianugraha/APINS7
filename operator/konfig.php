<?php include "partial/head.php"; 
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
?>
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
					<div class="page-header">
						<h4 class="page-title">Konfigurasi Web</h4>
					</div>
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line">
								<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-sekolah-tab" data-toggle="pill" href="#pills-sekolah" role="tab" aria-controls="pills-sekolah" aria-selected="true">Nama Sekolah</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-tapels-tab" data-toggle="pill" href="#pills-tapels" role="tab" aria-controls="pills-tapels" aria-selected="false">Tahun Pelajaran</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-kelas-tab" data-toggle="pill" href="#pills-kelas" role="tab" aria-controls="pills-kelas" aria-selected="false">Kelas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="false">Gambar Login</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content mt-2 mb-3" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-sekolah" role="tabpanel" aria-labelledby="pills-sekolah-tab">
									<form autocomplete="off" action="modul/setting/simpanData.php" method="POST" id="ubahForm">
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Nama Sekolah</label>
												<input type="text" class="form-control" name="nama_sekolah" placeholder="Name" value="<?=$esmanis['nama_sekolah'];?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Alamat</label>
												<input type="text" class="form-control" name="alamat_sekolah" placeholder="Name" value="<?=$esmanis['alamat_sekolah'];?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group form-group-default">
												<label>Versi Aplikasi</label>
												<input type="text" class="form-control" name="versi" placeholder="Name" value="<?=$esmanis['versi'];?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Semester</label>
												<select class="form-control" name="smt">
													<option value="1" <?php if($esmanis['semester']=="1"){echo "selected";};?>>Semester 1</option>
													<option value="2" <?php if($esmanis['semester']=="2"){echo "selected";};?>>Semester 2</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Tahun Pelajaran</label>
												<select class="form-control" name="tapel">
													<?php 
													$sql_tapel=mysqli_query($koneksi, "select * from tapel");
													while($tapelnya=mysqli_fetch_array($sql_tapel)){
													?>
													<option value="<?=$tapelnya['nama_tapel'];?>" <?php if($tapelnya['nama_tapel']==$tapel){echo "selected";};?>>Tahun Pelajaran <?=$tapelnya['nama_tapel'];?></option>
													<?php }; ?>
												</select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-info btn-border btn-round btn-sm">Simpan</button>
									</form>
									
									
								</div>
								<div class="tab-pane fade show" id="pills-tapels" role="tabpanel" aria-labelledby="pills-tapels-tab">
								</div>
								<div class="tab-pane fade show" id="pills-kelas" role="tabpanel" aria-labelledby="pills-kelas-tab">
								</div>
								<div class="tab-pane fade show" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
									<div class="row">
										
											<form id="uploadImage" action="uploadlogo.php" method="post">
											<div class="col-8">
												<div class="form-group form-group-default" id="targetLayer">
													<label>Gambar Login</label>
													<img class="card-img-top" src="../images/<?=$esmanis['image_login'];?>">
												</div>
											</div>
											<div class="col-4">
												<div class="progress" id="progess-bar">
													<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<div id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
												<div class="form-group">
													<label>File Upload</label>
													<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
												</div>
												<div class="form-group">
													<input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info btn-border btn-round btn-sm" />
												</div>
											</div>
											</form>
											
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<!--Modal Penempatan-->
		<div class="modal fade" id="penempatan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Daftar Siswa</h4>
              </div>
              <div class="modal-body">
				<table id="managePenempatan" class="table table-bordered table-hover">
									<thead>
									   <tr>
											
											<th>Nama Siswa</th>
											<th>JK</th>
											<th>Kelas Sebelumnya</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
			  </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script src="jquery.form.js"></script>
<script>
$(document).ready(function(){
	$('#progess-bar').hide();
	$('#uploadImage').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#progess-bar').show();
			$('#loader-icon').show();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				beforeSubmit:function(){
					$('.progress-bar').width('50%');
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
					$('#progess-bar').hide();
					$('#loader-icon').hide();
					$('#targetLayer').show();
					$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Sukses',
									message: 'Gambar Login berhasil diubah!',
								},{
									type: 'info',
									placement: {
									from: "bottom",
									align: "right"
								},
									time: 10,
								});
				},
				resetForm: true
			});
		}
		return false;
	});
  $("#ubahForm").unbind('submit').bind('submit', function() {

				var form = $(this);

				

					//submi the form to server
					$.ajax({
						url : form.attr('action'),
						type : form.attr('method'),
						data : form.serialize(),
						dataType : 'json',
						success:function(response) {

							// remove the error 
							
							if(response.success == true) {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Sukses',
									message: response.messages,
								},{
									type: 'info',
									placement: {
									from: "bottom",
									align: "right"
								},
									time: 10,
								});

								// reset the form
							
							} else {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Sukses',
									message: response.messages,
								},{
									type: 'info',
									placement: {
									from: "bottom",
									align: "right"
								},
									time: 10,
								});
							}  // /else
						} // success  
					}); // ajax subit 				
				


				return false;
			}); // /submit form for create member

});  
</script>	
</body>
</html>