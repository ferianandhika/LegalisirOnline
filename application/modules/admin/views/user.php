    <!-- ============================================================== -->
    <!-- Start right Content here -->

    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">
          <h1>USER</h1>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Data User</h4>
                <hr>

                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $no = 1;
                      foreach ($user as $row) {
                      ?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->password; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->role_name;?></td>
                        <td>
                          <a href="#" class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                  <?php
                      }
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- content -->



      <footer class="footer text-right">
        2016 - 2019 © Adminto. Coderthemes.com
      </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->