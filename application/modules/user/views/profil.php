<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/coba3.jpg'); height: 6cm;"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">

      <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Profil</h4>
        </div>
        <div class="card-body">
          <h4 class="card-title">Profil Alumni</h4>
          <p class="card-text">Politeknik Harapan Bersama Tegal</p>

          <div class="container emp-profile">
            <form method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="profile-img">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" />
                    <!-- <div class="file btn btn-lg btn-primary"> -->
                    <!-- Change Photo -->
                    <!-- <input type="file" name="file" /> -->
                    <!-- </div> -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="profile-head">
                    <h5>
                      <?= $user['name'];  ?>
                    </h5>
                    <h6>
                      Web Developer and Designer
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                          aria-controls="home" aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                          aria-controls="profile" aria-selected="false">Timeline</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('user/profil/profil_edit'); ?>" class="btn btn-primary"
                    value="Edit Profile" />Edit Profile</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <!-- <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br />
                    <a href="">Bootsnipp Profile</a><br />
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br />
                    <a href="">Web Developer</a><br />
                    <a href="">WordPress</a><br />
                    <a href="">WooCommerce</a><br />
                    <a href="">PHP, .Net</a><br />
                  </div> -->
                </div>
                <div class="col-md-8">
                  <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <label>User Id</label>
                        </div>
                        <div class="col-md-6">
                          <p>ID USER</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Nama</label>
                        </div>
                        <div class="col-md-6">
                          <p><?= $user['name']; ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Email</label>
                        </div>
                        <div class="col-md-6">
                          <p><?= $user['email']; ?></p>
                        </div>
                      </div>
                      <!--                       <div class="row">
                        <div class="col-md-6">
                          <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                          <p>123 456 7890</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Profession</label>
                        </div>
                        <div class="col-md-6">
                          <p>Web Developer and Designer</p>
                        </div>
                      </div> -->
                      <div class="row">
                        <div class="col-md-6">
                          <label>member since</label>
                        </div>
                        <div class="col-md-6">
                          <p><?= date('d F Y', $user['date_created']); ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Experience</label>
                        </div>
                        <div class="col-md-6">
                          <p>Expert</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Hourly Rate</label>
                        </div>
                        <div class="col-md-6">
                          <p>10$/hr</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Total Projects</label>
                        </div>
                        <div class="col-md-6">
                          <p>230</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>English Level</label>
                        </div>
                        <div class="col-md-6">
                          <p>Expert</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Availability</label>
                        </div>
                        <div class="col-md-6">
                          <p>6 months</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label>Your Bio</label><br />
                          <p>Your detail description</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <!-- <a href="javascript:;" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>



    </div>
  </div>
</div>