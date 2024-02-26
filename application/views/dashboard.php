		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<?php if ($this->session->userdata('level')=='Administrator'){?>
								<div class="card-body">
								<div class="card-title">Jumlah Data</div>
								<div class=" text-right"><a onclick="return confirm('Yakin Ingin Reset Antrian ?')" href="<?= base_url('Dashboard/resetantrian') ?>" class="btn btn-sm btn-danger"> Reset Antrian <i class="fas fa-undo-alt"></i></a></div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">POLI UMUM</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">POLI KIA</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">POLI GIGI</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-4"></div>
											<h6 class="fw-bold mt-3 mb-0">POLI LANSIA</h6>
										</div>
									</div>
									</div>
									<hr style="margin-top:50px">
									<div class="row">
			<div class="col-8 col-sm-6 col-lg-3">
			<div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  Antrian Selanjutnya :<?= $antrian ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $sekarangki ?></div>
									<div class="text-muted mb-3">Poli KIA</div>
                  <a onclick="return confirm('Panggil Antrian Ini ?')" href="<?php echo base_url('Dashboard/updateAntrianKia/'.$sekarangki.'/'.$idpolikia);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Panggil
										</a>
								</div>
							</div>
			</div>
			<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
										Antrian Selanjutnya : <?= $antrian2 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $sekarang2 ?></div>
									<div class="text-muted mb-3">Poli Umum</div>
									<a onclick="return confirm('Panggil Antrian Ini ?')" href="<?php echo base_url('Dashboard/updateAntrianKia/'.$sekarangum);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Panggil
									</a>
								</div>
							</div>
						</div>
						<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  Antrian Selanjutnya : <?= $antrian1 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $sekarang1 ?></div>
									<div class="text-muted mb-3">Poli Gigi</div>
									<a onclick="return confirm('Panggil Antrian Ini ?')" href="<?php echo base_url('Dashboard/updateAntrianKia/'.$sekaranggi);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Panggil
									</a>
								</div>
							</div>
						</div>
						<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  Antrian Selanjutnya : <?= $antrian3 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $sekarang3 ?></div>
									<div class="text-muted mb-3">Poli Lansia</div>
									<a onclick="return confirm('Panggil Antrian Ini ?')" href="<?php echo base_url('Dashboard/updateAntrianKia/'.$sekaranglan);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Panggil
									</a>
								</div>
							</div>
						</div>
                </div>
								</div>
									</div>
								</div>
								<!-- BARIS PASIEN -->
								<?php }else if($this->session->userdata('status') == "TERVERIFIKASI"){?>
		<?php 
		$id = $this->session->userdata('id_pasien');
		$cek = $this->db->query("SELECT * FROM `antrian` WHERE id_pasien = '$id' AND status ='MENUNGGU DIPANGGIL';")->num_rows();
		if ($cek>0) {?>
			<div class="card-body p-5">
				<h6 class="card-title mb-4">Antrian Anda</h6>
				<div class="col-6 col-sm-6 col-lg-12">
					<div class="card">
								<div class="card-body p-3 text-center">
									
										<?php 
											$id = $this->session->userdata('id_pasien');
											$antri = $this->db->query("SELECT no_antrian,status,poli.nama_poli FROM antrian LEFT JOIN poli on poli.id_poli = antrian.id_poli WHERE id_pasien = '$id';")->result();
											foreach($antri as $a):
											endforeach;
										?>
									<div class="h1 m-0"><?= $a->no_antrian; ?></div>
									<div class="text-muted mb-3"><?= $a->nama_poli; ?></div>
									<div class="text-muted text-danger mb-3"><?= $a->status; ?></div>

                  				</div>
							</div>
				</div>
			<div class="card-body p-5">
				<h6 class="card-title mb-4">Antrian Sekarang</h6>
				<div class="row">
					<div class="col-8 col-sm-6 col-lg-3">
						<div class="card">
									<div class="card-body p-3 text-center">
										<div class="h1 m-0"><?= $sekarang; ?></div>
									<div class="text-muted mb-3">Poli KIA</div>
									</div>
						</div>	
					</div>
					<div class="col-8 col-sm-6 col-lg-3">
						<div class="card">
									<div class="card-body p-3 text-center">
										<div class="h1 m-0"><?= $sekarang2; ?></div>
									<div class="text-muted mb-3">Poli UMUM</div>
									</div>
						</div>	
					</div>
					<div class="col-8 col-sm-6 col-lg-3">
						<div class="card">
									<div class="card-body p-3 text-center">
										<div class="h1 m-0"><?= $sekarang1; ?></div>
									<div class="text-muted mb-3">Poli GIGI</div>
									</div>
						</div>	
					</div>
					<div class="col-8 col-sm-6 col-lg-3">
						<div class="card">
									<div class="card-body p-3 text-center">
										<div class="h1 m-0"><?= $sekarang3; ?></div>
									<div class="text-muted mb-3">Poli LANSIA</div>
									</div>
						</div>	
					</div>
				</div>
		<?php }else{?>
			<div class="card-body p-5">
			<h6 class="card-title mb-4">Ambil No Antrian</h6>			
            <div class="row">
			<div class="col-8 col-sm-6 col-lg-3">
			<div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  						Antrian Selanjutnya :<?= $sekarang ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $antrian ?></div>
									<div class="text-muted mb-3">Poli KIA</div>
                  <a onclick="return confirm('Apakah Anda Ingin Mengambil Antrian POLI KIA ?')" href="<?php echo base_url('Dashboard/tambahAntrian/'.$antrian.'/'.$this->session->userdata('id_pasien').'/'.$idpolikia);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Ambil Antrian
										</a>
								</div>
							</div>
			</div>
			<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
										Antrian Selanjutnya : <?= $sekarang2 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $antrian2 ?></div>
									<div class="text-muted mb-3">Poli Umum</div>
									<a onclick="return confirm('Apakah Anda Ingin Mengambil Antrian POLI UMUM ?')" href="<?php echo base_url('Dashboard/tambahAntrian/'.$antrian2.'/'.$this->session->userdata('id_pasien').'/'.$idpoliumum);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Ambil Antrian
										</a>
								</div>
							</div>
						</div>
						<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  Antrian Selanjutnya : <?= $sekarang1 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $antrian1 ?></div>
									<div class="text-muted mb-3">Poli Gigi</div>
									<a onclick="return confirm('Apakah Anda Ingin Mengambil Antrian POLI Gigi ?')" href="<?php echo base_url('Dashboard/tambahAntrian/'.$antrian1.'/'.$this->session->userdata('id_pasien').'/'.$idpoligigi);?>" class="btn btn-danger">
											<span class="btn-label"
												<i class="fa fa-plus"></i>
											</span>
											Ambil Antrian
										</a>
								</div>
							</div>
						</div>
						<div class="col-8 col-sm-6 col-lg-3">
            <div class="card">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
                  Antrian Selanjutnya : <?= $sekarang3 ?>
										<i class="fa fa-chevron-up"></i>
									</div>
									<div class="h1 m-0"><?= $antrian3 ?></div>
									<div class="text-muted mb-3">Poli Lansia</div>
									<a onclick="return confirm('Apakah Anda Ingin Mengambil Antrian POLI Lansia ?')" href="<?php echo base_url('Dashboard/tambahAntrian/'.$antrian3.'/'.$this->session->userdata('id_pasien').'/'.$idpolilansia);?>" class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Ambil Antrian
										</a>
								</div>
							</div>
						</div>
                </div>
								</div>
									</div>
		<?php } ?>
								<?php }else if($this->session->userdata('status') == "VERIFIKASI"){ ?>
									<div class="card-body p-5">
										<h6 class="card-title mb-4">Status</h6>
										<h5 class="card-subtitle text-muted">Anda Belum Terverifikasi, Silahkan Tunggu Diverifikasi.</h5> <br>
									</div>
								<?php }else if($this->session->userdata('status') == "DITOLAK"){ ?>
									<div class="card-body p-5">
										<h6 class="card-title mb-4">Status</h6>
										<h5 class="card-subtitle text-muted">Mohon Maaf Pendaftaran Anda Ditolak, Karena Anda Tidak Berada Di Dalam Wilayah Kerja Puskesmas Banjarbaru Selatan.</h5> <br>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		
<form  action="<?php echo base_url().'pasien/simpan_pasien'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>DAFTAR PASIEN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        
							<?php 
							$cek = $this->db->query("SELECT max(no_rekamedis) AS no FROM pasien order by no_rekamedis desc limit 1");
							$data = $cek->row_array();
							$no2 = sprintf('%03d',$data['no']+1);
							?> 
									<div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Rekamedis *</label>
                                        <input value="<?php echo $no2;?>" readonly required type="text" name="no_rekamedis" class="form-control" placeholder="No Rekamedis"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. KTP *</label>
                                        <input required type="text" value="<?= $this->session->userdata('no_ktp'); ?>" readonly name="no_ktp" class="form-control" placeholder="No. KTP"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. BPJS </label>
                                        <input  type="text" name="no_bpjs" class="form-control" placeholder="No. BPJS"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pasien *</label>
                                        <input required type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status Pasien *</label>
                                        <select class="form-control" name="status_pasien" required>
                                          <option value="">--pilih status pasien--</option>
                                          <option >UMUM</option>
                                          <option >BPJS</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin *</label>
                                        <select class="form-control" name="jenkel" required>
                                          <option value="">--pilih jenis kelamin--</option>
                                          <option >Laki-Laki</option>
                                          <option >Perempuan</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" name="alamat" required=""></textarea>
                                  </div> 

                                 

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-info">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pendaftaran Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_ambil') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Antrian Berhasil Diambil, Silahkan Tunggu.',
})
 </script>
<?php endif; ?>

<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_panggil') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Panggilan Tersampaikan.',
})
 </script>
<?php endif; ?>

<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('hapus_antrian') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Antrian Berhasil Direset.',
})
 </script>
<?php endif; ?>