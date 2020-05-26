<?php include "partial/head.php"; 
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
?>
</head>
<link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css"/>
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
						<h4 class="page-title">Daftar Siswa</h4>
					</div>
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line">
								<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Aktif</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lulus</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Mutasi</a>
									</li>
								</ul>
							</div>
							<div class="card-head-row">
								<div class="card-title">Daftar Siswa</div>
								<div class="card-tools">
									<a href="#" data-toggle="modal" data-toggle="modal" data-target="#penempatan" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fas fa-indent"></i>
										</span>
										Penempatan
									</a>
									<a href="siswabaru.php" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fas fa-id-card"></i>
										</span>
										Siswa Baru
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content mt-2 mb-3" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="table-responsive">
										<table id="manageMemberTable" class="display table table-hover" >
											<thead>
											   <tr>
													<th>Nama Siswa</th>
													<th>NIS</th>
													<th>NISN</th>
													<th>TTL</th>
													<th>JK</th>
													<th>Rombel</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="table-responsive">
										<table id="SiswaLulus" class="display table table-hover" >
											<thead>
											   <tr>
													<th>Nama Siswa</th>
													<th>NIS</th>
													<th>NISN</th>
													<th>TTL</th>
													<th>JK</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
									<div class="table-responsive">
										<table id="SiswaMutasi" class="display table table-hover" >
											<thead>
											   <tr>
													<th>Nama Siswa</th>
													<th>NIS</th>
													<th>NISN</th>
													<th>TTL</th>
													<th>JK</th>
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
		
		<!--Modal kelas-->
		<div class="modal fade" id="penempatanMemberModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tempatkan Siswa</h4>
              </div>
                        <form class="form" action="modul/siswa/penempatansiswa.php" method="POST" id="penempatanMemberForm">
						<div class="modal-body">
							<div class="form-group form-group-default">
								<label>Nama Siswa</label>
								<input type="hidden" class="form-control" id="tapel" name="tapel" value="<?=$tpl_aktif;?>">
								<input id="penempatannama" type="text" name="penempatannama" autocomplete=off class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<select class="form-control" name="kelas" id="kelas">
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tpl_aktif' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?php echo $nk['nama_rombel']; ?>">Kelas <?php echo $nk['nama_rombel']; ?></option>
									<?php };?>
								</select>
							</div>
                        </div>
                        <div class="modal-footer penempatanMemberModal">
                            <button type="button" class="btn btn-info btn-border btn-round" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-info btn-border btn-round">Ya</button>
                        </div>
						</form>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Modal Hapus Siswa-->
		<div class="modal fade" id="outMemberModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Keluar Rombel</h4>
              </div>
                        <div class="modal-body">
							<p>Keluarkan Siswa dari Rombel?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-border btn-round" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-info btn-border btn-round" id="outBtn">Ya</button>
                        </div>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Modal Edit Biodata-->
			
		<div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Biodata Siswa</h4>
              </div>
                        <form class="form-horizontal" action="modul/siswa/simpanData.php" autocomplete="off" method="POST" id="updateSiswaForm">
						<div class="modal-body editSiswa">
							<div class="fetched-data"></div>
						</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-border btn-round" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-border btn-round">Update</button>
                        </div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Mutasi Modal-->
		<div class="modal fade" id="MutasiModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Mutasi Siswa</h4>
              </div>
                        <form class="form-horizontal" action="modul/siswa/mutasiSiswa.php" autocomplete="off" method="POST" id="mutasiSiswaForm">
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
	<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
	<script>
	
	var manageMemberTable;
	var managePenempatan;
	var SiswaLulus;
	var SiswaMutasi;
	$(document).ready(function() {
		manageMemberTable = $("#manageMemberTable").DataTable({
			"destroy":true,
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/kelasku.php?smt=<?=$smt;?>&tapel=<?=$tapel;?>",
			"order": [],
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
		});
		SiswaLulus = $("#SiswaLulus").DataTable({
			"destroy":true,
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/lulus.php",
			"order": []
		});
		SiswaMutasi = $("#SiswaMutasi").DataTable({
			"destroy":true,
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/mutasi.php",
			"order": []
		});
		managePenempatan = $("#managePenempatan").DataTable({
			"destroy":true,
			"ajax": "modul/siswa/siswakosong.php?tapel=<?=$tpl_aktif;?>",
			"order": []
		});
		$('#penempatan').on('show.bs.modal', function (e) {
            var tapel=$('#tapel').val();
            //menggunakan fungsi ajax untuk pengambilan data
            managePenempatan = $("#managePenempatan").DataTable({
				"destroy":true,
				"ajax": "modul/siswa/siswakosong.php?tapel="+tapel,
				"order": []
			});
         });
		$('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/siswa/modal_edit.php',
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
		 $('#MutasiModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/siswa/modal_mutasi.php',
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
		 $("#mutasiSiswaForm").unbind('submit').bind('submit', function() {
			// remove error messages
			$(".text-danger").remove();
			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				beforeSend: function()
					{	
						$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
					},
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
				
					// reload the datatables
						manageMemberTable.ajax.reload(null, false);
						SiswaMutasi.ajax.reload(null, false);
						SiswaLulus.ajax.reload(null, false);
						// this function is built in function of datatables;
						// remove the error 
						$("#MutasiModal").modal('hide');
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
				} // /success
			}); // /ajax

			return false;
		});
		 $("#updateSiswaForm").unbind('submit').bind('submit', function() {
						// remove error messages
						$(".text-danger").remove();

						var form = $(this);

							$.ajax({
								url: form.attr('action'),
								type: form.attr('method'),
								data: form.serialize(),
								dataType: 'json',
								beforeSend: function()
								{	
									$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
								},
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
				
										// reload the datatables
										manageMemberTable.ajax.reload(null, false);
										// this function is built in function of datatables;

										// remove the error 
										$("#myModal").modal('hide');
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
								} // /success
							}); // /ajax

						return false;
					});

	});
	function penempatanMember(id = null) {
		if(id) {

			// remove the error 
			$(".form-group").removeClass('has-error').removeClass('has-success');
			$(".text-danger").remove();
			$("#penempatan").modal('hide');
			// remove the id
			$("#member_id").remove();

			// fetch the member data
			$.ajax({
				url: 'modul/siswa/lihatsiswa.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					$("#penempatannama").val(response.nama);

					// mmeber id 
					$(".penempatanMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

					// here update the member data
					$("#penempatanMemberForm").unbind('submit').bind('submit', function() {
						// remove error messages
						$(".text-danger").remove();

						var form = $(this);

						// validation
						var kelas = $("#kelas").val();
						var tapel = $("#tapel").val();
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

										// reload the datatables
										manageMemberTable.ajax.reload(null, false);
										managePenempatan.ajax.reload(null, false);
										// this function is built in function of datatables;

										// remove the error 
										$("#penempatanMemberModal").modal('hide');
										$("#penempatan").modal('show');
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
								} // /success
							}); // /ajax

						return false;
					});

				} // /success
			}); // /fetch selected member info

		} else {
			alert("Error : Refresh the page again");
		}
	}
	function outMember(id = null) {
		if(id) {
			// click on remove button
			$("#outBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/siswa/outsiswa.php',
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
							managePenempatan.ajax.reload(null, false);

							// close the modal
							$("#outMemberModal").modal('hide');

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
			}); // click remove btn
		} else {
			alert('Error: Refresh the page again');
		};
		
		function editMember(id = null) {
			if(id) {
				// remove the error 
				$(".form-group").removeClass('has-error').removeClass('has-success');
				$(".text-danger").remove();
				// empty the message div
				$(".edit-messages").html("");
				// remove the id
				$("#member_id").remove();
				$.ajax({
					url: 'modul/siswa/lihatsiswa.php',
					type: 'post',
					data: {member_id : id},
					dataType: 'json',
					success:function(response) {
						$("#editnama").val(response.nama);
						$("#edittempat").val(response.tempat);
						$("#edittanggal").val(response.tanggal);
						$("#editjk").val(response.jk);	
						$("#editnis").val(response.nis);	
						$("#editnisn").val(response.nisn);	
						$("#editnik").val(response.nik);	
						$("#editalamat").val(response.alamat);	
						$("#editayah").val(response.nama_ayah);	
						$("#editibu").val(response.nama_ibu);	

						// mmeber id 
						$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

						// here update the member data
						$("#editMemberForm").unbind('submit').bind('submit', function() {
							// remove error messages
							$(".text-danger").remove();

							var form = $(this);

							// validation
							var editnama = $("#editnama").val();
							var edittempat = $("#edittempat").val();
							var edittanggal = $("#edittanggal").val();
							var editjk = $("#editjk").val();
							var editnis = $("#editnis").val();
							var editnisn = $("#editnisn").val();
							var editnik = $("#editnik").val();
							var editalamat = $("#editalamat").val();
							var editayah = $("#editayah").val();
							var editibu = $("#editibu").val();
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

											// reload the datatables
											manageMemberTable.ajax.reload(null, false);
											// this function is built in function of datatables;

											// remove the error 
											$("#editMemberModal").modal('hide');
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
									} // /success
								}); // /ajax

							return false;
						});

					} // /success
				}); // /fetch selected member info
			}else{
				alert("Error : Refresh the page again");
			}
		}
	}
</script>
</body>
</html>