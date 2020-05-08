<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$tema=isset($_GET['tema']) ? $_GET['tema'] : '1';
if($level==96){ //guru pai
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : 1;
}elseif($level==95){ //guru penjas
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 8;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : 1;
}elseif($level==94){ //guru bahasa inggris
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 10;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : 1;
}else{
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 2;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $ab;
};
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
						<h4 class="page-title">Kompetensi Dasar</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<?php if($level==94 or $level==95 or $level==96){?>
								<select class="form-control" id="kelas" name="kelas">
									<?php 
									for($i = 1; $i < 7; $i++) {
									?>
									<option value="<?=$i;?>">Kelas <?=$i;?></option>
									<?php };?>
								</select>
								<?php }else{ ?>
								<select class="form-control" id="kelas" name="kelas">
									<option value="<?=$ab;?>">Kelas <?=$ab;?></option>
								</select>
								<?php }; ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Mata Pelajaran</label>
							<?php if($level==98 or $level==97){ ?>
							<select class="form-control" id="mp" name="mp">
								<option value="0">==Pilih Mapel==</option>
							<?php 
							$sql2 = "select * from mapel";
							$qu3 = mysqli_query($koneksi,$sql2) or die("database error:". mysqli_error($koneksi));
							while($po=mysqli_fetch_array($qu3)){
								$idmp=$po['id_mapel'];
								if($idmp==1 or $idmp==10){
									
								}else{
									if($ab<4 and ($idmp==5 or $idmp==6)){
										
									}else{
										if($ab>3 and $idmp==8){
											
										}else{
							?>
								<option value="<?=$po['id_mapel'];?>"><?=$po['nama_mapel'];?></option>
							<?php };
							};
							};
							};?>
							</select>
							<?php }; ?>
							<?php if($level==96){ //mapel PAI ?>
							<select class="form-control" id="mp" name="mp">
								<option value="0">==Pilih Mapel==</option>
								<option value="1">Pendidikan Agama Islam</option>
							</select>
							<?php }; ?>
							<?php if($level==95){ //mapel PJOK ?>
							<select class="form-control" id="mp" name="mp">
								<option value="0">==Pilih Mapel==</option>
								<option value="8">Pend. Jasmani Olahraga dan Kesehatan</option>
							</select>
							<?php }; ?>
							<?php if($level==94){ //mapel Inggris ?>
							<select class="form-control" id="mp" name="mp">
								<option value="0">==Pilih Mapel==</option>
								<option value="10">Bahasa Inggris</option>
							</select>
							<?php }; ?>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">KD Pengetahuan</div>
										<div class="card-tools">
											<a href="#" data-toggle="modal" data-target="#tambahKD" id="3" title="Contacts" class="btn btn-info btn-border btn-round btn-sm">
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
													<th>KD</th>
													<th>Deskripsi</th>
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
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">KD ketrampilan</div>
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
													<th>KD</th>
													<th>Deskripsi</th>
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
					
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<!--Modal Tambah KD Peng-->
		<div class="modal fade" id="tambahKD">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">KD Pengetahuan Kelas <?php echo $ab;?></h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahKDp.php" autocomplete="off" method="POST" id="createKDForm">
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
                <h4 class="modal-title">KD Ketrampilan Kelas <?php echo $ab;?></h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahKDk.php" autocomplete="off" method="POST" id="createKDFormk">
						<div class="modal-body editSiswa">
							<div class="fetched-data"></div>
						</div>
                        
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		<!--Delete KD-->
		<div class="modal fade" id="removeKDModal">
          <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-body">
							<p>Hapus KD ini dari Kelas <?=$ab;?>?</p>
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
		
		<!--Edit KD Pengetahuan-->
		<div class="modal fade" id="editKD">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Kompetensi Dasar</h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/updateKD.php" autocomplete="off" method="POST" id="updateKDForm">
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
		<?php if($level==98 or $level==97){ ?>
		$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			
			KDTable = $('#KDTable').DataTable( {
						"destroy":true,
						"searching": false,
						"paging":false,
						"ajax": "modul/administrasi/daftarKD.php?kelas="+kelas+"&aspek=3&mp="+mp,
						"order": []
					} );
					KDTablek = $('#KDTablek').DataTable( {
						"destroy":true,
						"searching": false,
						"paging":false,
						"ajax": "modul/administrasi/daftarKD.php?kelas="+kelas+"&aspek=4&mp="+mp,
						"order": []
					} );
		});
		<?php }else{ ?>
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			var level=<?=$level;?>;
			
			$.ajax({
				type : 'GET',
				url : 'mpl.php',
				data :  'kelas=' +kelas+'&level='+level,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#mp").html(data);
					$("#KDPeng").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Mata Pelajaran</div>');
					$("#KDKet").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Mata Pelajaran</div>');
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
						"ajax": "modul/administrasi/daftarKD.php?kelas="+kelas+"&aspek=3&mp="+mp,
						"order": []
					} );
					KDTablek = $('#KDTablek').DataTable( {
						"destroy":true,
						"searching": false,
						"paging":false,
						"ajax": "modul/administrasi/daftarKD.php?kelas="+kelas+"&aspek=4&mp="+mp,
						"order": []
					} );
			
		});
		<?php }; ?>
		$('#tambahKD').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal_KDP.php',
                data :  'peta='+ rowid+'&mp='+mp+'&kelas='+kelas,
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
                url : 'modul/administrasi/modal_KDK.php',
                data :  'peta='+ rowid+'&mp='+mp+'&kelas='+kelas,
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
                url : 'modul/administrasi/edit-kd.php',
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
					url: 'modul/administrasi/hapusKD.php',
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