<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/adminto/assets/images/favicon.ico">

  <title>Form Lupa Kata Sandi</title>

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
      <a href="index.html" class="logo"><span>Simale<span>Ja</span></span></a>
      <h5 class="text-muted m-t-0 font-600">Responsive Admin Dashboard</h5>
    </div>
    <div class="m-t-40 card-box">
      <div class="text-center">
        <h4 class="text-uppercase font-bold m-b-0">Forgot Password</h4>
      </div>


      <div class="p-20">
        <form class="form-horizontal m-t-20" method="post" action="<?= base_url('auth/forgot_password') ?>">
          <?= $this->session->flashdata('massage'); ?>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="text" id="email" name="email" placeholder="Email"
                value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group text-center m-t-20 m-b-0">
            <div class="col-xs-12">
              <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Send
                Email</button>
            </div>
          </div>
      </div>
      </form>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center">
        <p class="text-muted">Sudah punya akun?<a href="auth" class="text-primary m-l-5"><b>Log
              In</b></a></p>
      </div>
    </div>
  </div>
  <!-- end card-box-->
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