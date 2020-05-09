<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
$jns=isset($_GET['jns']) ? $_GET['jns'] : '0';
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
						<h4 class="page-title">Cetak Laporan Pencapaian Target Kurikulum, Ketuntasan Belajar Dan Daya Serap Kurikulum Sekolah Dasar (F1)</h4>
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
							<label>Laporan</label>
							<select class="form-control" id="mp" name="mp">
								
							</select>
							</div>
						</div>
					</div> <!--Akhir Row-->
					<div class="card">
						
						<div class="card-body">
							<div id="box">
										<a href="#" id="cetakT" title="Contacts" class="btn btn-info btn-border btn-round btn-sm">
											<span class="btn-label">
												<i class="fa fa-print"></i>
											</span>
										Cetak
										</a>
									</div>
							<div class="table-responsive">
								<table id="Raportku" class="table table-bordered">
									<thead>
										<tr>
											<th rowspan="3" class="text-center">Mata Pelajaran</th>
											<th rowspan="3" class="text-center">Target Kurikulum (%)</th>
											<th colspan="3" class="text-center">Nilai</th>
											<th colspan="5" class="text-center">Ketuntasan</th>
											<th rowspan="3" class="text-center">Tarap Serap Kurikulum</th>
											<th rowspan="3" class="text-center">Keterangan</th>
										</tr>
										<tr>
											<th colspan="3" class="text-center">PTS/PAS</th>
											<th rowspan="2" class="text-center">KKM</th>
											<th rowspan="2" class="text-center">Jumlah Siswa</th>
											<th colspan="2" class="text-center">Nilai</th>
											<th rowspan="2" class="text-center">%</th>
										</tr>
										<tr>
											<th class="text-center">NTT</th>
											<th class="text-center">NTR</th>
											<th class="text-center">RT2</th>
											<th class="text-center">KKM (+)</th>
											<th class="text-center">KKM (-)</th>
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
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script type="text/javascript" language="javascript" class="init">
	var Raportku;
	$(document).ready(function() {
		$('#box').hide();
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			$.ajax({
				type : 'GET',
				url : 'laporan.php',
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
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			if(mp=="0"){
				$("#box").hide();
			}else{
				$("#box").show();
			}
			Raportku = $('#Raportku').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/rekap/f1.php?tapel="+tapel+"&smt="+smt+"&kelas="+kelas+"&jns="+mp,
				"order": []
			} );
		});
		$( "#cetakT" ).click(function() {
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var tapel=$('#tapel').val();
			var smt=$('#smt').val();
			window.open('../cetak/form-f1.php?tipe='+mp+'&kelas='+kelas+'&tapel='+tapel+'&smt='+smt,' _blank');
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