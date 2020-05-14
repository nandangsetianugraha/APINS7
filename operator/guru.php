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
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#" data-toggle="modal" data-toggle="modal" data-target="#gurubaru" class="btn btn-info btn-border btn-round btn-sm">
									<span class="btn-label">
										<i class="fas fa-address-card"></i>
									</span>
									Guru Baru
								</a>
							</li>
						</ul>
					</div>
					
					<div class="card">
						
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
		
		<!--Modal Mutasi Guru-->
		<div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Mutasi Guru</h4>
              </div>
                        <form class="form-horizontal" action="modul/ptk/mutasiGuru.php" autocomplete="off" method="POST" id="mutasiGuruForm">
							<div class="fetched-data"></div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Guru Baru-->
		<div class="modal fade" id="gurubaru">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah PTK</h4>
              </div>
				<form class="form-horizontal" action="modul/ptk/tambahGuru.php" autocomplete="off" method="POST" id="tambahGuruForm">
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
	
	var manageMemberTable;
	$(document).ready(function() {
		manageMemberTable = $("#manageMemberTable").DataTable({
			"destroy":true,
			"ajax": "modul/ptk/daftarguru.php?tapel=<?=$tpl_aktif;?>",
			"order": []
		});
		$('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/ptk/modal_mutasi.php',
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
		 $('#gurubaru').on('show.bs.modal', function (e) {
            //var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/ptk/modal_tambah.php',
                data :  'rowid=12',
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		$("#mutasiGuruForm").unbind('submit').bind('submit', function() {
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
		
		$("#tambahGuruForm").unbind('submit').bind('submit', function() {
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
						$("#gurubaru").modal('hide');
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