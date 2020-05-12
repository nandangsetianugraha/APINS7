<?php
session_start();
if (isset($_SESSION['level'])) {
    header("location:../index.php");
}
include "../assets/db.php";
$sql_tahun=mysqli_query($koneksi, "select * from konfigurasi");
$esmanis=mysqli_fetch_array($sql_tahun);
$tpl_aktif=$esmanis['tapel'];
$smt_aktif=$esmanis['semester'];
$logologin=$esmanis['image_login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>APINS - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/img/icon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				
				<form id="form-login" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						<p class="info"></p> <img src="../assets/img/icon.png"/> APINS
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Username minimal 3 huruf">
						<input class="input100" type="hidden" id="tpl" name="tpl" value="<?=$tpl_aktif;?>">
						<input class="input100" type="text" name="username" id="username" autofocus autocomplete=off>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password tidak boleh kosong">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							
						</div>

						<div>
							<a href="../../" class="txt1">
								Halaman Depan
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button name="Submit" id="submit" id="login-btn" class="login100-form-btn informasi">
							Login
						</button>
					</div>
				</form>
				
				<div class="login100-more" style="background-image: url('../images/<?=$logologin;?>');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function(){
			$(".info-login").hide();
			jQuery("#form-login").submit(function(e){
				e.preventDefault();
				var formData = jQuery(this).serialize();
					
				$.ajax({
					type: "POST",
					url: "login_check.php",
					data: formData,
					beforeSend: function()
						{	
							$(".informasi").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
					success: function(res){
						response = $.parseJSON(res);
						if(response.status!=="error_login"){
							$(".info").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><h4 class="alert-heading">Login Sukses!</h4><p>Silahkan Tunggu sesaat, Anda akan dialihkan ke Halaman Admin.</p></div>');
							if(response.level==11){
								setTimeout(function () {
										window.open("../operator/","_self");
									},1000);
							}else if(response.level==5){
								setTimeout(function () {
										window.open("../tu/","_self");
									},1000);
							}else if(response.level==99){
								setTimeout(function () {
										window.open("../kepsek/","_self");
									},1000);
							}else{
								setTimeout(function () {
										window.open("../guru/","_self");
									},1000);
							};
							
						}else{
							$(".informasi").html('Login');
							$(".info").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong> Username atau Password yang Anda masukkan salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						};
					}
					});
				return false;
			});
		});
</script>  
</body>
</html>