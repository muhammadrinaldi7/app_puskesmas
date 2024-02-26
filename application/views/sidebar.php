
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php if(empty($this->session->userdata('foto'))):?>
													<img src="<?php echo base_url();?>/assets/image/profil3.png" alt="image profile" class="avatar-img rounded-circle">
												<?php else:?>
													<img src="<?php echo base_url();?>/assets/image/<?php echo $this->session->userdata('foto');?>" alt="image profile" class="avatar-img rounded-circle">
												<?php endif;?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->userdata('nama_lengkap');?>
									<span class="user-level"><?php echo $this->session->userdata('level');?></span>
									<!--<span class="user-level"><?php echo $this->session->userdata('level');?></span>-->
								</span>
							</a>
							<div class="clearfix"></div>

						
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($sidebar=="dashboard"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item 
						<?php if($sidebar=="pengguna"): ?>active<?php endif;?>
						<?php if($sidebar=="pasien"): ?>active<?php endif;?>
						<?php if($sidebar=="poli"): ?>active<?php endif;?>
						<?php if($sidebar=="obat"): ?>active<?php endif;?>
						<?php if($sidebar=="diagnosa"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts">
								<i class="fas fa-server"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="pengguna"): ?>show<?php endif;?>
						<?php if($sidebar=="pasien"): ?>show<?php endif;?>
						<?php if($sidebar=="poli"): ?>show<?php endif;?>
						<?php if($sidebar=="obat"): ?>show<?php endif;?>
						<?php if($sidebar=="diagnosa"): ?>show<?php endif;?>
							" id="charts">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengguna">
											<span class="sub-item">Pengguna</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pasien"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pasien">
											<span class="sub-item">Pasien</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poli"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>poli">
											<span class="sub-item">Poli</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="obat"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>obat">
											<span class="sub-item">Obat</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="diagnosa"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>diagnosa">
											<span class="sub-item">Diagnosa</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						
						<li class="nav-item 
						<?php if($sidebar=="dokter"): ?>active<?php endif;?>
						<?php if($sidebar=="pendaftaran"): ?>active<?php endif;?>
						<?php if($sidebar=="riwayat_tindakan"): ?>active<?php endif;?>
						<?php if($sidebar=="pemberian_resep_obat"): ?>active<?php endif;?>
						<?php if($sidebar=="polikia"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts2">
								<i class="fas fa-database"></i>
								<p>Transaksi Data</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="dokter"): ?>show<?php endif;?>
						<?php if($sidebar=="pendaftaran"): ?>show<?php endif;?>
						<?php if($sidebar=="riwayat_tindakan"): ?>show<?php endif;?>
						<?php if($sidebar=="pemberian_resep_obat"): ?>show<?php endif;?>
						<?php if($sidebar=="polikia"): ?>show<?php endif;?>
							" id="charts2">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="dokter"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>dokter">
											<span class="sub-item">Dokter</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pendaftaran"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pendaftaran">
											<span class="sub-item">Pendaftaran</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="riwayat_tindakan"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>riwayat_tindakan">
											<span class="sub-item">Tindakan Berobat</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pemberian_resep_obat"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pemberian_resep_obat">
											<span class="sub-item">Pemberian Resep Obat</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polikia"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>polikia">
											<span class="sub-item">Polikia</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poliumum"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>Poliumum">
											<span class="sub-item">Poli Umum</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poligigi"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>Poligigi">
											<span class="sub-item">Poli Gigi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polilansia"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>Polilansia">
											<span class="sub-item">Poli Lansia</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item 
						<?php if($sidebar=="dokter2"): ?>active<?php endif;?>
						<?php if($sidebar=="pendaftaran2"): ?>active<?php endif;?>
						<?php if($sidebar=="riwayat_tindakan2"): ?>active<?php endif;?>
						<?php if($sidebar=="pemberian_resep_obat2"): ?>active<?php endif;?>
						<?php if($sidebar=="polikia2"): ?>active<?php endif;?>
						<?php if($sidebar=="poliumum2"): ?>active<?php endif;?>
						<?php if($sidebar=="poligigi2"): ?>active<?php endif;?>
						<?php if($sidebar=="polilansia2"): ?>active<?php endif;?>
						<?php if($sidebar=="obat1"): ?>active<?php endif;?>
						<?php if($sidebar=="rm"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts3">
								<i class="fas fa-print"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="dokter2"): ?>show<?php endif;?>
						<?php if($sidebar=="pendaftaran2"): ?>show<?php endif;?>
						<?php if($sidebar=="riwayat_tindakan2"): ?>show<?php endif;?>
						<?php if($sidebar=="pemberian_resep_obat2"): ?>show<?php endif;?>
						<?php if($sidebar=="polikia2"): ?>show<?php endif;?>
						<?php if($sidebar=="poliumum2"): ?>show<?php endif;?>
						<?php if($sidebar=="poligigi2"): ?>show<?php endif;?>
						<?php if($sidebar=="polilansia2"): ?>show<?php endif;?>
						<?php if($sidebar=="obat1"): ?>show<?php endif;?>
						<?php if($sidebar=="rm"): ?>show<?php endif;?>
							" id="charts3">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="dokter2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>dokter/lihat">
											<span class="sub-item">Dokter</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pendaftaran2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pendaftaran/lihat">
											<span class="sub-item">Pendaftaran</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="riwayat_tindakan2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>riwayat_tindakan/lihat">
											<span class="sub-item">Tindakan Berobat</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pemberian_resep_obat2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pemberian_resep_obat/lihat">
											<span class="sub-item">Pemberian Resep Obat</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polikia2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>polikia/lihat">
											<span class="sub-item">Polikia</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poliumum2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>poliumum/lihat">
											<span class="sub-item">Poli Umum</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poligigi2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>poligigi/lihat">
											<span class="sub-item">Poli Gigi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polilansia2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>polilansia/lihat">
											<span class="sub-item">Poli Lansia</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="obat1"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>obat/lihat">
											<span class="sub-item">Obat</span>
										</a>
									</li>
									
									<li class="<?php if($sidebar=="rm"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pasien/lihat">
											<span class="sub-item">Rekam Medis Pasien</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>


					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->