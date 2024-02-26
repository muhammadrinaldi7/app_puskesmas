
    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold"> TINDAKAN BEROBAT</h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH TINDAKAN</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Nama Tindakan</th>
                                                        <th>No. Rawat</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Status Pendaftaran</th>
                                                        <th>Kode Diagnosa</th>
                                                        <th>Nama Penyakit</th>
                                                        <th>Ciri-Ciri Penyakit</th>
                                                        <th>Hasil Periksa</th>
                                                        <th>Tanggal Tindakan</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                    
                      <tbody>
                        <?php $no=1; foreach ($data_riwayat_tindakan->result_array() as $i) :
                                                $id_riwayat_tindakan=$i['id_riwayat_tindakan'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['nama_tindakan'];?></td> 
                                                <td style="flex: 0 0 auto; min-width: 5em;"><?php echo $i['no_rawat'];?></td>
                                                <td><?php echo $i['nama_pasien'];?></td>
                                                <td><?php echo $i['status_pendaftaran'];?></td>
                                                <td><?php echo $i['kode_diagnosa'];?></td>
                                                <td><?php echo $i['nama_penyakit'];?></td>
                                                <td><?php echo $i['ciri_ciri_penyakit'];?></td>
                                                <td><?php echo $i['hasil_periksa'];?></td>
                                                <td><?php echo tgl_indo($i['tanggal_tindakan']);?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_riwayat_tindakan;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_riwayat_tindakan;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url().'riwayat_tindakan/simpan_riwayat_tindakan'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH TINDAKAN BEROBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Tindakan *</label>
                                        <input required type="text" name="nama_tindakan" class="form-control" placeholder="Nama Tindakan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Rawat *</label>
                                        <select class="form-control" name="id_pendaftaran" required>
                                          <option value="">--pilih no rawat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien  AND pendaftaran.tanggal_daftar = CURDATE();")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_pendaftaran'];?>"><?php echo $key['no_rawat'];?> | <?php echo $key['nama_pasien'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Diagnosa *</label>
                                        <select class="form-control" name="id_diagnosa" required>
                                          <option value="">--pilih diagnosa--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM diagnosa")->result_array() as $key):?>
                                          <option value="<?php echo $key['id_diagnosa'];?>"><?php echo $key['kode_diagnosa'];?> | <?php echo $key['nama_penyakit'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hasil Periksa *</label>
                                        <input required type="text" name="hasil_periksa" class="form-control" placeholder="Hasil Periksa"> 
                                  </div> 

                                  


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Tindakan *</label>
                                        <input required type="date" name="tanggal_tindakan" class="form-control" placeholder="Tanggal Tindakan"> 
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
  <?php foreach ($data_riwayat_tindakan->result_array() as $i) :
                                            $id_riwayat_tindakan=$i['id_riwayat_tindakan'];
                                          ?>
       <form  action="<?php echo base_url().'riwayat_tindakan/update_riwayat_tindakan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_riwayat_tindakan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE TINDAKAN BEROBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_riwayat_tindakan" value="<?php echo $id_riwayat_tindakan;?>">
                                   <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Tindakan *</label>
                                        <input value="<?php echo $i['nama_tindakan'];?>" required type="text" name="nama_tindakan" class="form-control" placeholder="Nama Tindakan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No. Rawat *</label>
                                        <select class="form-control" name="id_pendaftaran" required>
                                          <option value="">--pilih no rawat--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien")->result_array() as $key):?>
                                          <option <?= ($i['id_pendaftaran']==$key['id_pendaftaran'])?'selected':'';?> value="<?php echo $key['id_pendaftaran'];?>"><?php echo $key['no_rawat'];?> | <?php echo $key['nama_pasien'];?></option>
                                        <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Diagnosa *</label>
                                        <select class="form-control" name="id_diagnosa" required>
                                          <option value="">--pilih diagnosa--</option>
                                          <?php foreach ($this->db->query("SELECT * FROM diagnosa")->result_array() as $key):?>
                                          <option <?= ($i['id_diagnosa']==$key['id_diagnosa'])?'selected':'';?> value="<?php echo $key['id_diagnosa'];?>"><?php echo $key['kode_diagnosa'];?> | <?php echo $key['nama_penyakit'];?></option>
                                          <?php endforeach;?>
                                        </select>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Hasil Periksa *</label>
                                        <input value="<?php echo $i['hasil_periksa'];?>" required type="text" name="hasil_periksa" class="form-control" placeholder="Hasil Periksa"> 
                                  </div> 

                             

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Tanggal Tindakan *</label>
                                        <input value="<?php echo $i['tanggal_tindakan'];?>" required type="date" name="tanggal_tindakan" class="form-control" placeholder="Tanggal Tindakan"> 
                                  </div> 

                                 
                            
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                                <table border="1" cellspacing="0" width="100%" style="font-size: 12px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
            <tr>
                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                <th>No Rawat</th>
                <th>Nama Poli</th>
                <th>Tindakan</th>
                <th>Hasil Periksa</th>
                <th>Pemberian Obat</th>
            </tr>
        </thead>
                    
        <tbody>
            <?php
             $id_pasien = $i['id_pasien'];
             $data_rm1 = $this->db->query("SELECT pasien.*,pendaftaran.*,poli.*,riwayat_tindakan.*,obat.*,pemberian_resep_obat.* FROM pasien LEFT JOIN pendaftaran on pasien.id_pasien=pendaftaran.id_pasien LEFT JOIN poli on poli.id_poli = pendaftaran.id_poli LEFT JOIN riwayat_tindakan on riwayat_tindakan.id_pendaftaran = pendaftaran.id_pendaftaran LEFT JOIN pemberian_resep_obat on pemberian_resep_obat.id_riwayat_tindakan = riwayat_tindakan.id_riwayat_tindakan LEFT JOIN obat on obat.id_obat = pemberian_resep_obat.id_obat WHERE pasien.id_pasien = '$id_pasien';")->result();
             $no=1; foreach($data_rm1 as $i):?>
            <tr>   
                <td style="flex: 0 0 auto; min-width: 2em;"><center><?php echo $no++;?></center></td>
                <td><?= $i->no_rawat ?></td> 
                <td><?= $i->nama_poli ?></td>
                <td><?= $i->nama_tindakan ?></td>
                <td><?= $i->hasil_periksa ?></td>
                <td><?= $i->nama_obat ?></td>
            </tr>
            <?php endforeach ?>
                
                </tbody>
              </table>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
   
 <?php endforeach;?>



   <?php foreach ($data_riwayat_tindakan->result_array() as $i) :
                                            $id_riwayat_tindakan=$i['id_riwayat_tindakan'];
                                          ?>
       <form  action="<?php echo base_url().'riwayat_tindakan/hapus_riwayat_tindakan'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_riwayat_tindakan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS TINDAKAN BEROBAT</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_riwayat_tindakan;?>">
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
  text: 'Tindakan Berobat Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Tindakan Berobat Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Tindakan Berobat Berhasil di HAPUS'
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

