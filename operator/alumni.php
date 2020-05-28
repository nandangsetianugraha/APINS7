<?php include "partial/head.php"; 
$idp=isset($_GET['idp']) ? $_GET['idp'] : '0';
if($idp=="0"){}
else{
$dataguru = mysqli_fetch_array(mysqli_query($koneksi, "select * from siswa where id='$idp'"));
if(file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/images/siswa/".$dataguru['avatar'])){
	$poto="../../images/siswa/".$dataguru['avatar'];
}else{
	$poto="../../images/user-default.png";
};
$ids=$dataguru['peserta_didik_id'];
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

        object, embed{
            display:block;
            width:90%;
            margin:1em auto;
            height: 600px;
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
						<a href="lulus.php" class="btn btn-icon btn-link">
							<i class="fas fa-angle-double-left"></i>
						</a>
						Biodata <?php if($idp=="0"){}else{echo $dataguru['nama'];}?>
					</h4>
							<?php if($idp=="0"){ ?>
							<?php }else{ 
							?>
							
							<div class="row">
								<div class="col-md-9">
									<div class="card card-with-nav">
										<div class="card-header">
											<div class="row row-nav-line">
												<ul class="nav nav-pills nav-line nav-color-secondary w-100 pl-3" id="pills-tab" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">File Ijazah</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Nilai Raport</a>
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
																<input type="text" class="form-control" name="nama" value="<?=$dataguru['nama'];?>">
																<input type="hidden" class="form-control" id="ptkid" value="<?=$dataguru['peserta_didik_id'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NIS</label>
																<input type="text" class="form-control" name="gelar" value="<?=$dataguru['nis'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NISN</label>
																<input type="text" class="form-control" name="email" value="<?=$dataguru['nisn'];?>">
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Tempat Lahir</label>
																<input type="text" class="form-control" value="<?=$dataguru['tempat'];?>" name="tempat">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Tanggal Lahir</label>
																<input type="text" class="form-control" id="datepicker" name="tanggallahir" value="<?=$dataguru['tanggal'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Jenis Kelamin</label>
																<select class="form-control" name="jeniskelamin">
																	<option value="L" <?php if($dataguru['jk']=="L"){echo "selected";};?>>Laki-laki</option>
																	<option value="P" <?php if($dataguru['jk']=="P"){echo "selected";};?>>Perempuan</option>
																</select>
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>NIK</label>
																<input type="text" class="form-control" name="nik" value="<?=$dataguru['nik'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Pendidikan Sebelumnya</label>
																<input type="text" class="form-control" name="niynigk" value="<?=$dataguru['pend_sebelum'];?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Alamat</label>
																<input type="text" class="form-control" name="nuptk" value="<?=$dataguru['alamat'];?>">
															</div>
														</div>
													</div>
													
													<div class="row mt-3">
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Nama Ayah</label>
																<input type="text" class="form-control" value="<?=$dataguru['nama_ayah'];?>" name="nama_ayah">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Nama Ibu</label>
																<input type="text" class="form-control" value="<?=$dataguru['nama_ibu'];?>" name="nama_ibu">
															</div>
														</div>
													</div>
												</div>
												
												<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
													<input type="file" name="file" id="file" /><br/>
													<div id="dataAbsen"></div>
												</div>
												<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
													Tahap Pengembangan
												</div>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="card card-profile">
										<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
											<div class="profile-picture">
												<div class="avatar avatar-xl">
													<div id="uploaded_image"><img src="<?=$poto;?>" alt="..." id="uploaded_image" class="avatar-img rounded-circle"></div>
														<div id="imgChange"><span>Ubah Foto</span>
															<input type="file" accept="image/*" name="upload_image" id="upload_image">
														</div>
													
												</div>
											</div>
										</div>
										<div class="card-body">
											<div class="user-profile text-center">
												<div class="name"><?=$dataguru['nama'];?></div>
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
var SKTable;	
$(document).ready(function(){
	viewTr();
		function viewTr(){
			var ids = $('#ptkid').val();
			$.ajax({
				type : 'GET',
				url : 'modul/siswa/view.php',
				data :  'ids=' + ids,
				beforeSend: function()
				{	
					$("#dataAbsen").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Absensi Kelas....</h4></div>');
				},
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#dataAbsen").html(data);
				}
			});
		};
	$(document).on('change', '#file', function(){
	  var name = document.getElementById("file").files[0].name;
	  var form_data = new FormData();
	  var ext = name.split('.').pop().toLowerCase();
	  var ids = $('#ptkid').val();
	  if(jQuery.inArray(ext, ['pdf','gif','png','jpg','jpeg']) == -1) 
	  {
	   alert("Invalid Image File");
	  }
	  var oFReader = new FileReader();
	  oFReader.readAsDataURL(document.getElementById("file").files[0]);
	  var f = document.getElementById("file").files[0];
	  var fsize = f.size||f.fileSize;
	  if(fsize > 2000000)
	  {
	   alert("Image File Size is very big");
	  }
	  else
	  {
	   form_data.append("file", document.getElementById('file').files[0]);
	   $.ajax({
		url:"uploadijazah.php?ids=<?=$ids;?>",
		method:"POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		beforeSend:function(){
		 $('#dataAbsen').html("<label class='text-success'>Image Uploading...</label>");
		},   
		success:function(data)
		{
		 $('#dataAbsen').html(data);
		}
	   });
	  }
	 });
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
        url:"uploadpotosiswa.php?idp=<?=$ids;?>",
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