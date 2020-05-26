<?php include "partial/head.php";
$idp=isset($_GET['idp']) ? $_GET['idp'] : 0;
$bio = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita where id='$idp'"));
$tanggal=$bio['tanggal'];
$tgl=substr($tanggal,8,2);
$bln=substr($tanggal,5,2);
$thn=substr($tanggal,0,4);
$waktu=$bln."/".$tgl."/".$thn; 
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
								<a href="blog.php" class="btn btn-info btn-border btn-round btn-sm">
									<span class="btn-label">
										<i class="fas fa-address-card"></i>
									</span>
									Tutup
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
								if($_GET['status']==='sukses'){
							?>
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses</h4>
									Artikel sudah diperbaharui
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
							<form class="form-horizontal" action="modul/blog/simpanblog.php" method="POST" id="artikelForm">
								<div class="modal-body">
									<div class="form-group form-group-default">
										<label>Tanggal</label>
										<input type="text" class="form-control pull-right" name="tanggal" id="datepicker" value="<?=$waktu;?>">
										<input type="hidden" name="id" class="form-control" value="<?=$idp;?>">
									</div>
									<div class="form-group form-group-default">
										<label>Judul</label>
										<input type="text" class="form-control" name="judul" value="<?=$bio['judul'];?>">
									</div>
									<div class="form-group form-group-default">
										<label>Isi</label>
										<textarea id="editor1" name="isiartikel" rows="10" cols="60"><?=$bio['isi'];?></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-danger waves-effect waves-light">Simpan</button>
								</div>
							</form>
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
	<script src="../assets/js/plugin/ckeditor/ckeditor.js"></script>
	<script src="../assets/js/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script>
	$(function () {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1')
		//bootstrap WYSIHTML5 - text editor
		$('.textarea').wysihtml5()
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