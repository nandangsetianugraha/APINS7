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
						<h4 class="page-title">Daftar Pendidik dan Tenaga Kependidikan</h4>
					</div>
					
					<div class="card">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Daftar PTK</div>
								<div class="card-tools">
									<a href="#" data-toggle="modal" data-toggle="modal" data-target="#penempatan" class="btn btn-info btn-border btn-round btn-sm">
										<span class="btn-label">
											<i class="fa fa-print"></i>
										</span>
										Penempatan
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="manageMemberTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th></th>
												<th class="text-center">Nama Guru</th>
												<th class="text-center">NIK</th>
												<th class="text-center">NIY</th>
												<th class="text-center">NUPTK</th>
												<th class="text-center">Mengajar</th>
												<th>&nbsp;</th>
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
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script>
	
	var manageMemberTable;
	var managePenempatan;
	$(document).ready(function() {
		manageMemberTable = $("#manageMemberTable").DataTable({
			"destroy":true,
			"ajax": "modul/ptk/daftarguru.php?tapel=<?=$tpl_aktif;?>",
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