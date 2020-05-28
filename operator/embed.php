<?php include "partial/head.php"; 
$tapel=isset($_GET['tapel']) ? $_GET['tapel'] : $tpl_aktif;
$smt=isset($_GET['smt']) ? $_GET['smt'] : $smt_aktif;
?>
</head>
<style>
        object, embed{
            display:block;
            width:90%;
            margin:1em auto;
            height: 600px;
        } 
</style>
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
						<h4 class="page-title">Konfigurasi Web</h4>
					</div>
					<object data="contoh.pdf" type="application/pdf">
						<embed src="contoh.pdf" type='application/pdf'>
					</object>
					
				</div>
			</div>
			<?php include "partial/footer.php"; ?>
		</div>
		<!--Modal Penempatan-->
		<div class="modal fade" id="penempatan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Daftar Siswa</h4>
              </div>
              <div class="modal-body">
				
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
	
</body>
</html>