

		<div class="main-panel">
			<div class="content">
	   <div class="panel-header " style="background-color: #f39c12!important;">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">LAPORAN DATA REKAM MEDIS</h2>
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
									REKAM MEDIS PASIEN
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
	                                              <td style="text-align: right;">
	                                                <div class="btn-group" role="group" aria-label="Basic example">
	                                              <a style="margin: 2px;" href="<?php echo base_url('pasien/cetak/'.$id_pasien);?>" class="btn btn-danger mdi mdi-pencil btn-sm"><i class="fa fa-print"></i> CETAK</a>
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


   