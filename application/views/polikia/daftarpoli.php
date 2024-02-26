    <div class="main-panel">
      <div class="content">
        <div class="panel-header " style="background-color: #f39c12!important;">
          <div class="page-inner py-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">POLI KIA</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-md-12">
              <?php if($this->session->userdata('level')=='Administration'){ ?>
              <div class="card">
                <div class="card-header">
                <label class="mb-1"><b>PENDAFTARAN</b></label>
                </div>
                <div class="card-body">
                
                    <div class="form-group form-group-default">
                        <label>Input</label>
                        <input id="Name" type="text" class="form-control" placeholder="Fill Name">
                    </div>

                    <div class="form-group form-group-default">
                        <label>Select</label>
                        <select class="form-control" id="formGroupDefaultSelect">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <label class="mt-3 mb-3"><b>Form Floating Label</b></label>
                    <div class="form-group form-floating-label">
                        <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
                        <label for="inputFloatingLabel" class="placeholder">Input</label>
                    </div>

                    <div class="form-group form-floating-label">
                        <select class="form-control input-border-bottom" id="selectFloatingLabel" required="">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <label for="selectFloatingLabel" class="placeholder">Select</label>
                    </div>

                    <div class="form-group form-floating-label">
                        <input id="inputFloatingLabel2" type="text" class="form-control input-solid" required="">
                        <label for="inputFloatingLabel2" class="placeholder">Input</label>
                    </div>

                    <div class="form-group form-floating-label">
                        <select class="form-control input-solid" id="selectFloatingLabel2" required="">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <label for="selectFloatingLabel2" class="placeholder">Select</label>
                    </div>
                  </div>
                </div>
              </div>
              <?php }else{ 
              $nik = $this->session->userdata('no_ktp');
              $cek = $this->db->query("SELECT pasien.no_ktp as psien from pasien left join pengguna on pengguna.no_ktp = pasien.no_ktp where pasien.no_ktp = '$nik'")->num_rows();
                if($cek < 1){?>
                  <div class="card">
                    <div class="card-header">
                      <label class="mb-1"><b>SILAHKAN DAFTAR TERLEBIH DAHULU</b></label>
                    </div>
                    <div class="card-body">
                      <h5 class="card-subtitle text-muted">Anda Belum Terdaftar Sebagai Pasien</h5> <br>
                    </div>
									</div>
               <?php }else{?>
                <div class="card">
                  <div class="card-header">
                  <label class="mb-1"><b>PENDAFTARAN</b></label>
                  </div>
                  <div class="card-body">
                    <form  action="<?php echo base_url().'pendaftaran/simpan_pendaftaran'?>" method="post" enctype="multipart/form-data">
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
                                        <label class="form-label" >Dokter </label>
                                          <?php foreach ($this->db->query("SELECT * FROM dokter LEFT JOIN poli ON dokter.id_poli = poli.id_poli where dokter.id_poli= '3';")->result_array() as $key):?>
                                          <input type="hidden" name="id_dokter" value="<?php echo $key['id_dokter']?>"id="">
                                          <input class="form-control" readonly value="<?php echo $key['nomor_induk_dokter'];?> | <?php echo $key['nama_dokter'];?>" >
                                          <?php endforeach;?>
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Poli Tujuan *</label>
                                        <input type="hidden" name="id_poli" value="<?php echo '3' ?>>"id="">
                                        <input type="text" class="form-control" readonly value="<?php echo 'POLI KIA'?>"id="">
                                  </div> 


                                     <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                     <label class="form-label" >Pasien *</label>
                                      <?php 
                                      $nik = $this->session->userdata('no_ktp');
                                      foreach ($this->db->query("SELECT * FROM pasien LEFT JOIN pengguna ON pasien.no_ktp = pengguna.no_ktp WHERE pasien.no_ktp = '$nik';")->result() as $c) :?>
                                        <input type="text" class="form-control" readonly value="<?= $c->nama_pasien ?>" id="">
                                        <input type="hidden" class="form-control" readonly value="<?= $c->id_pasien ?>" name="id_pasien">
                                      <?php endforeach; ?>
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
                                          <option>Suami</option>

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
                    </form>
                  </div>
                </div>
              <?php }?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
