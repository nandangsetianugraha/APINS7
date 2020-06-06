<?php include "partial/head.php"; ?>
</head>
<body>
<?php
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
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
						<h4 class="page-title">Data Kegiatan Ekstrakurikuler Semester <?=$smt;?></h4>
					</div>
					<?php if($level==98 or $level==97){ ?>
					
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="manageMemberTable" class="display table">
											<thead>
                                            <tr>
												<th class="text-center" width="45%">Nama Siswa</th>
												<th class="text-center">Data Ekstrakurikuler</th>
											</tr>
                                        </thead>
											<tbody>	
																			
											</tbody>
										</table>
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
		
		<!--Modal tambah KD Ket-->
		<div class="modal fade" id="mod-ekskul">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Kegiatan Ekstrakurikuler</h4>
              </div>
                        <form class="form-horizontal" action="modul/ekskul/simpan.php" autocomplete="off" method="POST" id="ekskulForm">
						<div class="fetched-data"></div>
                        
						</form>
						
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		<!--Delete Nilai-->
		<div class="modal fade" id="removeEkskulModal">
          <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-body">
							<p>Hapus Kegiatan Ekstrakurikuler?</p>
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
	var manageMemberTable;
	$(document).ready(function() {
		manageMemberTable = $("#manageMemberTable").DataTable({
				"destroy":true,
				"searching": false,
				"paging":false,
				"ajax": "modul/ekskul/ekskul.php?kelas=<?=$kelas;?>&smt=<?=$smt_aktif;?>&tapel=<?=$tpl_aktif;?>",
				"order": []
			} );
		$('#mod-ekskul').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('pdid');
			var rowsmt = $(e.relatedTarget).data('smt');
			var rowtapel = $(e.relatedTarget).data('tapel');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/ekskul/tambah.php',
                data :  'rowid='+ rowid +'&smt='+rowsmt+'&tapel='+rowtapel,
				beforeSend: function()
						{	
							$(".fetched-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
							$(".smpn").hide();
						},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
				$(".smpn").show();
                }
            });
         });
		$("#ekskulForm").unbind('submit').bind('submit', function() {

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
								$("#mod-ekskul").modal('hide');

								// reload the datatables
								manageMemberTable.ajax.reload(null, false);
								
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
			// submit form
	});
	function removeEkskul(id = null) {
		if(id) {
			// click on remove button
			$("#removeBtn").unbind('click').bind('click', function() {
				$.ajax({
					url: 'modul/ekskul/hapus.php',
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
							manageMemberTable.ajax.reload(null, false);

							// close the modal
							$("#removeEkskulModal").modal('hide');

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