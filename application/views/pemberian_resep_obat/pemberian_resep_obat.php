
    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold"> PEMBERIAN RESEP OBAT</h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PEMBERIAN RESEP OBAT</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>No. Rawat</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Kode Diagnosa</th>
                                                        <th>Nama Penyakit</th>
                                                        <th>Kode Obat</th>
                                                        <th>Nama Obat</th>
                                                        <th>Dosis Aturan</th>
                                                        <th>Jumlah Obat</th>
                                                        <th>Keterangan</th>
                                                        <th>Tanggal Pemberian</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                    
                      <tbody>
                        <?php $no=1; foreach ($data_pemberian_resep_obat->result_array() as $i) :
                                                $id_pemberian_resep_obat=$i['id_pemberian_resep_obat'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td style="flex: 0 0 auto; min-width: 5em;"><?php echo $i['no_rawat'];?></td>
                                                <td><?php echo $i['nama_pasien'];?></td>
                                                <td><?php echo $i['kode_diagnosa'];?></td>
                                                <td><?php echo $i['nama_penyakit'];?></td>
                                                <td><?php echo $i['kode_obat'];?></td>
                                                <td><?php echo $i['nama_obat'];?></td>
                                                <td><?php echo $i['dosis_aturan_obat'];?></td>
                                                <td><?php echo $i['jumlah_obat'];?></td>
                                                <td><?php echo $i['keterangan'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_pemberian_resep']);?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pemberian_resep_obat;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pemberian_resep_obat;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url().'pemberian_resep_obat/simpan_pemberian_resep_obat'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PEMBERIAN RESEP OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tindakan Berobat *</label>
                                        <select class="form-control" name="id_riwayat_tindakan" required>
                                          <option value="">--pilih tindakan berobat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa  AND pendaftaran.tanggal_daftar = CURDATE();")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_riwayat_tindakan'];?>"><?php echo $key['no_rawat'];?> | <?php echo $key['nama_pasien'];?> | <?php echo $key['nama_tindakan'];?> | <?php echo tgl_indo($key['tanggal_tindakan']);?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Obat *</label>
                                        <select class="form-control" name="id_obat" required>
                                          <option value="">--pilih obat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM obat")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_obat'];?>"><?php echo $key['kode_obat'];?> | <?php echo $key['nama_obat'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Dosis Aturan *</label>
                                        <input required type="text" name="dosis_aturan_obat" class="form-control" placeholder="Dosis Aturan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Obat *</label>
                                        <input required type="number" name="jumlah_obat" class="form-control" placeholder="Jumlah Obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ></textarea>
                                  </div> 

                                  


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pemberian Obat *</label>
                                        <input required type="date" name="tanggal_pemberian_resep" class="form-control" placeholder="Tanggal Pemberian Obat"> 
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
  <?php foreach ($data_pemberian_resep_obat->result_array() as $i) :
                                            $id_pemberian_resep_obat=$i['id_pemberian_resep_obat'];
                                          ?>
       <form  action="<?php echo base_url().'pemberian_resep_obat/update_pemberian_resep_obat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pemberian_resep_obat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PEMBERIAN RESEP OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pemberian_resep_obat" value="<?php echo $id_pemberian_resep_obat;?>">


                               



                                    <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tindakan Berobat *</label>
                                        <select class="form-control" name="id_riwayat_tindakan" required>
                                          <option value="">--pilih tindakan berobat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa")->result_array() as $key):?>
                                          <option <?= ($i['id_riwayat_tindakan']==$key['id_riwayat_tindakan'])?'selected':'';?> value="<?php echo $key['id_riwayat_tindakan'];?>"><?php echo $key['no_rawat'];?> | <?php echo $key['nama_pasien'];?> | <?php echo $key['nama_tindakan'];?> | <?php echo tgl_indo($key['tanggal_tindakan']);?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Obat *</label>
                                        <select class="form-control" name="id_obat" required>
                                          <option value="">--pilih obat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM obat")->result_array() as $key):?>
                                          <option <?= ($i['id_obat']==$key['id_obat'])?'selected':'';?> value="<?php echo $key['id_obat'];?>"><?php echo $key['kode_obat'];?> | <?php echo $key['nama_obat'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Dosis Aturan *</label>
                                        <input value="<?php echo $i['dosis_aturan_obat'];?>" required type="text" name="dosis_aturan_obat" class="form-control" placeholder="Dosis Aturan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Jumlah Obat *</label>
                                        <input value="<?php echo $i['jumlah_obat'];?>" required type="number" name="jumlah_obat" class="form-control" placeholder="Jumlah Obat"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan </label>
                                        <textarea class="form-control" name="keterangan" ><?php echo $i['keterangan'];?></textarea>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Pemberian Obat *</label>
                                        <input value="<?php echo $i['tanggal_pemberian_resep'];?>" required type="date" name="tanggal_pemberian_resep" class="form-control" placeholder="Tanggal Pemberian Obat"> 
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



   <?php foreach ($data_pemberian_resep_obat->result_array() as $i) :
                                            $id_pemberian_resep_obat=$i['id_pemberian_resep_obat'];
                                          ?>
       <form  action="<?php echo base_url().'pemberian_resep_obat/hapus_pemberian_resep_obat'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pemberian_resep_obat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PEMBERIAN RESEP OBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pemberian_resep_obat;?>">
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
  text: 'Pemberian Resep Obat Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pemberian Resep Obat Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pemberian Resep Obat Berhasil di HAPUS'
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

