    <!-- ============================================================== -->
    <!-- Start right Content here -->

    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <h1>DASHBOARD</h1>

          <?php foreach ($prodi as $data) : ?>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card-box widget-user">
                <div>
                  <img src=" <?php echo base_url() ?>assets/admin/images/users/avatar-3.jpg"
                    class="img-responsive rounded-circle" alt="user">
                  <div class="wid-u-info">
                    <h5 class="mt-0 m-b-5"><?= $data['nama_prodi']; ?></h5>
                    <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                    <small class="text-warning"><b>Admin</b></small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <!-- end col -->

            <!-- <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
              <div>
                <img src="<?php echo base_url() ?>assets/admin/images/users/avatar-2.jpg"
                  class="img-responsive rounded-circle" alt="user">
                <div class="wid-u-info">
                  <h5 class="mt-0 m-b-5"> Michael Zenaty</h5>
                  <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                  <small class="text-custom"><b>Support Lead</b></small>
                </div>
              </div>
            </div>
          </div> --> -->
            <!-- end col -->

            <!-- <div class="col-xl-3 col-md-6">
              <div class="card-box widget-user">
                <div>
                  <img src="<?php echo base_url() ?>assets/admin/images/users/avatar-1.jpg" class="img-responsive rounded-circle" alt="user">
                  <div class="wid-u-info">
                    <h5 class="mt-0 m-b-5">Stillnotdavid</h5>
                    <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                    <small class="text-success"><b>Designer</b></small>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- end col -->

            <!-- <div class="col-xl-3 col-md-6">
              <div class="card-box widget-user">
                <div>
                  <img src="<?php echo base_url() ?>assets/admin/images/users/avatar-10.jpg" class="img-responsive rounded-circle" alt="user">
                  <div class="wid-u-info">
                    <h5 class="mt-0 m-b-5">Tomaslau</h5>
                    <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                    <small class="text-info"><b>Developer</b></small>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- end col
        </div>
        <!-- end row -->



          </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
          2016 - 2019 © admin. Coderthemes.com
        </footer>

      </div>


      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->