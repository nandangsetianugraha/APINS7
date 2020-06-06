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
						<h4 class="page-title">ID Pegawai</h4>
					</div>
					<div class="card">
						
						<div class="card-body">
							<div class="table-responsive">
								<table id="manageMemberTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th></th>
												<th class="text-center">Nama Guru</th>
												<th class="text-center">ID Absensi</th>
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
		
		<!--Modal ID Guru-->
		<div class="modal fade" id="tambahNilai">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">ID Pegawai</h4>
              </div>
                        <form class="form-horizontal" action="modul/ptk/simpanID.php" autocomplete="off" method="POST" id="IDGuruForm">
							<div class="fetched-data"></div>
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Modal Hapus-->
		<div class="modal fade" id="hapusData">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus ID</h4>
              </div>
              <div class="modal-body">
				<p>Hapus ID Pegawai?<br/>Jika ID Pegawai Dihapus, Otomatis semua data Absensi akan dihapus juga.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light" id="outBtn">Ya</button>
              </div>
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
			"ajax": "modul/ptk/IDPegawai.php",
			"order": []
		});
		$('#tambahNilai').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('pdid');
			$.ajax({
                type : 'get',
                url : 'modul/ptk/modal_IDPegawai.php',
                data :  'idpd='+rowid,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		 $("#IDGuruForm").unbind('submit').bind('submit', function() {
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
						$("#tambahNilai").modal('hide');
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
	function outMember(id = null) {
		if(id) {
			// click on remove button
			$("#outBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/ptk/hapusID.php',
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
							manageMemberTable.ajax.reload(null, false);

							// close the modal
							$("#hapusData").modal('hide');

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
					}
				});
			}); // click remove btn
		} else {
			alert('Error: Refresh the page again');
		};
		
		
	};
</script>
</body>
</html>