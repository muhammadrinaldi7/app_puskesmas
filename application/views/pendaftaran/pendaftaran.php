
		<div class="main-panel">
			<div class="content">
				<div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-4">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">PENDAFTARAN</h2>
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
									 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENDAFTARAN</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
													<tr>
														<th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No. Rekamedis</th>
                                                        <th>No. Rawat</th>
                                                        <th>No. KTP</th>
                                                        <th>No. BPJS</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Poli Tujuan</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Status Pasien</th>
                                                        <th>Tanggal Daftar</th>
                                                        <th style="text-align: center;">Action</th>
													</tr>
											</thead>
										
											<tbody>
												<?php $no=1; foreach ($data_pendaftaran->result_array() as $i) :
		                                            $id_pendaftaran=$i['id_pendaftaran'];
		                                          ?>
												 <tr>
                                              
	                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
	                                              <td><?php echo $i['no_rekamedis'];?></td> 
                                                <td style="flex: 0 0 auto; min-width: 5em;"><?php echo $i['no_rawat'];?></td> 
	                                              <td><?php echo $i['no_ktp'];?></td>
                                                <td><?php 
                                                    if ($i['no_bpjs']=="") {
                                                      echo "PASIEN UMUM";
                                                    }else {
                                                    echo $i['no_bpjs'];
                                                    }?>
                                                </td>
                                                <td><?php echo $i['nama_pasien'];?></td>
                                                <td><?php echo $i['nama_poli'];?></td>
                                                <td><?php echo $i['tempat_lahir'];?></td>
                                                <td><?php echo $i['tanggal_lahir'];?></td>
                                                <td><?php echo $i['alamat'];?></td>
                                                <td><?php echo $i['status_pasien'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_daftar']);?></td>
	                                           
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">

	                                              <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pendaftaran;?>"><i class="fa fa-edit"></i> EDIT</button>

	                                              <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pendaftaran;?>"><i class="fa fa-trash"></i> DELETE</button>
	                                                
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
  <form  action="<?php echo base_url().'pendaftaran/simpan_pendaftaran'?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                                      <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                                                      aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header bg-success white">
                                                              <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENDAFTARAN</b></h4>
                                                              <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" >&times;</span>
                                                              </button>
                                                            </div>
                                            <div class="modal-body">
                                      <?php 
                                      $cek = $this->db->query("SELECT max(id_pendaftaran) AS no FROM pendaftaran order by id_pendaftaran desc limit 1");
                                      $data = $cek->row_array();
                                      $no2 = date('d-m-Y')."-".sprintf('%03d',$data['no']+1);
                                      ?> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Rawat *</label>
                                        <input value="<?php echo $no2;?>" readonly required type="text" name="no_rawat" class="form-control" placeholder="No Rawat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Daftar *</label>
                                        <input required value="<?php echo date('Y-m-d');?>" type="date" name="tanggal_daftar" class="form-control" placeholder="Tanggal Daftar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Poli Tujuan *</label>
                                        <select class="form-control" onchange="changeValue(this.value)" id="poli" name="id_poli" required>
                                          <option value="">--pilih poli--</option>
                                          <?php  $jsArray = "var prdName = new Array();\n"; foreach ($this->db->query("SELECT dokter.id_dokter,poli.id_poli,poli.nama_poli,dokter.nama_dokter FROM `dokter` left JOIN poli on poli.id_poli = dokter.id_poli;")->result_array() as $key):
                                          echo '<option value="'.$key['id_poli'].'">'.$key['nama_poli'].' | '.$key['nama_dokter'].'</option> ';
                                          $jsArray .= "prdName['" . $key['id_poli'] . "'] = {id_poli:'" . addslashes($key['id_poli']) . "',id_dokter:'" . addslashes($key['id_dokter']) . "'};\n";
                                          ?>                                            
                                        <?php endforeach;?>
                                        </select>
                                  </div> 
                                            <input type="hidden" name="id_dokter" id="id_dokter">
                                            <input type="hidden" name="id_poli" id="id_poli">

                                     <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Pasien *</label>
                                        <select class="form-control" name="id_pasien" required>
                                          <option value="">--pilih pasien--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pasien")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_pasien'];?>" ><?php echo $key['no_ktp'];?> | <?php echo $key['nama_pasien'];?> </option>
                                        <?php endforeach;?>
                                        </select>
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Penanggung Jawab *</label>
                                        <input required type="text" name="nama_penanggung_jawab" class="form-control" placeholder="Nama Penanggung Jawab"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hubungan dengan penanggung Jawab *</label>
                                        <select class="form-control" required name="hubungan_dengan_penanggung_jawab">
                                          <option value="">--pilih hubungan dengan penanggung jawab--</option>
                                          <option>Saudara Kandung</option>
                                          <option>Orang Tua</option>
                                        </select>
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat Penanggung*</label>
                                        <textarea class="form-control" name="alamat_penanggung" required=""></textarea>
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
  <?php foreach ($data_pendaftaran->result_array() as $i) :
                                            $id_pendaftaran=$i['id_pendaftaran'];
                                          ?>
       <form  action="<?php echo base_url().'pendaftaran/update_pendaftaran'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pendaftaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENDAFTARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran;?>">
                               <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No Rawat *</label>
                                        <input value="<?php echo $i['no_rawat'];?>" readonly required type="text" name="no_rawat" class="form-control" placeholder="No Rawat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Daftar *</label>
                                        <input required value="<?php echo $i['tanggal_daftar'];?>" type="date" name="tanggal_daftar" class="form-control" placeholder="Tanggal Daftar"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Poli Tujuan *</label>
                                        <select class="form-control" onchange="changeValue(this.value)" id="poli" name="id_poli" required>
                                          <option value="">--pilih poli--</option>
                                          <?php  $jsArray = "var prdName = new Array();\n"; foreach ($this->db->query("SELECT dokter.id_dokter,poli.id_poli,poli.nama_poli,dokter.nama_dokter FROM `dokter` left JOIN poli on poli.id_poli = dokter.id_poli;")->result_array() as $key):
                                          echo '<option value="'.$key['id_poli'].'">'.$key['nama_poli'].' | '.$key['nama_dokter'].'</option> ';
                                          $jsArray .= "prdName['" . $key['id_poli'] . "'] = {id_poli:'" . addslashes($key['id_poli']) . "',id_dokter:'" . addslashes($key['id_dokter']) . "'};\n";
                                          ?>                                            
                                        <?php endforeach;?>
                                        </select>
                                  </div> 
                                            <input type="hidden" name="id_dokter" id="id_dokter">
                                            <input type="hidden" name="id_poli" id="id_poli">


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Pasien *</label>
                                        <select class="form-control" name="id_pasien" required>
                                          <option value="">--pilih pasien--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pasien")->result_array() as $key):?>
                                          <option <?= ($i['id_pasien']==$key['id_pasien'])?'selected':'';?> value="<?php echo $key['id_pasien'];?>" ><?php echo $key['no_ktp'];?> | <?php echo $key['nama_pasien'];?> </option>
                                        <?php endforeach;?>
                                        </select>
                                  </div> 

                               

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Penanggung Jawab *</label>
                                        <input value="<?php echo $i['nama_penanggung_jawab'];?>" required type="text" name="nama_penanggung_jawab" class="form-control" placeholder="Nama Penanggung Jawab"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hubungan dengan penanggung Jawab *</label>
                                        <select class="form-control" required name="hubungan_dengan_penanggung_jawab">
                                          <option value="">--pilih hubungan dengan penanggung jawab--</option>
                                          <option <?= ($i['hubungan_dengan_penanggung_jawab']=="Saudara Kandung")?'selected':'';?> >Saudara Kandung</option>
                                          <option <?= ($i['hubungan_dengan_penanggung_jawab']=="Orang Tua")?'selected':'';?> >Orang Tua</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat Penanggung*</label>
                                        <textarea class="form-control" name="alamat_penanggung" required=""><?php echo $i['alamat_penanggung'];?></textarea>
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



   <?php foreach ($data_pendaftaran->result_array() as $i) :
                                            $id_pendaftaran=$i['id_pendaftaran'];
                                          ?>
       <form  action="<?php echo base_url().'pendaftaran/hapus_pendaftaran'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pendaftaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENDAFTARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pendaftaran;?>">
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
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('id_poli').value = prdName[x].id_poli;   
    document.getElementById('id_dokter').value = prdName[x].id_dokter;   
    };  
    </script> 

<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pendaftaran Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pendaftaran Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pendaftaran Berhasil di HAPUS'
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

