
		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PASIEN</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PASIEN</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No. Rekamedis</th>
                                                        <th>No. KTP</th>
                                                        <th>No. BPJS</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Jenkel</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Status Pasien</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
										
											<tbody>
												<?php $no=1; foreach ($data_pasien->result_array() as $i) :
		                                            $id_pasien=$i['id_pasien'];
		                                          ?>
												                      <tr>                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['no_rekamedis'];?></td> 
	                                              <td><?php echo $i['no_ktp'];?></td>
                                                <td><?php echo $i['no_bpjs'];?></td>
                                                <td><?php echo $i['nama_pasien'];?></td>
                                                <td><?php echo $i['jenkel'];?></td>
                                                <td><?php echo $i['tempat_lahir'];?></td>
                                                <td><?php echo $i['tanggal_lahir'];?></td>
                                                <td><?php echo $i['alamat'];?></td>
                                                <td><?php echo $i['status_pasien'];?></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pasien;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pasien;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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
       <form  action="<?php echo base_url().'pasien/simpan_pasien'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PASIEN</b></h4>
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
                                        <input required type="text" name="no_ktp" class="form-control" placeholder="No. KTP"> 
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






<!--Update Data-->
  <?php foreach ($data_pasien->result_array() as $i) :
                                            $id_pasien=$i['id_pasien'];
                                          ?>
       <form  action="<?php echo base_url().'pasien/update_pasien'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pasien;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE pasien</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pasien" value="<?php echo $id_pasien;?>">


                               


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Rekamedis *</label>
                                        <input value="<?php echo $i['no_rekamedis'];?>" readonly required type="text" name="no_rekamedis" class="form-control" placeholder="No Rekamedis"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. KTP *</label>
                                        <input  value="<?php echo $i['no_ktp'];?>" required type="text" name="no_ktp" class="form-control" placeholder="No. KTP"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. BPJS </label>
                                        <input  value="<?php echo $i['no_bpjs'];?>"  type="text" name="no_bpjs" class="form-control" placeholder="No. BPJS"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Pasien *</label>
                                        <input  value="<?php echo $i['nama_pasien'];?>" required type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Status Pasien *</label>
                                        <select class="form-control" name="status_pasien" required>
                                          <option value="">--pilih status pasien--</option>
                                          <option <?= ($i['status_pasien']=="UMUM")?'selected':'';?> >UMUM</option>
                                          <option <?= ($i['status_pasien']=="BPJS")?'selected':'';?> >BPJS</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin *</label>
                                        <select class="form-control" name="jenkel" required>
                                          <option value="">--pilih jenis kelamin--</option>
                                          <option <?= ($i['jenkel']=="Laki-Laki")?'selected':'';?> >Laki-Laki</option>
                                          <option <?= ($i['jenkel']=="Perempuan")?'selected':'';?> >Perempuan</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir *</label>
                                        <input  value="<?php echo $i['tempat_lahir'];?>" required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input  value="<?php echo $i['tanggal_lahir'];?>" required type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" name="alamat" required=""><?php echo $i['alamat'];?></textarea>
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



   <?php foreach ($data_pasien->result_array() as $i) :
                                            $id_pasien=$i['id_pasien'];
                                          ?>
       <form  action="<?php echo base_url().'pasien/hapus_pasien'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pasien;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PASIEN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>
  
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pasien;?>">
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
  text: 'Pasien Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pasien Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pasien Berhasil di HAPUS'
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

