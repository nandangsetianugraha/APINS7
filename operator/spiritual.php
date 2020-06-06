<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$peta=1;
$sql_asp=mysqli_query($koneksi, "select * from aspek where kd_aspek='$peta'");
$nama_asp=mysqli_fetch_array($sql_asp);
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
						<h4 class="page-title">Penilaian Sikap Spiritual</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<select class="form-control" id="kelas" name="kelas">
									<option value="0">Pilih Kelas</option>
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tapel' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="row">
						<div class="col-md-7">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Sikap Spiritual</div>
										<div class="card-tools">
																					
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="sosTable" class="display table">
											<thead>
															<tr>
																<th class="text-center" width="45%">Nama Siswa</th>
																<th class="text-center">Catatan Perilaku</th>
															</tr>
														</thead>
											<tbody>	
																			
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Standar Penilaian</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
									<table class="display table">
									<thead>
										<tr>
											<th>Sikap</th>
											<th>Indikator</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Ketaatan Beribadah</td>
											<td>
												<ul>
													<li>perilaku patuh dalam melaksanakan ajaran agama yang dianutnya</li>
													<li>mau mengajak teman seagamnya untuk melakukan ibadah bersama</li>
													<li>mengikuti kegiatan keagamaan yang diselenggarakan sekolah</li>
													<li>melaksanakan ibadah sesuai ajaran agama, misalnya: shalat, puasa</li>
													<li>merayakan hari besar agama</li>
													<li>melaksanakan ibadah tepat waktu</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>Berprilaku Syukur</td>
											<td>
												<ul>
													<li>mengakui kebesaran Tuhan dalam menciptakan alam semesta</li>
													<li>menjaga kelestarian alam, tidak merusak tanaman</li>
													<li>tidak mengeluh</li>
													<li>selalu merasa gembira dalam segala hal</li>
													<li>tidak berkecil hati dengan keadaannya</li>
													<li>suka memberi atau menolong sesama</li>
													<li>selalu berterima kasih bila menerima pertolongan</li>
													<li>menerima perbedaan karakteristik sebagai anugerah Tuhan</li>
													<li>selalu menerima penugasan dengan sikap terbuka</li>
													<li>berterima kasih atas pemberian orang lain</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>Berdoa sebelum dan sesudah melakukan kegiatan</td>
											<td>
												<ul>
													<li>berdoa sebelum dan sesudah belajar</li>
													<li>berdoa sebelum dan sesudah makan</li>
													<li>mengajak teman berdoa saat memulai kegiatan</li>
													<li>mengingatkan teman untuk selalu berdoa</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>Toleransi dalam beribadah</td>
											<td>
												<ul>
													<li>tindakan yang menghargai perbedaan dalam beribadah</li>
													<li>menghormati teman yang berbeda agama</li>
													<li>bertemen tanpa membedakan agama</li>
													<li>tidak mengganggu teman yang sedang beribadah</li>
													<li>menghormati hari besar keagamaan lain</li>
													<li>tidak menjelekkan ajaran agama lain</li>
												</ul>
											</td>
										</tr>
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
		
		<!--Modal tambah Sikap-->
		<div class="modal fade" id="tambahNilai">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Nilai Spiritual</h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahspi.php" autocomplete="off" method="POST" id="createSosForm">
							<div class="fetched-data"></div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Delete Nilai-->
		<div class="modal fade" id="removeNilaiModal">
          <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-body">
							<p>Hapus Nilai Spiritual?</p>
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
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script type="text/javascript" language="javascript" class="init">
	var sosTable;
	$(document).ready(function() {
		sosTable = $('#sosTable').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/administrasi/spiritual.php?kelas=0&smt=0&tapel=0",
				"order": []
			} );
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			
			sosTable = $('#sosTable').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/administrasi/spiritual.php?kelas="+kelas+"&smt=<?=$smt;?>&tapel=<?=$tapel;?>",
				"order": []
			} );
			
		});
		$('#tambahNilai').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('pdid');
			var rowsmt = $(e.relatedTarget).data('smt');
			var rowtapel = $(e.relatedTarget).data('tapel');
			var rowkelas = $(e.relatedTarget).data('kelas');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal_psi.php',
                data :  'peta=1&kelas='+rowkelas+'&smt='+rowsmt+'&tapel='+rowtapel+'&idpd='+rowid,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		 $("#createSosForm").unbind('submit').bind('submit', function() {

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
								$("#tambahNilai").modal('hide');

								// reload the datatables
								sosTable.ajax.reload(null, false);
								
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
	});
	function removeSpi(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/administrasi/hapusspi.php',
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
							sosTable.ajax.reload(null, false);

							// close the modal
							$("#removeNilaiModal").modal('hide');

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