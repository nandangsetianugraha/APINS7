<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
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
						<h4 class="page-title">Hafalan Juzamma, Hadist, dan Doa</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
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
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Penilaian</label>
							<select class="form-control" id="mp" name="mp">
								
							</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Surah/Hadits/Doa</label>
							<select class="form-control" id="surah" name="surah">
							
							</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group form-group-default">
								<label>Keterangan Nilai</label>
								<p><span class='badge badge-success'>A</span> : Sangat Lancar   <span class='badge badge-info'>B</span> : Lancar    <span class='badge badge-warning'>C</span> : Cukup Lancar    <span class='badge badge-danger'>D</span> : Kurang Lancar     <span class='badge badge-danger'>E</span> : Tidak Hafal</p>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="card">
						<div class="card-body">
							<div id="nilaiHarian">
								<div class="alert alert-info alert-dismissible">
									<h4><i class="icon fa fa-info"></i> Informasi</h4>
									Silahkan Pilih Penilaian
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
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			
			$.ajax({
				type : 'GET',
				url : 'juz.php',
				data :  'kelas=' +kelas,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#mp").html(data);
					$("#surah").html('');
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Penilaian</div>');
				}
			});
		});
		$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=$('#smt').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/harian/surah.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#surah").html(data);
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih</div>');
				}
			});
		});
		$('#surah').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			var surah=$('#surah').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/harian/NilaiTahfidz.php',
				data :  'mp=' + mp+'&kelas='+kelas+'&smt='+smt+'&surah='+surah+'&tapel='+tapel,
				beforeSend: function()
				{	
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai Tahfidz....</h4></div>');
				},
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kd
					$("#nilaiHarian").html(data);
				}
			});
		});
	});
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function saveJuzamma(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/harian/saveJuzamma.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				if(response=='gagal')
					alert("Nilainya Harus A, B, C, D, atau E!!");
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$(editableObj).focus;
				
			}          
	   });
	}
	function saveArbain(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/harian/saveArbain.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				if(response=='gagal')
					alert("Nilainya Harus A, B, C, D, atau E!!");
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$(editableObj).focus;
				
			}          
	   });
	}
	function saveSurah(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/harian/saveSurah.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				if(response=='gagal')
					alert("Nilainya Harus A, B, C, D, atau E!!");
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$(editableObj).focus;
				
			}          
	   });
	}
	function saveDoa(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/harian/saveDoa.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				if(response=='gagal')
					alert("Nilainya Harus A, B, C, D, atau E!!");
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$(editableObj).focus;
				
			}          
	   });
	}
	function saveHadits(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/harian/saveHadits.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				if(response=='gagal')
					alert("Nilainya Harus A, B, C, D, atau E!!");
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				$(editableObj).focus;
				
			}          
	   });
	}
</script>
</body>
</html>