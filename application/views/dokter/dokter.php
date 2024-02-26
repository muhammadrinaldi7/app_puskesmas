
    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">DOKTER </h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH DOKTER </button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nomor Induk Dokter</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Poli</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                    
                      <tbody>
                        <?php $no=1; foreach ($data_dokter->result_array() as $i) :
                                                $id_dokter=$i['id_dokter'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['nomor_induk_dokter'];?></td> 
                                                <td><?php echo $i['nama_dokter'];?></td>
                                                <td><?php echo $i['jenis_kelamin'];?></td>
                                                <td><?php echo $i['tempat_lahir'];?></td>
                                                <td><?php echo tgl_indo($i['tgl_lahir']);?></td>
                                                <td><?php echo $i['alamat'];?></td>
                                                <td><?php echo $i['nama_poli'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_masuk']);?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_dokter;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_dokter;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url().'dokter/simpan_dokter'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DOKTER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Induk Dokter *</label>
                                        <input  required type="text" name="nomor_induk_dokter" class="form-control" placeholder="No. Induk Dokter"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Dokter *</label>
                                        <input  required type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Poli  *</label>
                                         <select class="form-control" name="id_poli" required>
                                          <option value="">--pilih poli--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM poli")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_poli'];?>" ><?php echo $key['nama_poli'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin  *</label>
                                         <select class="form-control" name="jenis_kelamin" required>
                                          <option value="">--pilih jenis kelamin--</option>
                                          <option >Laki-Laki</option>
                                          <option >Perempuan</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir  *</label>
                                        <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir "> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input required type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" required name="alamat"></textarea>
                                  </div> 
                                  
                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
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
  <?php foreach ($data_dokter->result_array() as $i) :
                                            $id_dokter=$i['id_dokter'];
                                          ?>
       <form  action="<?php echo base_url().'dokter/update_dokter'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_dokter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DOKTER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_dokter" value="<?php echo $id_dokter;?>">


                               


                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Induk Dokter *</label>
                                        <input value="<?php echo $i['nomor_induk_dokter'];?>"  required type="text" name="nomor_induk_dokter" class="form-control" placeholder="No. Induk Dokter"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Dokter *</label>
                                        <input value="<?php echo $i['nama_dokter'];?>"  required type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Poli  *</label>
                                         <select class="form-control" name="id_poli" required>
                                          <option value="">--pilih poli--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM poli")->result_array() as $key):?>
                                          <option <?= ($i['id_poli']==$key['id_poli'])?'selected':'';?> value="<?php echo $key['id_poli'];?>" ><?php echo $key['nama_poli'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jenis Kelamin  *</label>
                                         <select class="form-control" name="jenis_kelamin" required>
                                          <option value="">--pilih jenis kelamin--</option>
                                          <option <?= ($i['jenis_kelamin']=="Laki-Laki")?'selected':'';?> >Laki-Laki</option>
                                          <option <?= ($i['jenis_kelamin']=="Perempuan")?'selected':'';?> >Perempuan</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tempat Lahir  *</label>
                                        <input value="<?php echo $i['tempat_lahir'];?>" required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir "> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Lahir *</label>
                                        <input value="<?php echo $i['tgl_lahir'];?>" required type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Alamat *</label>
                                        <textarea class="form-control" required name="alamat"><?php echo $i['alamat'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Masuk *</label>
                                        <input value="<?php echo $i['tanggal_masuk'];?>" required type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"> 
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



   <?php foreach ($data_dokter->result_array() as $i) :
                                            $id_dokter=$i['id_dokter'];
                                          ?>
       <form  action="<?php echo base_url().'dokter/hapus_dokter'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_dokter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DOKTER</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_dokter;?>">
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
  text: 'Dokter Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Dokter Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Dokter Berhasil di HAPUS'
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

