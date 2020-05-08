<?php include "partial/head.php"; ?>
</head>
<body>
<?php 
if($level==96){ //guru pai
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 1;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
};
if($level==95){ //guru penjas
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 8;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
};
if($level==94){ //guru bahasa inggris
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 10;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
	$ab=substr($romb, 0, 1);
};
if($level==97){ //guru pendamping
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 2;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;
	$ab=substr($romb, 0, 1);
};
if($level==98){ //guru kelas
	$mpid = isset($_GET['mp']) ? $_GET['mp'] : 2;
	$romb = isset($_GET['kelas']) ? $_GET['kelas'] : $kelas;
	$ab=substr($romb, 0, 1);
};
	
	if($smt==1){
		$tema=isset($_GET['tema']) ? $_GET['tema'] : '1';
	}else{
			if($ab>3){
			$tema=isset($_GET['tema']) ? $_GET['tema'] : '6';
		}else{
			$tema=isset($_GET['tema']) ? $_GET['tema'] : '5';
		};
	};
	$peta=3;
	$kd = isset($_GET['kd']) ? $_GET['kd'] : '0';										
	$sql_asp=mysqli_query($koneksi, "select * from aspek where kd_aspek='$peta'");
	$nama_asp=mysqli_fetch_array($sql_asp);
	$sqltema=mysqli_query($koneksi, "select * from tema where kelas='$ab' and smt='$smt'");
	$jtema=mysqli_num_rows($sqltema);
	$sqlkd=mysqli_query($koneksi, "select * from kd where kelas='$ab' and aspek='$peta' and mapel='$mpid'");
	$sql_mp=mysqli_query($koneksi, "select * from mapel where id_mapel='$mpid'");
	$nama_mp=mysqli_fetch_array($sql_mp);
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
						<h4 class="page-title">Penilaian Tengah Semester (PTS)</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<?php if($level==94 or $level==95 or $level==96){?>
								<select class="form-control" id="kelas" name="kelas">
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tapel' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?=$nk['nama_rombel'];?>" <?php if($nk['nama_rombel']==$romb){echo "selected";}; ?>><?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
								<?php }else{ ?>
								<select class="form-control" id="kelas" name="kelas">
									<option value="<?=$romb;?>"><?=$romb;?></option>
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
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Kompetensi Dasar</label>
							<select class="form-control" id="kd" name="kd">
							
							</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<div id="nilaiPTS">
									<div class="alert alert-info alert-dismissible">
										<h4><i class="icon fa fa-info"></i> Informasi</h4>
										Silahkan Pilih Mata Pelajaran
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		<?php if($level==98 or $level==97){ ?>
		$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=<?=$smt;?>;
			var peta=<?=$peta;?>;
			
			$.ajax({
				type : 'GET',
				url : 'kdsemester.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#kd").html(data);
					$("#nilaiPTS").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih KD</div>');
				}
			});
		});
		$('#kd').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kd = $('#kd').val();
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=<?=$smt;?>;
			var peta=<?=$peta;?>;
			var tapel=$('#tapel').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/semester/NilaiSemester.php',
				data :  'mp=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta+'&tapel='+tapel+'&kd='+kd,
				beforeSend: function()
				{	
					$("#nilaiPTS").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai PTS....</h4></div>');
				},
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kd
					$("#nilaiPTS").html(data);
				}
			});
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
					$("#kd").html('');
					$("#nilaiPTS").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Mata Pelajaran</div>');
				}
			});
		});
		$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=<?=$smt;?>;
			var peta=<?=$peta;?>;
			
			$.ajax({
				type : 'GET',
				url : 'kdsemester.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#kd").html(data);
					$("#nilaiPTS").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih KD</div>');
				}
			});
		});
		$('#kd').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kd = $('#kd').val();
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=<?=$smt;?>;
			var peta=<?=$peta;?>;
			var tapel=$('#tapel').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/semester/NilaiSemester.php',
				data :  'mp=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta+'&tapel='+tapel+'&kd='+kd,
				beforeSend: function()
				{	
					$("#nilaiPTS").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai PTS....</h4></div>');
				},
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kd
					$("#nilaiPTS").html(data);
				}
			});
		});
		<?php }; ?>
	});
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function saveUT(editableObj,column,id,kelas,smt,tapel,mpid,kd) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/semester/saveNPTS.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid+'&kd='+kd,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$.notify({
					icon: 'flaticon-alarm-1',
					title: 'Sukses',
					message: 'Nilai tersimpan...',
				},{
					type: 'info',
					placement: {
					from: "bottom",
					align: "left"
				},
					time: 10,
				});
			}          
	   });
	}
</script>
</body>
</html>