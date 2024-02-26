<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SISTEM PELAYANAN KESEHATAN PUSKESMAS BANJARBARU SELATAN BERBASIS WEB</title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>/assets/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/logo2.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/template/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" >
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="<?php echo base_url();?>/assets/b2.png" alt="branding logo" width="450px">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2" style="background-color: #c2c9f3!important;">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <center>
                                                    <img src="<?php echo base_url();?>assets/logo2.png" width="120px;">
                                                </center>
                                                <br>
                                                <h4 class="mb-0" style="text-align: center;">SISTEM PELAYANAN PENDAFTARAN ONLINE DAN KESEHATAN PADA PUSKESMAS BANJARBARU SELATAN</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form class="form-horizontal" action="<?php echo base_url();?>login/aksi_login" method="POST" >
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="username" class="form-control" id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input autocomplete="new-password" type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                            <!--    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>  -->
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>                                                    
                                                </form>
                                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target=".bd-example-modal-lg">	Daftar</button>
                                            </div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <form  action="<?php echo base_url('pengguna/simpan_user');?>" method="POST">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-primary white">
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
                                        <input  required type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                  </div> 

                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Email</label>
                                        <input type="email" class="form-control" name="email"  placeholder="Email" >
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

  <script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di SIMPAN, Silahkan LOGIN',
})
 </script>
<?php endif; ?>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Daftar Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form action="<?= base_url('daftaruser/daftar') ?>" method="post">
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
                                        <input required type="number" name="no_ktp" class="form-control" maxlength="16" placeholder="No. KTP"> 
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
                                        <label class="form-label" >Nomor BPJS </label>
                                        <input  type="text" name="no_bpjs" class="form-control" placeholder="Kosongkan Jika Anda Daftar Pasien Umum"> 
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
                                        <label class="form-label" >Alamat Lengkap *</label>
                                        <textarea class="form-control" name="alamat" required=""></textarea>
                                  </div> 
                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                    <label class="form-label" >Username *</label>
                                    <input required type="text" name="username" class="form-control" placeholder="Username"> 
                                </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password *</label>
                                        <input required type="password" name="password" class="form-control" placeholder="Password">
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >No HP</label>
                                        <input type="text" class="form-control" name="no_hp"  placeholder="No HP" required >
                                        <input type="hidden" name="level" value="User" id="">
                                  </div> 
                                  <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Email</label>
                                        <input type="email" class="form-control" required placeholder="Email"name="email"  placeholder="Email" >
                                        <input type="hidden" value="VERIFIKASI" name="status" id="">
                                    </div> 
                                
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
            </form>
		</div>
	</div>
</div>


    <script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
    <?php if($this->session->flashdata('berhasil_login') == TRUE): ?>
        <script type="text/javascript">
        Swal.fire({
        icon: 'success',
        text: 'Login Berhasil!',
        })
        </script>
    <?php endif; ?>

    <?php if($this->session->flashdata('data_salah_login') == TRUE): ?>
        <script type="text/javascript">
        Swal.fire({
        icon: 'error',
        text: 'Gagal, Periksa Password!',
        })
        </script>
    <?php endif; ?>

    <?php if($this->session->flashdata('gagal_login') == TRUE): ?>
        <script type="text/javascript">
        Swal.fire({
        icon: 'error',
        text: 'Data Tidak Ditemukan!',
        })
        </script>
    <?php endif; ?>
    

    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>/assets/template/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>