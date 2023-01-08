    <div class="content-page">
      <!-- Start content -->

      <div class="content">
        <div class="container-fluid">
          <h1>PRODI</h1>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Data Prodi</h4>
                <hr>

                <a href="<?php echo base_url(); ?>admin/prodi/create" class="btn btn-primary mb-3"><i
                    class="mdi mdi-plus-circle mr-2"></i>Tambah Data</a>
                <table id="key-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Prodi</th>
                      <th>Warna</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tr>
                    <?php
                    $no = 1;
                    foreach ($prodi as $row) {
                    ?>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->nama_prodi; ?></td>
                    <td><i class="mdi mdi-circle" style="color: <?= $row->warna; ?>;"></i></td>
                    <td>
                      <a href="<?php echo base_url(); ?>admin/prodi/edit/<?php echo $row->id_prodi; ?>"
                        class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                      <a href="<?php echo base_url(); ?>admin/prodi/delete/<?php echo $row->id_prodi; ?>"" class=" btn
                        btn-danger"><i class="mdi mdi-delete"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
      // $('#datatable').DataTable( {
      //  dom: 'Bfrtip',
      //  buttons: [
      //      'excel', 'pdf', 'print'
      //  ]

      //} );
      $('#key-table').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            },
          },
          {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            },

          },
        ]
      });
      </script>


      <footer class="footer text-right">
        2016 - 2019 © Adminto. Coderthemes.com
      </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->