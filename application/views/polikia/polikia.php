
    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">POLIKIA</h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH POLIKIA</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No. Rekamedis</th>
                                                        <th>No. KTP</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Nama Tindakan</th>
                                                        <th>Biaya</th>
                                                        <th>Ditangani Oleh</th>
                                                        <th>Keterangan</th>
                                                        <th>Tanggal Tindakan</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                    
                      <tbody>
                        <?php $no=1; foreach ($data_polikia->result_array() as $i) :
                                                $id_polikia=$i['id_polikia'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['no_rekamedis'];?></td> 
                                                <td><?php echo $i['no_ktp'];?></td>
                                                <td><?php echo $i['nama_pasien'];?></td>
                                                <td><?php echo $i['nama_tindakan'];?></td>
                                                <td><?php echo rupiah($i['biaya']);?></td>
                                                <td><?php echo $i['ditangani_oleh'];?></td>
                                                <td><?php echo $i['keterangan'];?></td>
                                                <td><?php echo tgl_indo($i['tgl_tindakan']);?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_polikia;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_polikia;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url().'polikia/simpan_polikia'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH POLIKIA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Pasien *</label>
                                        <select class="form-control" name="id_pasien" required>
                                          <option value="">--pilih pasien--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pendaftaran pf LEFT JOIN pasien pn on pn.id_pasien = pf.id_pasien where pf.id_poli = '3' group by pf.id_pasien")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_pasien'];?>" ><?php echo $key['no_ktp'];?> | <?php echo $key['nama_pasien'];?> </option>
                                        <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Tindakan *</label>
                                        <input required type="text" name="nama_tindakan" class="form-control" placeholder="Nama Tindakan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya *</label>
                                        <input required type="number" name="biaya" class="form-control" placeholder="Biaya"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ditangani Oleh *</label>
                                        <select class="form-control" required name="ditangani_oleh">
                                          <option value="">--pilih--</option>
                                          <option>Dokter</option>
                                          <option>Petugas</option>
                                          <option>Dokter dan Petugas</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Tindakan *</label>
                                        <input required value="<?php echo date('Y-m-d');?>" type="date" name="tgl_tindakan" class="form-control" placeholder="Tanggal Tindakan"> 
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
  <?php foreach ($data_polikia->result_array() as $i) :
                                            $id_polikia=$i['id_polikia'];
                                          ?>
       <form  action="<?php echo base_url().'polikia/update_polikia'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_polikia;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE POLIKIA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_polikia" value="<?php echo $id_polikia;?>">


                               

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
                                        <label class="form-label" >Nama Tindakan *</label>
                                        <input value="<?php echo $i['nama_tindakan'];?>" required type="text" name="nama_tindakan" class="form-control" placeholder="Nama Tindakan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Biaya *</label>
                                        <input value="<?php echo $i['biaya'];?>" required type="number" name="biaya" class="form-control" placeholder="Biaya"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ditangani Oleh *</label>
                                        <select class="form-control" required name="ditangani_oleh">
                                          <option value="">--pilih--</option>
                                          <option <?= ($i['ditangani_oleh']=="Dokter")?'selected':'';?> >Dokter</option>
                                          <option <?= ($i['ditangani_oleh']=="Petugas")?'selected':'';?> >Petugas</option>
                                          <option <?= ($i['ditangani_oleh']=="Dokter dan Petugas")?'selected':'';?> >Dokter dan Petugas</option>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ><?php echo $i['keterangan'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Tindakan *</label>
                                        <input value="<?php echo $i['tgl_tindakan'];?>" required  type="date" name="tgl_tindakan" class="form-control" placeholder="Tanggal Tindakan"> 
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



   <?php foreach ($data_polikia->result_array() as $i) :
                                            $id_polikia=$i['id_polikia'];
                                          ?>
       <form  action="<?php echo base_url().'polikia/hapus_polikia'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_polikia;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS POLIKIA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_polikia;?>">
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
  text: 'Polikia Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Polikia Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Polikia Behasil di HAPUS'
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

