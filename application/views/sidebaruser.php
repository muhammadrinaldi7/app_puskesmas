
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
									<?php echo $this->session->userdata('nama_pasien');?>
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
						<?php if($this->session->userdata('status') == "TERVERIFIKASI"){?>
						<li class="nav-item 
							<?php if($sidebar=="poligigi"): ?>active<?php endif;?>
							<?php if($sidebar=="poliumum"): ?>active<?php endif;?>
							<?php if($sidebar=="polilansia"): ?>active<?php endif;?>
							<?php if($sidebar=="polikia"): ?>active<?php endif;?>
							">
								<a data-toggle="collapse" href="#charts2">
									<i class="fas fa-database"></i>
									<p>Pendaftaran</p>
									<span class="caret"></span>
								</a>
								<div class="collapse 
							<?php if($sidebar=="poligigi"): ?>show<?php endif;?>
							<?php if($sidebar=="poliumum"): ?>show<?php endif;?>
							<?php if($sidebar=="polilansia"): ?>show<?php endif;?>
							<?php if($sidebar=="polikia"): ?>show<?php endif;?>
							" id="charts2">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="poligigi"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>poligigi/daftar">
											<span class="sub-item">Poli Gigi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="poliumum"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>poliumum/daftar">
											<span class="sub-item">Poli Umum</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polilansia"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>polilansia/daftar">
											<span class="sub-item">Poli Lansia</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="polikia"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>polikia/daftar">
											<span class="sub-item">Poli KIA</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->