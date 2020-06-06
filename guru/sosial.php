<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;
$peta=2;
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
						<h4 class="page-title">Penilaian Sikap Sosial</h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<?php if($level==94 or $level==95 or $level==96){?>
								<select class="form-control" id="kelas" name="kelas">
									<option value="0">Pilih Kelas</option>
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tapel' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
								<?php }else{ ?>
								<select class="form-control" id="kelas" name="kelas">
									<option value="<?=$romb;?>"><?=$romb;?></option>
								</select>
								<?php }; ?>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Sikap Sosial</div>
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
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Standar Penilaian</div>
									</div>
								</div>
								<div class="card-body">
									<div class="box-group" id="accordion">
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#jujur">
										Jujur
									  </a>
									</h4>
								  </div>
								  <div id="jujur" class="panel-collapse collapse in">
									<div class="box-body">
									  <ul>
										<li>tidak berbohong</li>
										<li>tidak mencontek</li>
										<li>mengerjakan sendiri tugas yang diberikan tanpa menjiplak tugas orang lain</li>
										<li>mengerjakan soal penilaian tanpa mencontek</li>
										<li>mengatakan dengan sesungguhnya apa yang terjadi atau yang dialaminya dalam kehidupan sehari-hari</li>
										<li>mau mengakui kesalahan atau kekeliruan</li>
										<li>mengembalikan barang yang dipinjam atau ditemukan</li>
										<li>mengemukakan pendapat sesuai dengan apa yang diyakininya, walaupun berbeda dengan pendapat teman</li>
										<li>mengemukakan ketidaknyamanan belajar yang dirasakannya di sekolah</li>
										<li>membuat laporan kegiatan kelas secara terbuka (transparan)</li>
									  </ul>
									</div>
								  </div>
								</div>
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#disiplin">
										Disiplin
									  </a>
									</h4>
								  </div>
								  <div id="disiplin" class="panel-collapse collapse">
									<div class="box-body">
										<ul>
											<li>mengikuti peraturan yang ada di sekolah</li>
											<li>tertib dalam melaksanakan tugas</li>
											<li>hadir di sekolah tepat waktu</li>
											<li>masuk kelas tepat waktu</li>
											<li>memakai pakaian seragam lengkap dan rapi</li>
											<li>tertib mentaati peraturan sekolah</li>
											<li>melaksanakan piket kebersihan kelas</li>
											<li>mengumpulkan tugas/pekerjaan rumah tepat waktu</li>
											<li>mengerjakan tugas/pekerjaan rumah dengan baik</li>
											<li>membagi waktu belajar dan bermain dengan baik</li>
											<li>mengambil dan mengembalikan peralatan belajar pada tempatnya</li>
											<li>tidak pernah terlambat masuk kelas</li>
										</ul>
									</div>
								  </div>
								</div>
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#tanggung">
										Tanggung Jawab
									  </a>
									</h4>
								  </div>
								  <div id="tanggung" class="panel-collapse collapse">
									<div class="box-body">
									  <ul>
										<li>menyelesaikan tugas yang diberikan</li>
										<li>mengakui kesalahan</li>
										<li>melaksanakan tugas yang menjadi kewajibannya di kelas seperti piket kebersihan</li>
										<li>melaksanakan peraturan sekolah dengan baik</li>
										<li>mengerjakan tugas/pekerjaan rumah sekolah dengan baik</li>
										<li>mengumpulkan tugas/pekerjaan rumah tepat waktu</li>
										<li>mengakui kesalahan, tidak melemparkan kesalahan kepada teman</li>
										<li>berpartisipasi dalam kegiatan sosial di sekolah</li>
										<li>menunjukkan prakarsa untuk mengatasi masalah dalam kelompok di kelas/sekolah</li>
										<li>membuat laporan setelah selesai melakukan kegiatan</li>
									  </ul>
									</div>
								  </div>
								</div>
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#santun">
										Santun
									  </a>
									</h4>
								  </div>
								  <div id="santun" class="panel-collapse collapse">
									<div class="box-body">
									  <ul>
										<li>menghormati orang lain dan menghormati cara bicara yang tepat</li>
										<li>menghormati pendidik, pegawai sekolah,penjaga kebun, dan orang yang lebih tua</li>
										<li>berbicara atau bertutur kata halus tidak kasar</li>
										<li>berpakaian rapi dan pantas</li>
										<li>dapat mengendalikan emosi dalam menghadapi masalah, tidak marah-marah</li>
										<li>mengucapkan salam ketika bertemu pendidik,teman, dan orang-orang di sekolah</li>
										<li>menunjukkan wajah ramah, bersahabat, dan tidak cemberut</li>
										<li>mengucapkan terima kasih apabila menerima bantuan dalam bentuk jasa atau barang dari orang lain</li>
									  </ul>
									</div>
								  </div>
								</div>
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#peduli">
										Peduli
									  </a>
									</h4>
								  </div>
								  <div id="peduli" class="panel-collapse collapse">
									<div class="box-body">
									  <ul>
										<li>ingin tahu dan ingin membantu teman yang kesulitan dalam pembelajaran, perhatian kepada orang lain</li>
										<li>berpartisipasi dalam kegiatan sosial di sekolah,misal: mengumpulkan sumbangan untuk membantu yang sakit atau kemalangan</li>
										<li>meminjamkan alat kepada teman yang tidak membawa/memiliki</li>
										<li>menolong teman yang mengalami kesulitan</li>
										<li>menjaga keasrian,  keindahan, dan kebersihan lingkungan sekolah</li>
										<li>melerai teman yang berselisih (bertengkar)</li>
										<li>menjenguk teman atau pendidik yang sakit</li>
										<li>menunjukkan perhatian terhadap kebersihan kelas dan lingkungan sekolah</li>
									  </ul>
									</div>
								  </div>
								</div>
								<div class="panel box box-primary">
								  <div class="box-header with-border">
									<h4 class="box-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#percaya">
										Percaya Diri
									  </a>
									</h4>
								  </div>
								  <div id="percaya" class="panel-collapse collapse">
									<div class="box-body">
									  <ul>
										<li>berani tampil di depan kelas</li>
										<li>berani mengemukakan pendapat</li>
										<li>berani mencoba hal baru</li>
										<li>mengemukakan pendapat terhadap suatu topik atau masalah</li>
										<li>mengajukan diri menjadi ketua kelas atau pengurus kelas lainnya</li>
										<li>mengajukan diri untuk mengerjakan tugas atau soal di papan tulis</li>
										<li>mencoba hal-hal baru yang bermanfaat</li>
										<li>mengungkapkan kritikan membangun terhadap karya orang lain</li>
										<li>memberikan argumen yang kuat untuk mempertahankan pendapat</li>
									  </ul>
									</div>
								  </div>
								</div>
							</div>
								</div>
							</div>
						</div>
					</div>
					<?php }else{ ?>
					<div class="card">
						<div class="card-body">
							<div class="alert alert-info alert-dismissible">
								<h4><i class="icon fa fa-info"></i> Informasi</h4>
								Hanya bisa diakses Guru Kelas atau Guru Pendamping
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!--Modal tambah Sikap-->
		<div class="modal fade" id="tambahNilai">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Nilai Sosial</h4>
              </div>
                        <form class="form-horizontal" action="modul/administrasi/tambahsos.php" autocomplete="off" method="POST" id="createSosForm">
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
							<p>Hapus Nilai Sosial?</p>
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
				"ajax": "modul/administrasi/sosial.php?kelas=<?=$kelas;?>&smt=<?=$smt;?>&tapel=<?=$tapel;?>",
				"order": []
			} );
		$('#tambahNilai').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('pdid');
			var rowsmt = $(e.relatedTarget).data('smt');
			var rowtapel = $(e.relatedTarget).data('tapel');
			var rowkelas = $(e.relatedTarget).data('kelas');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'modul/administrasi/modal_sos.php',
                data :  'peta=2&kelas='+rowkelas+'&smt='+rowsmt+'&tapel='+rowtapel+'&idpd='+rowid,
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
	function removeSos(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/administrasi/hapussos.php',
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