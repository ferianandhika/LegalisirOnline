<div class="content-page">

  <!-- form Uploads -->

  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 ">
          <div class="bg-picture card-box" id="detail">
            <h4 class="text-info m-t-0 header-title">Detail Akun</h4>
            <hr>
            <div class="profile-info-name">
              <img src="<?= base_url('assets/img/profile/') . $userr['image'] ?>">
              <div class="profile-info-detail">
                <h4 class="m-0">
                  <i class="fa fa-user"></i> <?= $userr['name']; ?>
                </h4>
                <hr>
                <form method="post" action="<?php echo base_url(); ?>admin/profil/update">
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Username</label>
                    <div class="col-10">
                      <input type="text" class="form-control" value="<?= $userr['name']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                      <input type="text" name="email" class="form-control" value="<?= $userr['email']; ?>" required>
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">Gambar</label>
                    <div class="col-10">
                      <input type="file" name="gambar" class="form-control">
                    </div>
                  </div> -->
                  <button type="submit" class=" mt-4 btn btn-block btn btn-secondary float-right btn-info"
                    id="klik">Ubah
                    Profil</button>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>

          <!--/ meta -->
          </form>
        </div>
      </div>
    </div>
  </div>