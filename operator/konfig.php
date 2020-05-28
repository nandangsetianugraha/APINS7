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
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Maintenance</label>
												<select class="form-control" name="maintenis">
													<option value="0" <?php if($esmanis['maintenis']=="0"){echo "selected";};?>>Tidak</option>
													<option value="1" <?php if($esmanis['maintenis']=="1"){echo "selected";};?>>Ya</option>
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
									<a href="#" data-toggle="modal" data-target="#tambahKelas" title="Contacts" id="<?=$tapel;?>" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fa fa-plus"></i>
										</span>
										Rombel
									</a>
									<div class="table-responsive">
										<table id="KelasTable" class="display table">
											<thead>
											   <tr>
													<th>Nama Rombel</th>
													<th>Kurikulum</th>
													<th>Wali Kelas</th>
													<th>Pendamping</th>
													<th>Guru PAI</th>
													<th>Guru Penjas</th>
													<th>Guru Bahasa Inggris</th>
													<th></th>
												</tr>
											</thead>
											<tbody>	
																			
											</tbody>
										</table>
									</div>
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
		<!--Tambah Kelas-->
		<div class="modal fade" id="tambahKelas">
          <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Rombel</h4>
				</div>
                <form class="form-horizontal" action="modul/setting/tambahKelas.php" autocomplete="off" method="POST" id="createKelasForm">
					<div class="fetched-data"></div>
				</form>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Edit Kelas-->
		<div class="modal fade" id="editKelas">
          <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Rombel</h4>
				</div>
                <form class="form-horizontal" action="modul/setting/updateKelas.php" autocomplete="off" method="POST" id="updateKelasForm">
					<div class="fetched-data"></div>
				</form>
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
var KelasTable;
var TapelTable;
$(document).ready(function(){
	KelasTable = $('#KelasTable').DataTable( {
		"destroy":true,
		"searching": false,
		"paging":false,
		"ajax": "modul/setting/daftarKelas.php?tapel=<?=$tapel;?>",
		"order": []
	} );
	TapelTable = $('#TapelTable').DataTable( {
		"destroy":true,
		"searching": false,
		"paging":false,
		"ajax": "modul/setting/daftarTapel.php",
		"order": []
	} );
	$('#tambahKelas').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/setting/modal_Kelas.php',
                data :  'tapel=<?=$tapel;?>',
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
	$('#editKelas').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/setting/edit_Kelas.php',
                data :  'id='+rowid,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
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
	$("#updateKelasForm").unbind('submit').bind('submit', function() {

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
								KelasTable.ajax.reload(null, false);
								$("#editKelas").modal('hide');
							
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