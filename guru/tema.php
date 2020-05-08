<?php include "partial/head.php"; ?>
</head>
<body>
<?php
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
						<h4 class="page-title">Daftar Tema</h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					<div class="card">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Tema Kelas <?=$ab;?> Semester <?=$smt;?></div>
								<div class="card-tools">
									<a href="#" data-toggle="modal" data-target="#tambahTema" id="addTemaModalBtn" class="btn btn-info btn-border btn-round btn-sm mr-2">
										<span class="btn-label">
											<i class="fa fa-print"></i>
										</span>
										Tambah
									</a>
									<a href="#" data-toggle="modal" data-target="#tambahTema" id="addTemaModalBtn" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fa fa-print"></i>
										</span>
										Print
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="temaTable" class="display table table-hover">
									<thead>
									   <tr>
											<th>Tema</th>
											<th>Nama Tema</th>
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
							Hanya bisa diakses oleh Guru Kelas atau Guru Pendamping.
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<div class="modal fade" id="tambahTema">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Tema</h4>
              </div>
              <form class="form" action="modul/administrasi/tambahtema.php" method="POST" id="createTemaForm">
                        <div class="modal-body">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" id="kelas" name="kelas" class="form-control" value="<?php echo $kelas;?>">
								<input id="kelas1" type="text" autocomplete=off class="form-control" value="<?php echo $kelas;?>">
							</div>
							<div class="form-group form-group-default">
								<label>Semester</label>
								<input type="hidden" id="smt" name="smt" class="form-control" value="<?php echo $smt_aktif;?>">
								<input id="smt1" type="text" autocomplete=off class="form-control" value="<?php echo $smt_aktif;?>">
							</div>
							<div class="form-group form-group-default">
								<label>Tema</label>
								<input id="tema" type="text" name="tema" autocomplete=off class="form-control" placeholder="Tema">
							</div>
							<div class="form-group form-group-default">
								<label>Nama Tema</label>
								<input id="nama_tema" type="text" name="nama_tema" autocomplete=off class="form-control" placeholder="Nama Tema">
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-border btn-round btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-border btn-round btn-sm">Simpan</button>
                        </div>
						</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<div class="modal fade" id="removeTemaModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus</h4>
              </div>
                        <div class="modal-body">
							<p>Hapus Tema ini dari Kelas <?=$ab;?>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light" id="removeBtn">Ya</button>
                        </div>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<div class="modal fade" id="editTema">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Tema</h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/updatetema.php" autocomplete="off" method="POST" id="updateTemaForm">
						<div class="modal-body eTema">
							<div class="fetched-data"></div>
						</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
                        </div>
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
	<script>
	var temaTable;
	$(document).ready(function() {
		temaTable = $('#temaTable').DataTable( {
			"searching": false,
			"ajax": "modul/administrasi/temaku.php?kelas=<?=$ab;?>&smt=<?=$smt_aktif;?>",
			"order": []
		} );
		$("#addTemaModalBtn").on('click', function() {
			// reset the form 
			$("#createTemaForm")[0].reset();
			
			// submit form
			$("#createTemaForm").unbind('submit').bind('submit', function() {

				$(".text-danger").remove();

				var form = $(this);

				

					//submi the form to server
					$.ajax({
						url : form.attr('action'),
						type : form.attr('method'),
						data : form.serialize(),
						dataType : 'json',
						success:function(response) {

							// remove the error 
							$(".form-group").removeClass('has-error').removeClass('has-success');

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
								$("#tambahTema").modal('hide');

								// reload the datatables
								temaTable.ajax.reload(null, false);
								$("#createTemaForm")[0].reset();
								// this function is built in function of datatables;

							} else {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
									message: response.messages,
								},{
									type: 'warning',
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
		}); // /add modal
		
		//edit tema 
		$('#editTema').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/administrasi/edit-tema.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		 //Update Tema 
		 $("#updateTemaForm").unbind('submit').bind('submit', function() {
						// remove error messages
						$(".text-danger").remove();

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
											align: "right"
										},
											time: 10,
										});

										// reload the datatables
										temaTable.ajax.reload(null, false);
										// this function is built in function of datatables;

										// remove the error 
										$("#editTema").modal('hide');
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
									}
								} // /success
							}); // /ajax

						return false;
					});

	});
	function removeTema(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/administrasi/hapustema.php',
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
											align: "right"
										},
											time: 10,
										});

							// refresh the table
							temaTable.ajax.reload(null, false);

							// close the modal
							$("#removeTemaModal").modal('hide');

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