
		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">POLI</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"></h4>
                    DATA POLI
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Poli</th>
                                                        <th>Ruang Poli</th>
                                                        <th>Dokter</th>
                                                        <th>Jam Mulai</th>
                                                        <th>Jam Selesai</th>
                                                        
													</tr>
											</thead>
										
											<tbody>
												<?php $no=1; foreach ($data_poli->result_array() as $i) :
		                                            $id_poli=$i['id_poli'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['nama_poli'];?></td> 
	                                              <td><?php echo $i['ruang_poli'];?></td>
	                                              <td><?php echo $i['nama_dokter'];?></td>
	                                              <td><?php echo $i['jam_mulai'];?></td>
	                                              <td><?php echo $i['jam_selesai'];?></td>
	                                              
	                                            </tr>
												<?php endforeach;?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				
					
					
				</div>
			</div>

<!--Tambah Data-->
       <form  action="<?php echo base_url().'poli/simpan_poli'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH POLI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Poli *</label>
                                        <input required type="text" name="nama_poli" class="form-control" placeholder="Nama Poli"> 
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ruang Poli *</label>
                                        <input required type="text" name="ruang_poli" class="form-control" placeholder="Ruang Poli"> 
                                  </div>
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Mulai *</label>
                                        <input required type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai"> 
                                  </div>
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Selesai *</label>
                                        <input required type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai"> 
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






<!--Update Data-->
  <?php foreach ($data_poli->result_array() as $i) :
                                            $id_poli=$i['id_poli'];
                                          ?>
       <form  action="<?php echo base_url().'poli/update_poli'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_poli;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE POLI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_poli" value="<?php echo $id_poli;?>">
                               <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Poli *</label>
                                        <input value="<?php echo $i['nama_poli'];?>" required type="text" name="nama_poli" class="form-control" placeholder="Nama Poli"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ruang Poli *</label>
                                        <input value="<?php echo $i['ruang_poli'];?>" required type="text" name="ruang_poli" class="form-control" placeholder="Ruang Poli"> 
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Mulai *</label>
                                        <input required type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai"> 
                                  </div>
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jam Selesai *</label>
                                        <input required type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai"> 
                                  </div> 
                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_poli->result_array() as $i) :
                                            $id_poli=$i['id_poli'];
                                          ?>
       <form  action="<?php echo base_url().'poli/hapus_poli'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_poli;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS poli</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_poli;?>">
                         <span>Apakah Anda yakin ingin menghapus data ini?</span>
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-danger">HAPUS</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



  



<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Poli Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Poli Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Poli Berhasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Gambar SALAH'
})
 </script>
<?php endif; ?>

