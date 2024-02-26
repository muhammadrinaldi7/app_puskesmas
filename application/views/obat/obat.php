
		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">OBAT</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH OBAT</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Kode obat</th>
                                                        <th>Nama obat</th>
                                                        <th>Jenis Obat</th>
                                                        <th>Satuan</th>
                                                        <th>Stok</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
										
											<tbody>
												<?php $no=1; foreach ($data_obat->result_array() as $i) :
		                                            $id_obat=$i['id_obat'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['kode_obat'];?></td> 
                                                <td><?php echo $i['nama_obat'];?></td> 
	                                              <td><?php echo $i['jenis_obat'];?></td>
                                                <td><?php echo $i['satuan'];?></td>                          
                                                <td><?php echo $i['stok'];?></td>                          
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_obat;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_obat;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
	                                                </div>
	                                              </td>
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
       <form  action="<?php echo base_url().'obat/simpan_obat'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                  

                             <?php 
$cek = $this->db->query("SELECT max(kode_obat) AS no FROM obat order by kode_obat desc limit 1");
$data = $cek->row_array();
$no2 = sprintf('%03d',$data['no']+1);
?> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Obat *</label>
                                        <input value="<?php echo $no2;?>" readonly required type="text" name="kode_obat" class="form-control" placeholder="Kode Obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Obat *</label>
                                        <input required type="text" name="nama_obat" class="form-control" placeholder="Nama Obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis obat *</label>
                                        <input required type="text" name="jenis_obat" class="form-control" placeholder="Jenis obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Satuan *</label>
                                        <input required type="text" name="satuan" class="form-control" placeholder="Satuan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Stok *</label>
                                        <input required type="number" name="stok" class="form-control" placeholder="stok"> 
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
  <?php foreach ($data_obat->result_array() as $i) :
                                            $id_obat=$i['id_obat'];
                                          ?>
       <form  action="<?php echo base_url().'obat/update_obat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_obat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_obat" value="<?php echo $id_obat;?>">


                            <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Obat *</label>
                                        <input readonly value="<?php echo $i['kode_obat'];?>" required type="text" name="kode_obat" class="form-control" placeholder="Kode Obat"> 
                                  </div> 



                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Obat *</label>
                                        <input  value="<?php echo $i['nama_obat'];?>" required type="text" name="nama_obat" class="form-control" placeholder="Nama Obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis obat *</label>
                                        <input  value="<?php echo $i['jenis_obat'];?>" required type="text" name="jenis_obat" class="form-control" placeholder="Jenis obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Satuan *</label>
                                        <input  value="<?php echo $i['satuan'];?>" required type="text" name="satuan" class="form-control" placeholder="Satuan"> 
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Stok *</label>
                                        <input required type="number" value="<?php echo $i['stok'];?>" name="stok" class="form-control" placeholder="stok"> 
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



   <?php foreach ($data_obat->result_array() as $i) :
                                            $id_obat=$i['id_obat'];
                                          ?>
       <form  action="<?php echo base_url().'obat/hapus_obat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_obat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_obat;?>">
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
  text: 'Obat Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Obat Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Obat Behasil di HAPUS'
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

