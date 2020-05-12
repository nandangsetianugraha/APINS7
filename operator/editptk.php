<?php include "partial/head.php"; 
$idp=isset($_GET['idp']) ? $_GET['idp'] : '0';
if($idp=="0"){}
else{
$dataguru = mysqli_fetch_array(mysqli_query($koneksi, "select * from ptk where ptk_id='$idp'"));
$status1=$dataguru['status_kepegawaian_id'];
$status2=$dataguru['jenis_ptk_id'];
$jns_ptk1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from jenis_ptk where jenis_ptk_id='$status2'"));
$status_ptk1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from status_kepegawaian where status_kepegawaian_id='$status1'"));
if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/apins7/images/ptk/".$dataguru['gambar'])){
	$poto="../images/ptk/".$dataguru['gambar'];
}else{
	$poto="../images/user-default.png";
};
};
?>
<link rel="stylesheet" href="croppie.css" />
<style>
#imgChange {
	background: url("overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
	bottom: 0;
	color: #FFFFFF;
	display: block;
	height: 30px;
	left: 0;
	line-height: 32px;
	position: absolute;
	text-align: center;
	width: 100%;
}
#imgChange input[type="file"] {
	bottom: 0;
	cursor: pointer;
	height: 100%;
	left: 0;
	margin: 0;
	opacity: 0;
	padding: 0;
	position: absolute;
	width: 100%;
	z-index: 0;
}
</style>
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
					<h4 class="page-title">
						<a href="guru.php" class="btn btn-icon btn-link">
							<i class="fas fa-angle-double-left"></i>
						</a>
						Biodata <?php if($idp=="0"){}else{echo $dataguru['nama'];}?>
					</h4>
							<?php if($idp=="0"){ ?>
							<?php }else{ 
							?>
							<div class="row">
								<div class="col-md-8">
									<div class="card card-with-nav">
										<div class="card-header">
											<div class="row row-nav-line">
												<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SK Pengangkatan</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ubah Password</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content mt-2 mb-3" id="pills-tabContent">
												<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
													<div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Nama lengkap</label>
																<input type="text" class="form-control" name="name" placeholder="Name" value="<?=$dataguru['nama'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Gelar</label>
																<input type="email" class="form-control" name="email" placeholder="Name" value="<?=$dataguru['gelar'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Email</label>
																<input type="email" class="form-control" name="email" placeholder="Name" value="<?=$dataguru['email'];?>">
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Tempat Lahir</label>
																<input type="text" class="form-control" value="<?=$dataguru['tempat_lahir'];?>" name="phone" placeholder="Phone">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Tanggal Lahir</label>
																<input type="text" class="form-control" id="datepicker" name="datepicker" value="<?=$dataguru['tanggal_lahir'];?>" placeholder="Birth Date">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Jenis Kelamin</label>
																<select class="form-control" id="gender">
																	<option <?php if($dataguru['jenis_kelamin']=="L"){echo "selected";};?>>Laki-laki</option>
																	<option <?php if($dataguru['jenis_kelamin']=="P"){echo "selected";};?>>Perempuan</option>
																</select>
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NIK</label>
																<input type="email" class="form-control" name="email" placeholder="Name" value="<?=$dataguru['nik'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NIY/NIGK</label>
																<input type="text" class="form-control" name="name" placeholder="Name" value="<?=$dataguru['niy_nigk'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NUPTK</label>
																<input type="email" class="form-control" name="email" placeholder="Name" value="<?=$dataguru['nuptk'];?>">
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Alamat</label>
																<input type="text" class="form-control" value="<?=$dataguru['alamat_jalan'];?>" name="address" placeholder="Address">
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Status Kepegawaian</label>
																<input type="text" class="form-control" value="<?=$status_ptk1['nama'];?>" name="address" placeholder="Address">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Jenis PTK</label>
																<input type="text" class="form-control" value="<?=$jns_ptk1['jenis_ptk'];?>" name="address" placeholder="Address">
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
													<div id="hasil"></div>
												</div>
												<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
													<?php 
													$suser=mysqli_query($koneksi, "select * from pengguna where ptk_id='$idp'");
													$uptk=mysqli_fetch_array($suser);
													?>
													<form autocomplete="off" action="modul/ptk/simpanData.php" method="POST" id="ubahForm">
														<div class="row mt-3">
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Username</label>
																	<input type="hidden" name="ptkid" class="form-control" value="<?=$idp;?>">
																	<input type="text" class="form-control" name="username" placeholder="Name" value="<?=$uptk['username'];?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input type="password" class="form-control" name="password" placeholder="Name" value="<?=$uptk['password'];?>">
																</div>
															</div>
														</div>
														<button type="submit" class="btn btn-danger">Simpan</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card card-profile">
										<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
											<div class="profile-picture">
												<div class="avatar avatar-xl">
													<div id="uploaded_image">
														<img src="<?=$poto;?>" alt="..." id="uploaded_image" class="avatar-img rounded-circle">
														<div id="imgChange"><span>Ubah Foto</span>
															<input type="file" accept="image/*" name="upload_image" id="upload_image">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card-body">
											<div class="user-profile text-center">
												<div class="name"><?=$dataguru['nama'];?></div>
												<div class="job"><?=$jns_ptk1['jenis_ptk'];?></div>
												<div class="desc"><?=$dataguru['email'];?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }; ?>
				</div>
			</div>
			
			<!--Modal Profile-->
			
			<div id="uploadimageModal" class="modal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Upload & Crop Image</h4>
						</div>
						<div class="modal-body">
							<div id="image_demo" style="width:350px; margin-top:30px"></div>
							<button class="btn btn-success crop_image">Crop & Upload Image</button>
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
	<script src="croppie.js"></script>
	<script>  
$(document).ready(function(){
	viewSK();
	function viewSK(){
		$.get("modul/ptk/lihatSK.php?idp=<?=$idp;?>", function(data) {
			$("#hasil").html(data);
		});
	};
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"uploadpoto.php?idp=<?=$idp;?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
		  $.notify({
											icon: 'flaticon-alarm-1',
											title: 'Sukses',
											message: 'Ganti Photo Berhasil',
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
    })
  });
  
  $("#ubahForm").unbind('submit').bind('submit', function() {

				var form = $(this);

				

					//submi the form to server
					$.ajax({
						url : form.attr('action'),
						type : form.attr('method'),
						data : form.serialize(),
						dataType : 'json',
						success:function(response) {

							// remove the error 
							
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
							
							} else {
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
							}  // /else
						} // success  
					}); // ajax subit 				
				


				return false;
			}); // /submit form for create member

});  
</script>
</body>
</html>