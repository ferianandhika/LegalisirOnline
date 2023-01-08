<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/coba3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title" style="color: blue;">Welcome To SIMALEJA</h1>
        <h4>Legalisir ijazah dan transkip nilai secara online. klik untuk melakukan legalisir</h4>
        <h4></h4>
        <br>
        <a href="<?= base_url('user/legalisir'); ?>" target="_blank" class="btn btn-warning btn-raised btn-lg">
          <i class="material-icons">next_plan</i> Lanjutkan
        </a>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Informasi</h2>
          <h5 class="description">Legasir online merupakan fasilitas yang diberikan oleh Politeknik Harapan Bersama
            Tegal sebagai
            bentuk apresiasi bagi alumni. Bagi alumni yang ingin melakukan legalisir silahkan membuat permintaan
            legalisir pada halaman Legalisir.</h5>
        </div>
      </div>
      <!-- <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-info">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Informasi Legalisir</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A
                paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">business</i>
              </div>
              <h4 class="info-title">Profil</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A
                paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-danger">
                <i class="material-icons">wysiwyg</i>
              </div>
              <h4 class="info-title">Visi & Misi</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A
                paragraph describing a feature will be enough.</p>
            </div>
          </div>
        </div>
      </div> -->
    </div>

    <div class="card">
      <?php foreach ($informasi as $data) : ?>
      <div class="card-body">


        <?= $data['teks']; ?>

      </div>
      <?php endforeach; ?>
    </div>

    <!-- <div class="section text-center">
      <h2 class="title">Here is our team</h2>
      <div class="team">
        <div class="row">
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="<?php echo base_url() ?>assets/user/img/faces/avatar.jpg" alt="Thumbnail Image"
                    class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Gigi Hadid
                  <br>
                  <small class="card-description text-muted">Model</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give
                    more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="<?php echo base_url() ?>assets/user/img/faces/christian.jpg" alt="Thumbnail Image"
                    class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Christian Louboutin
                  <br>
                  <small class="card-description text-muted">Designer</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give
                    more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="<?php echo base_url() ?>assets/user/img/faces/kendall.jpg" alt="Thumbnail Image"
                    class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">Kendall Jenner
                  <br>
                  <small class="card-description text-muted">Model</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">You can write here details about one of your team members. You can give
                    more details about what they do. Feel free to add some
                    <a href="#">links</a> for people to be able to follow them outside the site.
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Work with us</h2>
          <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few
            lines about each one and contact us about any further collaboration. We will responde get back to you in a
            couple of hours.</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  </div>
</div>