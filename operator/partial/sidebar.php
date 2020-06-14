		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?=$avatar;?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?=$bioku['nama'];?>
									<span class="user-level"><?=$jns_ptk['jenis_ptk'];?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="profil">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="pengguna">
											<span class="link-collapse">Pengguna</span>
										</a>
									</li>
									<li>
										<a href="blog">
											<span class="link-collapse">Blog Post</span>
										</a>
									</li>
									<li>
										<a href="konfig">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
						<li class="nav-item">
							<a href="./">
								<i class="fas fa-home"></i>
								<p>Beranda</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#pd" class="collapsed" aria-expanded="false">
								<i class="fas fa-address-card"></i>
								<p>Data Sekolah</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pd">
								<ul class="nav nav-collapse">
									<li>
										<a href="kelas">
											<span class="sub-item">Daftar Siswa</span>
										</a>
									</li>
									<li>
										<a href="guru">
											<span class="sub-item">Daftar PTK</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Administrasi K13</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="tema">
											<span class="sub-item">Tema</span>
										</a>
									</li>
									<li>
										<a href="kompetensi">
											<span class="sub-item">Kompetensi Dasar</span>
										</a>
									</li>
									<li>
										<a href="pemetaan">
											<span class="sub-item">Pemetaan KD</span>
										</a>
									</li>
									<li>
										<a href="kkm">
											<span class="sub-item">KKM</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Penilaian Sikap</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="spiritual">
											<span class="sub-item">Spiritual</span>
										</a>
									</li>
									<li>
										<a href="sosial">
											<span class="sub-item">Sosial</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Penilaian Pengetahuan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="pengetahuan">
											<span class="sub-item">Pengetahuan</span>
										</a>
									</li>
									<li>
										<a href="ketrampilan">
											<span class="sub-item">Ketrampilan</span>
										</a>
									</li>
									<li>
										<a href="pts">
											<span class="sub-item">Tengah Semester</span>
										</a>
									</li>
									<li>
										<a href="pas">
											<span class="sub-item">Akhir Semester</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Data Isian Semester</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="kesehatan">
											<span class="sub-item">Kesehatan</span>
										</a>
									</li>
									<li>
										<a href="prestasi">
											<span class="sub-item">Prestasi</span>
										</a>
									</li>
									<li>
										<a href="ekskul">
											<span class="sub-item">Ekstrakurikuler</span>
										</a>
									</li>
									<li>
										<a href="saran">
											<span class="sub-item">Saran</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-map-marker-alt"></i>
								<p>Tahfidz</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="juzamma">
											<span class="sub-item">Penilaian Tahfidz</span>
										</a>
									</li>
									<li>
										<a href="cetaktahfidz">
											<span class="sub-item">Cetak Raport Tahfidz</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Cetak Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="formatf1">
											<span class="sub-item">Format F1</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="cekraport">
								<i class="fas fa-book-reader"></i>
								<p>Cek Raport Kelas 6</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>