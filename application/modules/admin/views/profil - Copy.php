<!-- form Uploads -->
<link href="<?php echo base_url() ?>assets/adminto/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
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
                  <input type="text" id="nama" name="nama" class="form-control" value="<?= $userr['name']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input type="text" name="email" id="email" class="form-control" value="<?= $userr['email']; ?>">
                </div>
              </div>
              <button type="submit" class=" mt-4 btn btn-block btn btn-secondary float-right btn-info" id="klik">Click To Update</button>
            </div>
            </form>
            <div class="clearfix"></div>
          </div>
        </div>

        <!--/ meta -->
        </form>
      </div>
    </div>
  </div>
</div>