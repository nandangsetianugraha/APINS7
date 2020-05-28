<?php include "partial/head.php"; 
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
$romb = isset($_GET['kelas']) ? $_GET['kelas'] : '1A';
$ab=substr($romb, 0, 1);
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
						<h4 class="page-title">Daftar Siswa</h4>
					</div>
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line">
								<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link" href="kelas.php" role="tab" aria-controls="pills-home" aria-selected="true">Aktif</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lulus</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="mutasi.php" role="tab" aria-controls="pills-contact" aria-selected="false">Mutasi</a>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="card-body">
							<div class="tab-content mt-2 mb-3" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
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
	<script>
	
	var SiswaLulus;
	$(document).ready(function() {
		SiswaLulus = $("#SiswaLulus").DataTable({
			"destroy":true,
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/lulus.php",
			"order": []
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
	});

</script>
</body>
</html>