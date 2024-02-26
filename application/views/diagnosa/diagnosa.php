
    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">DIAGNOSA PENYAKIT</h2>
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
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH DIAGNOSA PENYAKIT</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                          <tr>
                            <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                                                        <th>Kode Diagnosa</th>
                                                        <th>Nama Penyakit</th>
                                                        <th>Ciri-ciri penyakit</th>
                                                        <th>Keterangan</th>
                                                        <th>Ciri-ciri Umum</th>
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                    
                      <tbody>
                        <?php $no=1; foreach ($data_diagnosa->result_array() as $i) :
                                                $id_diagnosa=$i['id_diagnosa'];
                                              ?>
                         <tr>
                                              
                                                <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                                <td><?php echo $i['kode_diagnosa'];?></td> 
                                                <td><?php echo $i['nama_penyakit'];?></td>
                                                <td><?php echo $i['ciri_ciri_penyakit'];?></td>
                                                <td><?php echo $i['keterangan'];?></td>
                                                <td><?php echo $i['ciri_ciri_umum'];?></td>
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_diagnosa;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_diagnosa;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url().'diagnosa/simpan_diagnosa'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH DIAGNOSA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                             <?php 
$cek = $this->db->query("SELECT max(kode_diagnosa) AS no FROM diagnosa order by kode_diagnosa desc limit 1");
$data = $cek->row_array();
$no2 = sprintf('%03d',$data['no']+1);
?> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Diagnosa *</label>
                                        <input value="<?php echo $no2;?>" readonly required type="text" name="kode_diagnosa" class="form-control" placeholder="Kode Diagnosa"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Penyakit *</label>
                                        <input required type="text" name="nama_penyakit" class="form-control" placeholder="Nama Penyakit"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ciri-Ciri Penyakit *</label>
                                        <input required type="text" name="ciri_ciri_penyakit" class="form-control" placeholder="Ciri-Ciri Penyakit"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan *</label>
                                        <input required type="text" name="keterangan" class="form-control" placeholder="Keterangan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ciri-Ciri Umum *</label>
                                        <input required type="text" name="ciri_ciri_umum" class="form-control" placeholder="Ciri-Ciri Umum"> 
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
  <?php foreach ($data_diagnosa->result_array() as $i) :
                                            $id_diagnosa=$i['id_diagnosa'];
                                          ?>
       <form  action="<?php echo base_url().'diagnosa/update_diagnosa'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_diagnosa;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE DIAGNOSA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_diagnosa" value="<?php echo $id_diagnosa;?>">


                               


                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Kode Diagnosa *</label>
                                        <input readonly value="<?php echo $i['kode_diagnosa'];?>" required type="text" name="kode_diagnosa" class="form-control" placeholder="Kode Diagnosa"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Nama Penyakit *</label>
                                        <input value="<?php echo $i['nama_penyakit'];?>" required type="text" name="nama_penyakit" class="form-control" placeholder="Nama Penyakit"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ciri-Ciri Penyakit *</label>
                                        <input value="<?php echo $i['ciri_ciri_penyakit'];?>" required type="text" name="ciri_ciri_penyakit" class="form-control" placeholder="Ciri-Ciri Penyakit"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Keterangan *</label>
                                        <input value="<?php echo $i['keterangan'];?>" required type="text" name="keterangan" class="form-control" placeholder="Keterangan"> 
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Ciri-Ciri Umum *</label>
                                        <input value="<?php echo $i['ciri_ciri_umum'];?>" required type="text" name="ciri_ciri_umum" class="form-control" placeholder="Ciri-Ciri Umum"> 
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



   <?php foreach ($data_diagnosa->result_array() as $i) :
                                            $id_diagnosa=$i['id_diagnosa'];
                                          ?>
       <form  action="<?php echo base_url().'diagnosa/hapus_diagnosa'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_diagnosa;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS DIAGNOSA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_diagnosa;?>">
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
  text: 'Diagnosa Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Diagnosa Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Diagnosa Behasil di HAPUS'
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

