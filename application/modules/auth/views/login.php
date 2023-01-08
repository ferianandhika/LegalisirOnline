<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="novalassalam | vkb">
  <meta name="robots" content="none">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/adminto/assets/images/favicon.ico">
  <title>Form Login </title>
  <!-- App css -->
  <link href="<?php echo base_url() ?>assets/adminto/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/adminto/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/adminto/assets/css/style.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/modernizr.min.js"></script>
</head>

<body>
  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class="text-center">
      <a href="index.html" class="logo"><span>Simale<span class="ml-2">Ja</span></span></a>
    </div>
    <div class="m-t-40 card-box">
      <div class="text-center">
        <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
      </div>

      <?= $this->session->flashdata('massage'); ?>

      <div class="p-20">
        <form class="form-horizontal m-t-20" method="post" action="<?= base_url('auth') ?>">
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="text" id="email" name="email" placeholder="Email"
                value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="password" id="password" name="password" placeholder="Password">
              <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <!-- <div class="form-group ">
            <div class="col-xs-12">
              <div class="checkbox checkbox-custom">
                <input id="checkbox-signup" type="checkbox" name="remember">
                <label for="checkbox-signup">
                  Remember me
                </label>
              </div>
            </div>
          </div> -->
          <div class="form-group text-center m-t-30">
            <div class="col-xs-12">
              <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log
                In</button>
            </div>
          </div>
          <div class="form-group m-t-30 m-b-0">
            <div class="col-sm-12">
              <a href="<?= base_url('auth/forgot_password') ?>" class="text-muted"><i class="fa fa-lock m-r-5"></i> Lupa
                Sandi kamu?</a>
            </div>
          </div>
          <div class="form-group m-t-30 m-b-0">
            <div class="col-sm-12">
              <a href="<?= base_url('auth/registration') ?>" class="text-muted"><i class="fa fa-registered m-r-5"></i>
                Registrasi</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- end card-box-->
  </div>
  <!-- end wrapper page -->
  <!-- jQuery  -->
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/detect.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/fastclick.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.blockUI.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/waves.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.nicescroll.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.slimscroll.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.scrollTo.min.js"></script>
  <!-- App js -->
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.core.js"></script>
  <script src="<?php echo base_url() ?>assets/adminto/assets/js/jquery.app.js"></script>
</body>

</html>