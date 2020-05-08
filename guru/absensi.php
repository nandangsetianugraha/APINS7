<?php include "partial/head.php"; ?>
</head>
<body>
<?php
	$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
	$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
	$kelas=isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;	
	if(isset($_GET['tglbro'])){
		$tahun = substr($_GET['tglbro'], 6, 4);
		$bulan = substr($_GET['tglbro'], 0, 2);
		$tanggal   = substr($_GET['tglbro'], 3, 2);
		$tgl=$bulan."/".$tanggal."/".$tahun;
	}else{
		$tahun=isset($_GET['tahun']) ? $_GET['tahun'] : date("Y");
		$tanggal=isset($_GET['tgl']) ? $_GET['tgl'] : date("d");
		$bulan=isset($_GET['bulan']) ? $_GET['bulan'] : date("m");
		$tgl=$bulan."/".$tanggal."/".$tahun;
	};
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tanggal1 = $tahun."-".$bulan."-".$tanggal;
	$day = date('D', strtotime($tanggal1));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
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
						<h4 class="page-title">Absensi Siswa</h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					<div class="row">
						<div class="col-md-8">
							<form class="form-horizontal" action="absensi.php" method="GET">
							<div class="form-group">
								<label>Pilih Tanggal</label>
								<div class="input-group">
									<input type="text" class="form-control" id="datepicker" name="tglbro" value="<?=$tgl;?>" onchange="this.form.submit()">
									<div class="input-group-append">
										<span class="input-group-text">
										<i class="fa fa-calendar-check"></i>
										</span>
									</div>
								</div>
							</div>
							</form>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Absensi Siswa Kelas <?=$kelas;?></div>
										<div class="card-tools">
											<?php if($dayList[$day]==="Sabtu" || $dayList[$day]==="Minggu"){ ?>
											<?php }else{ ?>
											<a href="#" id="addAbsenModalBtn" data-toggle="modal" data-target="#tambahAbsen" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Absensi
											</a>
											<?php }; ?>
											
										</div>
									</div>
								</div>
								<div class="card-body">
									<p>Hari : <?=$dayList[$day];?>, <?=$tanggal;?> <?=$BulanIndo[(int)$bulan-1];?> <?=$tahun;?></p>
									<?php if($dayList[$day]==="Sabtu" || $dayList[$day]==="Minggu"){ ?>
									<div class="callout callout-success">
										<h4>Hari <?=$dayList[$day];?> Tidak bisa Absen ya :-)</h4>
									</div>
									<?php }else{ ?>
									<div class="table-responsive">
										<table id="absenTable" class="display table table-hover" >
											<thead>
											   <tr>
													<th>Nama Siswa</th>
													<th>Absensi</th>
													<th></th>
												</tr>
											</thead>
											<tbody>	
																			
											</tbody>
										</table>
									</div>
									<?php }; ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Cetak Daftar Hadir</div>
										<div class="card-tools">
											
											
										</div>
									</div>
								</div>
								<div class="card-body">
									<form class="form-horizontal" action="../cetak/cetakabsen.php" target="_blank" method="GET" id="cetakabsenForm">	
										<div class="row">
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Bulan</label>
													<input type="hidden" id="kelas" name="kelas" class="form-control" value="<?php echo $kelas;?>">
													<input type="hidden" id="tapel" name="tapel" class="form-control" value="<?php echo $tapel;?>">
													<select class="form-control" name="bulanku" id="bulanku">
														<option value="07" <?php if($bulan==="07"){echo "selected";}; ?>>Juli</option>
														<option value="08" <?php if($bulan==="08"){echo "selected";}; ?>>Agustus</option>
														<option value="09" <?php if($bulan==="09"){echo "selected";}; ?>>September</option>
														<option value="10" <?php if($bulan==="10"){echo "selected";}; ?>>Oktober</option>
														<option value="11" <?php if($bulan==="11"){echo "selected";}; ?>>November</option>
														<option value="12" <?php if($bulan==="12"){echo "selected";}; ?>>Desember</option>
														<option value="01" <?php if($bulan==="01"){echo "selected";}; ?>>Januari</option>
														<option value="02" <?php if($bulan==="02"){echo "selected";}; ?>>Februari</option>
														<option value="03" <?php if($bulan==="03"){echo "selected";}; ?>>Maret</option>
														<option value="04" <?php if($bulan==="04"){echo "selected";}; ?>>April</option>
														<option value="05" <?php if($bulan==="05"){echo "selected";}; ?>>Mei</option>
														<option value="06" <?php if($bulan==="06"){echo "selected";}; ?>>Juni</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-group-default">
													<label>Bulan</label>
													<select class="form-control" name="tahunku" id="tahunku">
														<option value="2018" <?php if($tahun==="2018"){echo "selected";}; ?>>2018</option>
														<option value="2019" <?php if($tahun==="2019"){echo "selected";}; ?>>2019</option>
														<option value="2020" <?php if($tahun==="2020"){echo "selected";}; ?>>2020</option>
														<option value="2021" <?php if($tahun==="2021"){echo "selected";}; ?>>2021</option>
														<option value="2022" <?php if($tahun==="2022"){echo "selected";}; ?>>2022</option>
														<option value="2023" <?php if($tahun==="2023"){echo "selected";}; ?>>2023</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Cetak
											</button>
										</div>
									</form>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Hari Efektif</div>
										<div class="card-tools">
											<button type="submit" data-toggle="modal" data-target="#tambahHari" id="addHariModalBtn" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Tambah
											</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="hariTable" class="display table table-hover" >
											<thead>
											   <tr>
													<th>Bulan</th>
													<th>Hari Efektif</th>
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
					<?php }else{ ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									Hanya bisa diakses oleh Guru Kelas atau Guru Pendamping.
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<!--Modal Tambah Absen-->
		<div class="modal fade" id="tambahAbsen">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Absensi Siswa Kelas <?php echo $kelas;?></h4>
              </div>
              <form class="form" action="modul/siswa/tambahabsen.php" method="POST" id="createAbsenForm">
                        <div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Tanggal</label>
										<input type="hidden" id="kelas" name="kelas" class="form-control" value="<?php echo $kelas;?>">
										<input type="hidden" id="tanggals" name="tanggals" class="form-control" value="<?=$tahun;?>-<?=$bulan;?>-<?=$tanggal;?>">
										<input type="text" class="form-control" name="username" placeholder="Name" value="<?=$tanggal;?> <?=$BulanIndo[(int)$bulan-1];?> <?=$tahun;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Nama Siswa</label>
										<select class="form-control" name="pdid" id="pdid">
											<option value="">==Pilih Siswa==</option>
											<?php 
											$sql2 = "select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc";
											$qu3 = mysqli_query($koneksi,$sql2) or die("database error:". mysqli_error($koneksi));
											while($po=mysqli_fetch_array($qu3)){;
												$idps=$po['peserta_didik_id'];
												$sql21 = "SELECT * FROM siswa WHERE peserta_didik_id='$idps'";
												$qu31 = mysqli_query($koneksi,$sql21) or die("database error:". mysqli_error($koneksi));
												$pj=mysqli_fetch_array($qu31);
											?>
											<option value="<?=$po['peserta_didik_id'];?>"><?=$pj['nama'];?></option>
											<?php };?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Absensi</label>
										<select class="form-control" name="jnabsen" id="jnabsen">
											<option value="">==Pilih Absensi==</option>
											<option value="S">Sakit</option>
											<option value="I">Ijin</option>
											<option value="A">Alpa</option>
										</select>
									</div>
								</div>
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
		
		<!--Modal tambah hari-->
		<div class="modal fade" id="tambahHari">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hari Efektif</h4>
              </div>
              <form class="form" action="modul/siswa/tambahhari.php" method="POST" id="createHariForm">
                        <div class="modal-body">
							<div class="form-group">
							  <label for="output-device">Bulan</label>
							  <select class="form-control" name="blne">
									<option value="">==Pilih Bulan==</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
							  </select>
							</div>
							<div class="form-group">
							  <label for="output-device">Tahun Pelajaran</label>
							  <select class="form-control" name="thne">
									<option value="">==Pilih Tahun Pelajaran==</option>
									<option value="2016/2017">2016/2017</option>
									<option value="2017/2018">2017/2018</option>
									<option value="2018/2019">2018/2019</option>
									<option value="2019/2020">2019/2020</option>
									<option value="2020/2021">2020/2021</option>
									<option value="2021/2022">2021/2022</option>
									<option value="2022/2023">2022/2023</option>
							  </select>
							</div>
							<div class="form-group">
							  <span class="form-label">Jumlah Hari Efektif</span>
							  <input type="text" id="harie" name="harie" autocomplete=off class="form-control">
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
		
		<!--Modal Hapus absen-->
		<div class="modal fade" id="removeAbsenModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus</h4>
              </div>
                        <div class="modal-body">
							<p>Hapus Absensi Siswa ini?</p>
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
	
	var absenTable;
	var hariTable;
	$(document).ready(function() {
		absenTable = $('#absenTable').DataTable( {
			"searching": false,
			"ajax": "modul/siswa/absensiku.php?kelas=<?=$kelas;?>&tgl=<?=$tgl;?>&tapel=<?=$tapel;?>",
			"order": []
		} );
		hariTable = $('#hariTable').DataTable( {
			"searching": false,
			"ajax": "modul/siswa/efektif.php?tapel=<?=$tapel;?>",
			"order": []
		} );
		$('#datepicker').datepicker({
		  autoclose: true
		})
		$("#addAbsenModalBtn").on('click', function() {
			// reset the form 
			$("#createAbsenForm")[0].reset();
			
			// submit form
			$("#createAbsenForm").unbind('submit').bind('submit', function() {

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
											align: "left"
										},
											time: 10,
										});

								// reset the form
								$("#tambahAbsen").modal('hide');

								// reload the datatables
								absenTable.ajax.reload(null, false);
								$("#createAbsenForm")[0].reset();
								// this function is built in function of datatables;

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
							}  // /else
						} // success  
					}); // ajax subit 				
				


				return false;
			}); // /submit form for create member
		}); // /add modal
		
		$("#addHariModalBtn").on('click', function() {
			// reset the form 
			$("#createHariForm")[0].reset();
			
			// submit form
			$("#createHariForm").unbind('submit').bind('submit', function() {

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
											align: "left"
										},
											time: 10,
										});

								// reset the form
								$("#tambahHari").modal('hide');

								// reload the datatables
								hariTable.ajax.reload(null, false);
								$("#createHariForm")[0].reset();
								// this function is built in function of datatables;

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
							}  // /else
						} // success  
					}); // ajax subit 				
				


				return false;
			}); // /submit form for create member
		}); // /add modal

	});

	function removeAbsen(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/siswa/hapusabsen.php',
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
							absenTable.ajax.reload(null, false);

							// close the modal
							$("#removeAbsenModal").modal('hide');

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
	function removeHari(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/siswa/hapushari.php',
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
							hariTable.ajax.reload(null, false);

							// close the modal
							$("#removeHariModal").modal('hide');

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