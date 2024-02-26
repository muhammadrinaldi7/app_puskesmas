
		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Pengguna</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGGUNA</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Username</th>
                                                        <th style="min-width: 10em;">Nama Lengkap</th>
                                                        <th>No HP</th>
                                                        <th>Email</th>
                                                        <th>Level</th>
                                                        <th>Status</th>
                                                        <th>Verif</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
										
											<tbody>
												<?php $no=1; foreach ($data_pengguna->result_array() as $i) :
		                                            $id_pengguna=$i['id_pengguna'];
                                                $ktp = $i['no_ktp'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['username'];?></td> 
	                                              <td><?php echo $i['nama_pasien'];?></td>
	                                              <td><?php echo $i['no_hp'];?></td>
	                                              <td><?php echo $i['email'];?></td>
	                                              <td><?php echo $i['level'];?></td>
	                                              <td><?php echo $i['status'];?></td>
                                                <td style="text-align: right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                  <?php 
                                                  $cek = $this->db->query("SELECT status FROM pengguna WHERE id_pengguna = '$id_pengguna';")->row()->status;
                                                  if (($cek=="TERVERIFIKASI")||($cek=="DITOLAK")) {?>
                                                    <a href="<?= base_url('Pengguna/Verif/'.$id_pengguna); ?>" style="margin: 2px;" type="button" class="btn disabled btn-sm btn-round btn-success"><i class="fa fa-check"></i></a>
                                                    <a href="" style="margin: 2px;" type="button" class="btn disabled btn-sm btn-round btn-danger"><i class="fa fa-times"></i></a>
                                                  <?php }else{ ?>
                                                    <a href="<?= base_url('Pengguna/Verif/'.$id_pengguna); ?>" style="margin: 2px;" type="button" class="btn btn-sm btn-round btn-success"><i class="fa fa-check"></i></a>
                                                    <a href="<?= base_url('Pengguna/Tolak/'.$ktp); ?>" style="margin: 2px;" type="button" class="btn btn-sm btn-round btn-danger"><i class="fa fa-times"></i></a>
                                                  <?php } ?>
                                                  </div>
                                                </td>
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengguna;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengguna;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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
<form  action="<?php echo base_url().'pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>
                 <div class="modal-body">
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Username *</label>
                                        <input required type="text" name="username" class="form-control" placeholder="Username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input required type="password" name="password" class="form-control" placeholder="Password">
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Legkap *</label>
                                        <input  required type="text" name="nama_pasien" class="form-control" placeholder="Nama Lengkap">
                                  </div> 

                             

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Email</label>
                                        <input type="email" class="form-control" name="email"  placeholder="Email" >
                                  </div> 

                                 <!--  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Level Akun</label>
                                          <select class="form-control" name="level" required>
                                            <option value="">--Pilih Level Akun--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Pimpinan">Pimpinan</option>
                                          </select>
                                  </div> -->
                              
                  

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
  <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>">


                               

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Username *</label>
                                        <input value="<?php echo $i['username'];?>" type="text" name="username" class="form-control" placeholder="Username"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span style="color: red;">kosongkan jika tidak ada perubahan password</span>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Legkap *</label>
                                        <input value="<?php echo $i['nama_pasien'];?>" type="text" name="nama_pasien" class="form-control" placeholder="Nama Lengkap">
                                  </div> 

                          
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input value="<?php echo $i['no_hp'];?>" type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                  </div> 


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Email</label>
                                        <input value="<?php echo $i['email'];?>" type="email" class="form-control" name="email"  placeholder="Email" >
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



   <?php foreach ($data_pengguna->result_array() as $i) :
                                            $id_pengguna=$i['id_pengguna'];
                                          ?>
       <form  action="<?php echo base_url().'pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGGUNA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengguna;?>">
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
  text: 'Pengguna Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_verif') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di Verifikasi'
})
 </script>

<?php endif; ?>
<?php if($this->session->flashdata('berhasil_tolak') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'error',
  text: 'Pengguna Ditolak Untuk Verifikasi'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pengguna Behasil di HAPUS'
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

