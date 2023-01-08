<!-- form Uploads -->
<link href="<?php echo base_url() ?>assets/adminto/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet"
  type="text/css" />
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="bg-picture card-box" id="detail">
          <h4 class="text-info m-t-0 header-title">Ubah Password</h4>
          <hr>
          <div class="profile-info-name">
            <img src="<?= base_url('assets/img/profile/') . $userr['image'] ?>">
            <div class="profile-info-detail">
              <h4 class="m-0">
                <i class="fa fa-user"></i> <?= $userr['name']; ?>
              </h4>
              <hr>
              <form method="post" action="<?php echo base_url(); ?>admin/profil/updatePassword">
                <!-- <div class="form-group row">
                <label class="col-2 col-form-label">Password Lama</label>
                <div class="col-10">
                  <input type="text" id="old_password" name="old_password" class="form-control" placeholder="Ketikkan Password Lama Anda" onchange="cekPassword()">
                  <small style="color:#ff5b5b; display: none" id="txtOldPassword">NIM sesuai dengan ijasah kelulusan</small>
                </div>
              </div> -->
                <div class="form-group row">
                  <label class="col-2 col-form-label">Password Baru</label>
                  <div class="col-10">
                    <input type="text" id="new_password" name="new_password" class="form-control"
                      placeholder="Ketikkan Password Baru Anda">
                  </div>
                </div>
                <button type="submit" class=" mt-4 btn btn-block btn btn-secondary float-right btn-info"
                  id="klik">Ubah</button>
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

<script type="text/javascript">
var base_url = "<?php echo base_url() ?>";

function cekPassword() {
  var old_password = $('#old_password').val();
  $.ajax({
    url: base_url + "admin/admin/cekPassword",
    type: "POST",
    data: 'old_password=' + old_password,
    success: function(msg) {
      if (msg == 1) {
        $('#txtOldPassword').hide();
        $('#klik').show();
      } else {
        $('#txtOldPassword').show();
        $('#klik').hide();
      }
    }
  });
}
</script>