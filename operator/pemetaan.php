<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$tema=isset($_GET['tema']) ? $_GET['tema'] : '1';
$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : 1;
$ab=substr($romb,0,1);
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
						<h4 class="page-title">Pemetaan Kompetensi Dasar (KD) Semester <?=$smt;?></h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<select class="form-control" id="kelas" name="kelas">
									<option value="0">Pilih Kelas</option>
									<?php 
									for($i = 1; $i < 7; $i++) {
									?>
									<option value="<?=$i;?>">Kelas <?=$i;?></option>
									<?php };?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Mata Pelajaran</label>
							<select class="form-control" id="mp" name="mp">
								<option value="0">Pilih Mapel</option>
							</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Pemetaan Pengetahuan</div>
										<div class="card-tools">
											<a href="#" data-toggle="modal" data-target="#tambahKD" title="Contacts" id="3" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Pengetahuan
											</a>											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="KDTable" class="display table">
											<thead>
											   <tr>
													<th>Tema/PB</th>
													<th>Pemetaan</th>
												</tr>
											</thead>
											<tbody>	
																			
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Pemetaan ketrampilan</div>
										<div class="card-tools">
											<a href="#" data-toggle="modal" data-target="#tambahKDk" title="Contacts" id="4" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Ketrampilan
											</a>											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="KDTablek" class="display table">
											<thead>
											   <tr>
													<th>Tema/PB</th>
													<th>Pemetaan</th>
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
					
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<!--Modal Tambah KD Peng-->
		<div class="modal fade" id="tambahKD">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Pemetaan Pengetahuan Semester <?=$smt;?></h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahpeta.php" autocomplete="off" method="POST" id="createKDForm">
						<div class="modal-body editSiswa">
							<div class="fetched-data"></div>
						</div>
                        
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Modal tambah KD Ket-->
		<div class="modal fade" id="tambahKDk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Pemetaan Ketrampilan Semester <?=$smt;?></h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahpeta.php" autocomplete="off" method="POST" id="createKDFormk">
						<div class="modal-body editSiswa">
							<div class="fetched-data"></div>
						</div>
                        
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Hapus Pemetaan-->
		<div class="modal fade" id="removeKDModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus</h4>
              </div>
                        <div class="modal-body">
							<p>Hapus Pemetaan ini dari Kelas <?=$ab;?>?</p>
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
        <!-- /.modal -->
		
		<!--Edit Pemetaan-->
		<div class="modal fade" id="editKD">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Pemetaan KD</h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/updatepeta.php" autocomplete="off" method="POST" id="updateKDForm">
							<div class="fetched-data"></div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		
		
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script>
	var KDTable;
	var KDTablek;
	$(document).ready(function() {
		KDTable = $('#KDTable').DataTable( {
			"destroy":true,
			"searching": false,
			"paging":false,
			"ajax": "modul/administrasi/petaKD.php?kelas=0&smt=0&peta=3&mp=0",
			"order": []
		} );
		KDTablek = $('#KDTablek').DataTable( {
			"destroy":true,
			"searching": false,
			"paging":false,
			"ajax": "modul/administrasi/petaKD.php?kelas=0&smt=0&peta=4&mp=0",
			"order": []
		} );
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			
			$.ajax({
				type : 'GET',
				url : 'mpl.php',
				data :  'kelas=' +kelas,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#mp").html(data);
				}
			});
		});
		$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			KDTable = $('#KDTable').DataTable( {
						"destroy":true,
						"searching": false,
						"paging":false,
						"ajax": "modul/administrasi/petaKD.php?kelas="+kelas+"&smt=<?=$smt_aktif;?>&peta=3&mp="+mp,
						"order": []
					} );
					KDTablek = $('#KDTablek').DataTable( {
						"destroy":true,
						"searching": false,
						"paging":false,
						"ajax": "modul/administrasi/petaKD.php?kelas="+kelas+"&smt=<?=$smt_aktif;?>&peta=4&mp="+mp,
						"order": []
					} );
			
		});
		$('#tambahKD').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal_Peta.php',
                data :  'peta=3&mp='+mp+'&kelas='+kelas+"&smt=<?=$smt_aktif;?>",
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		 $('#tambahKDk').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal_Peta.php',
                data :  'peta=4&mp='+mp+'&kelas='+kelas+"&smt=<?=$smt_aktif;?>",
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		$("#createKDForm").unbind('submit').bind('submit', function() {

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
								$("#tambahKD").modal('hide');

								// reload the datatables
								KDTable.ajax.reload(null, false);
								$("#createKDForm")[0].reset();
								// this function is built in function of datatables;

							} else {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
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
			// submit form
			$("#createKDFormk").unbind('submit').bind('submit', function() {

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
								$("#tambahKDk").modal('hide');

								// reload the datatables
								KDTablek.ajax.reload(null, false);
								$("#createKDFormk")[0].reset();
								// this function is built in function of datatables;

							} else {
								$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
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
			}); // /submit form for Ketrampilan
		
		
		//edit KD
		$('#editKD').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			//menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/administrasi/edit-peta.php',
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
		 $("#updateKDForm").unbind('submit').bind('submit', function() {
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
										KDTable.ajax.reload(null, false);
										KDTablek.ajax.reload(null, false);
										// this function is built in function of datatables;

										// remove the error 
										$("#editKD").modal('hide');
									} else {
										$.notify({
											icon: 'flaticon-alarm-1',
											title: 'Error',
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
	function removeKD(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/administrasi/hapuspeta.php',
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
							KDTable.ajax.reload(null, false);
							KDTablek.ajax.reload(null, false);

							// close the modal
							$("#removeKDModal").modal('hide');

						} else {
							$.notify({
									icon: 'flaticon-alarm-1',
									title: 'Error',
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