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
                        <div class="card bg-authentication rounded-3 mb-0">
                        <div class="row">
                                <div class="col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2" style="background-color: #c2c9f3!important;">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <center>
                                                    <img src="<?php echo base_url();?>assets/logo2.png" width="120px;">
                                                </center>
                                                <br>
                                                <h4 class="mb-0" style="text-align: center;">
                                                DAFTAR PENGGUNA</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                    <form method="post" action="<?php echo base_url('daftaruser/daftar');?>"class="form-horizontal">
                                            <div class="col-12 " style="margin-bottom: 12px;">
                                        <label class="form-label" >Username *</label>
                                        <input required type="text" name="username" class="form-control" placeholder="Username"> 
                                        </div> 

                                        <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                                <label class="form-label" >Password *</label>
                                                <input required type="password" name="password" class="form-control" placeholder="Password">
                                        </div> 
                                        <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                                <label class="form-label" >No HP</label>
                                                <input type="text" class="form-control" name="no_hp"  placeholder="No HP" >
                                        </div> 

                                        <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                                <label class="form-label" >Email</label>
                                                <input type="email" class="form-control" name="email"  placeholder="Email" >
                                        </div> 
                                               <center><button type="submit" class="btn mb-1 btn-primary">Submit</button></center>
                                               <center><a href="<?php echo base_url('login');?>" class="btn btn-primary">Kembali</a></center>
                                    </form>
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
  <script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Pengguna Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>
    


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