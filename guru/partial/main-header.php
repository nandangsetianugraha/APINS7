		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue2">
				
				<a href="./" class="logo">
					<img src="../assets/img/logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-grid"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle sidenav-overlay-toggler">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$tpl_aktif;?> <?php if($smt_aktif==1){echo "Ganjil";}else{echo "Genap";}; ?>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Laporan</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<?php if($level==98 or $level==97){ ?>
											<a class="col-6 col-md-4 p-0" href="raportsosial">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Sikap Sosial</span>
												</div>
											</a>
											<?php }; ?>
											<?php if($level==96){ ?>
											<a class="col-6 col-md-4 p-0" href="raportspiritual">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Spiritual</span>
												</div>
											</a>
											<?php }; ?>
											<a class="col-6 col-md-4 p-0" href="raportpengetahuan">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Pengetahuan</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="raportketrampilan">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Ketrampilan</span>
												</div>
											</a>
											<!--
											<a class="col-6 col-md-4 p-0" href="rekapNilai">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Rekapitulasi Nilai</span>
												</div>
											</a>
											-->
											<a class="col-6 col-md-4 p-0" href="cetakraport">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Cetak Raport</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="rekapraport">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Rekapitulasi Raport</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?=$avatar;?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?=$avatar;?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?=$bioku['nama'];?></h4>
												<p class="text-muted"><?=$bioku['email'];?></p><a href="profil" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<!--
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										-->
										<a class="dropdown-item" href="logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>