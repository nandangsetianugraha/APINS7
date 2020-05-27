<?php include "partial/head.php"; 
?>
<link rel="stylesheet" href="../assets/js/plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
						<h4 class="page-title">Daftar Postingan</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#" data-toggle="modal" data-target="#penempatan" class="btn btn-info btn-border btn-round btn-sm">
									<span class="btn-label">
										<i class="fas fa-address-card"></i>
									</span>
									Postingan Baru
								</a>
							</li>
						</ul>
					</div>
					
					<div class="card">
						
						<div class="card-body">
							<?php 
						if(isset($_GET['status'])) {
							if($_GET['status']==='kosong'){
						?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Error</h4>
								Isi Yang benar Bung
							</div>
						<?php
								
							};
							if($_GET['status']==='gagal'){
						?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Error</h4>
								Gagal Bung!!
							</div>
						<?php
								
							};
						};
						?>
							<div class="table-responsive">
								<table id="manageMemberTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
											<th class="text-center" width="15%">Tanggal</th>
											<th class="text-center" width="29%">Judul</th>
											<th class="text-center" width="50%">Isi</th>
											<th width="6%">&nbsp;</th>
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
		
		<!--Modal POST-->
		<div class="modal fade" id="penempatan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Posting Baru</h4>
              </div>
                        <form class="form-horizontal" action="modul/blog/tambahblog.php" autocomplete="off" method="POST" id="tambahArtikelForm">
							<div class="modal-body">
								<div class="form-group form-group-default">
									<label>Tanggal</label>
									<input type="text" class="form-control pull-right" name="tanggal" id="datepicker">
								</div>
								<div class="form-group form-group-default">
									<label>Judul</label>
									<input type="text" class="form-control" name="judul" id="judul">
								</div>
								<div class="form-group form-group-default">
									<label>Isi</label>
									<textarea id="editor1" name="isi" rows="10" cols="60"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-danger waves-effect waves-light">Simpan</button>
							</div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Delete POST-->
		<div class="modal fade" id="outMemberModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus Artikel</h4>
              </div>
                        	<div class="modal-body">
								<p>Anda yakin akan menghapus artikel ini?<br/>Data yang telah dihapus tidak bisa dikembalikan lagi.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-danger waves-effect waves-light" id="outBtn">Hapus</button>
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
	<script src="../assets/js/plugin/ckeditor/ckeditor.js"></script>
	<script src="../assets/js/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script>
	$(function () {
		CKEDITOR.replace('editor1')
	});
	var manageMemberTable;
	$(document).ready(function() {
		$('#datepicker').datepicker({
		  autoclose: true
		});
		manageMemberTable = $("#manageMemberTable").DataTable({
			"ajax": "modul/blog/daftarblog.php",
			"order": []
		});
		$("#tambahArtikelForm").unbind('submit').bind('submit', function() {
			var tanggal=$('#datepicker').val();
			var judul=$('#judul').val();
			var isi = CKEDITOR.instances.editor1.getData();
			$.ajax({
					url: 'modul/blog/tambahblog.php',
					type: 'post',
					data: {tanggal : tanggal,judul : judul, isi : isi},
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

							manageMemberTable.ajax.reload(null, false);
							$("#penempatan").modal('hide');
							$("#tambahArtikelForm")[0].reset();
							CKEDITOR.instances.editor1.setData('');
						} else {
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
						}
					}
				});

			return false;
		});
	});
	function outMember(id = null) {
		if(id) {
			// click on remove button
			$("#outBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/blog/hapusblog.php',
					type: 'post',
					data: {member_id : id},
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

							// refresh the table
							manageMemberTable.ajax.reload(null, false);
							
							// close the modal
							$("#outMemberModal").modal('hide');

						} else {
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
						}
					}
				});
			}); // click remove btn
		} else {
			alert('Error: Refresh the page again');
		}
	}
</script>
</body>
</html>