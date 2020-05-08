<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
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
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<select class="form-control" id="kelas" name="kelas">
									<?php 
									for($i = 1; $i < 7; $i++) {
									?>
									<option value="<?=$i;?>">Kelas <?=$i;?></option>
									<?php };?>
								</select>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Tema Kelas <?=$ab;?> Semester <?=$smt;?></div>
								<div class="card-tools">
									<a href="#" data-toggle="modal" data-target="#tambahTema" title="Contacts" id="4" class="btn btn-info btn-border btn-round btn-sm mr-2">
										<span class="btn-label">
											<i class="fa fa-print"></i>
										</span>
										Tambah
									</a>
									<a href="#" data-toggle="modal" data-target="#printTema" id="addTemaModalBtn" class="btn btn-info btn-border btn-round btn-sm">
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
                        <div class="fetched-data"></div>
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
			"destroy":true,
			"searching": false,
			"paging":false,
			"ajax": "modul/administrasi/temaku.php?kelas=<?=$ab;?>&smt=<?=$smt_aktif;?>",
			"order": []
		} );
		$('#kelas').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var smt = $('#smt').val();
			var tapel=$('#tapel').val();
			var kelas=$('#kelas').val();
			
			temaTable = $('#temaTable').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/administrasi/temaku.php?kelas="+kelas+"&smt="+smt,
				"order": []
			} );
		});
		$('#tambahTema').on('show.bs.modal', function (e) {
            //var rowid = $(e.relatedTarget).data('id');
			var smt = $('#smt').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal-tema.php',
                data :  '&smt='+smt+'&kelas='+kelas,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
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