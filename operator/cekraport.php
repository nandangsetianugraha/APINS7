<?php include "partial/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css"/>
</head>
<body>
<?php
	$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
	$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
	$kelas=isset($_GET['kelas']) ? $_GET['kelas'] : '6A';	
	$mpid=isset($_GET['mp']) ? $_GET['mp'] : '1';
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
						<h4 class="page-title">Cek Raport Kelas 6 Semester 7 s/d 12</h4>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group form-group-default">
								<label>Kelas</label>
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<select class="form-control" id="kelas" name="kelas">
									<option value="0">Pilih Rombel</option>
									<?php 
									$sql_mk=mysqli_query($koneksi, "select * from rombel where tapel='$tapel' and nama_rombel like '%6%' order by nama_rombel asc");
									while($nk=mysqli_fetch_array($sql_mk)){
									?>
									<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group form-group-default">
							<label>Mata Pelajaran</label>
							<select class="form-control" id="mp" name="mp">
							</select>
							
							</div>
						</div>
					</div> <!--Akhir Row-->
					
							<div id="diagram" class="table-responsive">
							<table id="Raportku" class="table table-bordered table-hover table-responsive no-padding">
								<thead>
								   <tr>
										<th width="35%">Nama Siswa</th>
										<th>Semester 7</th>
										<th>Semester 8</th>
										<th>Semester 9</th>
										<th>Semester 10</th>
										<th>Semester 11</th>
										<th>Semester 12</th>
										<th>Rerata</th>
									</tr>
								</thead>
							<tbody>
							</tbody>
						</table>
							</div>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<?php include "partial/foot.php"; ?>
	<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	var Raportku;
	$(document).ready(function() {
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			
			$.ajax({
				type : 'GET',
				url : 'mapels.php',
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
			
			Raportku = $('#Raportku').DataTable( {
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/rekap/dataRaport.php?kelas="+kelas+"&tapel="+tapel+"&mp="+mp,
				"order": [],
				dom: 'lBfrtip',
				buttons: [
				'excel', 'csv', 'pdf', 'copy'
				],
				"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
			} );
		});
		
	});
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function saveUA(editableObj,column,id,kelas,smt,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/rekap/saveRaport.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
				nK3.ajax.reload(null, false);	
				$.amaran({
					'theme'     :'awesome ok',
					'content'   :{
						title:'Sukses!',
						message:'Nilai Raport berhasil dimasukkan!',
						info:'',
						icon:'fa fa-check-square-o'
					},
					'position'  :'bottom right',
					'outEffect' :'slideBottom'
				});
			}          
	   });
	}
</script>
</body>
</html>