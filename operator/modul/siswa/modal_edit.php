<?php
include("../../../assets/db.php");
$idr=$_POST['rowid'];
$cek="SELECT * FROM siswa WHERE id='$idr'";
$hasil=mysqli_query($koneksi,$cek);
$bio=mysqli_fetch_array($hasil);
$ids=$bio['peserta_didik_id'];
?>
						<div class="modal-body">									<ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">										<li class="nav-item">											<a class="nav-link active" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">												<i class="flaticon-user-4"></i>												Biodata											</a>										</li>										<li class="nav-item">											<a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#pills-contact-icon" role="tab" aria-controls="pills-contact-icon" aria-selected="false">												<i class="flaticon-mailbox"></i>												Data Orang Tua											</a>										</li>									</ul>									<div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">										<div class="tab-pane fade show active" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>NIS</label>														<input type="hidden" name="id" class="form-control" value="<?=$idr;?>">														<input type="hidden" name="ids" class="form-control" value="<?=$ids;?>">														<input id="nis" type="text" name="nis" autocomplete=off class="form-control" value="<?=$bio['nis'];?>">													</div>												</div>												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>NISN</label>														<input id="nisn" type="text" name="nisn" autocomplete=off class="form-control" value="<?=$bio['nisn'];?>">													</div>												</div>											</div>											<div class="form-group form-group-default">												<label>Nama Lengkap</label>												<input id="nama" type="text" name="nama" autocomplete=off class="form-control" value="<?=$bio['nama'];?>">											</div>											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Jenis Kelamin</label>														<select class="form-control" name="jk" id="jk">															<option value="L" <?php if($bio['jk']=='L') echo "selected"; ?>>Laki-laki</option>															<option value="P" <?php if($bio['jk']=='P') echo "selected"; ?>>Perempuan</option>														</select>													</div>												</div>												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Tempat Lahir</label>														<input id="tempat" type="text" name="tempat" autocomplete=off class="form-control" value="<?=$bio['tempat'];?>">													</div>												</div>											</div>											<div class="form-group">												<label>Tanggal Lahir</label>												<div class="input-group">													<input type="text" class="form-control" id="tanggal" name="tanggal" value="<?=$bio['tanggal'];?>">													<div class="input-group-append">														<span class="input-group-text">															<i class="fa fa-calendar-check"></i>														</span>													</div>												</div>											</div>											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>NIK</label>														<input id="nik" type="text" name="nik" autocomplete=off class="form-control" value="<?=$bio['nik'];?>">													</div>												</div>												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Agama</label>														<select class="form-control" name="agama" id="agama">															<option value="0" <?php if($bio['agama']==0) echo "selected"; ?>>Belum Diisi</option>															<?php 															$sql_mk=mysqli_query($koneksi, "select * from agama");															while($nk=mysqli_fetch_array($sql_mk)){															?>															<option value="<?=$nk['id_agama'];?>" <?php if($bio['agama']==$nk['id_agama']) echo "selected"; ?>><?=$nk['nama_agama'];?></option>															<?php };?>														</select>													</div>												</div>											</div>											<div class="form-group form-group-default">												<label>Pendidikan Sebelumnya</label>												<input id="pend_seb" type="text" name="pend_seb" autocomplete=off class="form-control" value="<?=$bio['pend_sebelum'];?>">											</div>											<div class="form-group form-group-default">												<label>Alamat Siswa</label>												<input id="alamat" type="text" name="alamat" autocomplete=off class="form-control" value="<?=$bio['alamat'];?>">											</div>										</div>										<div class="tab-pane fade" id="pills-contact-icon" role="tabpanel" aria-labelledby="pills-contact-tab-icon">											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Nama Ayah</label>														<input id="ayah" type="text" name="ayah" autocomplete=off class="form-control" value="<?=$bio['nama_ayah'];?>">													</div>												</div>												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Nama Ibu</label>														<input id="ibu" type="text" name="ibu" autocomplete=off class="form-control" value="<?=$bio['nama_ibu'];?>">													</div>												</div>											</div>											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Pekerjaan Ayah</label>														<select class="form-control" name="pek_ayah" id="pek_ayah">															<option value="0" <?php if($bio['pek_ayah']==0 || empty($bio['pek_ayah'])) echo "selected"; ?>>Belum Diisi</option>															<?php 															$sql_mk=mysqli_query($koneksi, "select * from pekerjaan");															while($nk=mysqli_fetch_array($sql_mk)){															?>															<option value="<?=$nk['id_pekerjaan'];?>" <?php if($bio['pek_ayah']==$nk['id_pekerjaan']) echo "selected"; ?>><?=$nk['nama_pekerjaan'];?></option>															<?php };?>														</select>													</div>												</div>												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Pekerjaan Ibu</label>														<select class="form-control" name="pek_ibu" id="pek_ibu">															<option value="0" <?php if($bio['pek_ibu']==0 || empty($bio['pek_ibu'])) echo "selected"; ?>>Belum Diisi</option>															<?php 															$sql_mk=mysqli_query($koneksi, "select * from pekerjaan");															while($nk=mysqli_fetch_array($sql_mk)){															?>															<option value="<?=$nk['id_pekerjaan'];?>" <?php if($bio['pek_ibu']==$nk['id_pekerjaan']) echo "selected"; ?>><?=$nk['nama_pekerjaan'];?></option>															<?php };?>														</select>													</div>												</div>											</div>											<div class="form-group">												<label>Alamat Orang Tua</label>											</div>											<?php											$id_prov=$bio['provinsi'];											?>											<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Provinsi</label>														<select class="form-control" name="provinsi" id="provinsi">															<option>Pilih Provinsi</option>															<?php 																	$sql_mk=mysqli_query($koneksi, "select * from provinsi");																	while($nk=mysqli_fetch_array($sql_mk)){																	?>																	<option value="<?=$nk['id_prov'];?>" <?php if($id_prov==$nk['id_prov']){echo "selected";}; ?>><?=$nk['nama'];?></option>																	<?php }	?>														</select>													</div>												</div>																							<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Kabupaten</label>														<select class="form-control" name="kabupaten" id="kabupaten">															<?php 															$id_kab=$bio['kabupaten'];																	$sql_mk=mysqli_query($koneksi, "select * from kabupaten where id_provinsi='$id_prov'");																	while($nk=mysqli_fetch_array($sql_mk)){																	?>																	<option value="<?=$nk['id'];?>" <?php if($id_kab==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>																	<?php }	?>														</select>													</div>												</div>											</div>																						<div class="row">												<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Kecamatan</label>														<select class="form-control" name="kecamatan" id="kecamatan">															<?php 															$id_kec=$bio['kecamatan'];																	$sql_mk=mysqli_query($koneksi, "select * from kecamatan where id_kabupaten='$id_kab'");																	while($nk=mysqli_fetch_array($sql_mk)){																	?>																	<option value="<?=$nk['id'];?>" <?php if($id_kec==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>																	<?php }	?>														</select>													</div>												</div>																							<div class="col-md-6 col-lg-6">													<div class="form-group form-group-default">														<label>Desa/Kelurahan</label>														<select class="form-control" name="kelurahan" id="kelurahan">															<?php 															$id_desa=$bio['kelurahan'];																	$sql_mk=mysqli_query($koneksi, "select * from desa where id_kecamatan='$id_kec'");																	while($nk=mysqli_fetch_array($sql_mk)){																	?>																	<option value="<?=$nk['id'];?>" <?php if($id_desa==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>																	<?php }	?>														</select>													</div>												</div>											</div>											<div class="form-group form-group-default">												<label>Jalan</label>												<input id="jalan" type="text" name="jalan" autocomplete=off class="form-control" value="<?=$bio['jalan'];?>">											</div>																					</div>									</div>
							
						</div>

<script type="text/javascript">		

	$(document).ready(function(){		$('#provinsi').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();
			
			$.ajax({
				type : 'GET',
				url : 'kabupaten.php',
				data :  'prov_id=' + prov,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
			});
		});

		$('#kabupaten').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var kab = $('#kabupaten').val();
			
			$.ajax({
				type : 'GET',
				url : 'kecamatan.php',
				data :  'id_kabupaten=' + kab,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kecamatan").html(data);
				}
			});
		});

		$('#kecamatan').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var desa = $('#kecamatan').val();
			
			$.ajax({
				type : 'GET',
				url : 'desa.php',
				data :  'id_kecamatan=' + desa,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kelurahan").html(data);
					// alert($('#provinsi option:selected').text() + $('#kabupaten option:selected').text() + $('#kecamatan option:selected').text() + $('#desa option:selected').text());
				}
			});
		});
	});
	</script>
