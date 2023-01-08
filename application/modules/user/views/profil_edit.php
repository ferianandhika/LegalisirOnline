<!-- <div class="page-header header-filter" data-parallax="true" style="background-color: chartreuse; height: 6cm;"></div> -->
<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/coba3.jpg'); height: 6cm;"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">EDIT PROFILE</h2>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-2 mx-auto">
            <div class="card card-login">
              <form class="form" method="POST" action="<?= base_url('user/profil/simpan_profile'); ?>"
                enctype="multipart/form-data">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Halaman Edit Profil</h4>
                </div>
                <div class="card-body">

                  <input type="hidden" name="id_user" id="id_user" value="<?= $userr['id']; ?>">
                  <div class="form-group bmd-form-group mx-5">
                    <label for="username" class="bmd-label-floating">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['name'];  ?>"
                      required onkeypress="return event.charCode < 48 || event.charCode  >57">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $user['id'];  ?>">
                  </div>
                  <div class="form-group bmd-form-group mx-5">
                    <label for="email" class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'];  ?>"
                      required>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 ml-auto mr-auto text-center">
            <button class="btn btn-primary btn-round">Simpan</button>
          </div>
        </div>
        <br>

        </form>


      </div>
    </div>
  </div>