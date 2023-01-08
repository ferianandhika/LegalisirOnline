    <!-- ============================================================== -->
    <!-- Start right Content here -->

    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <h1>Menu Legalisir</h1>

          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Data Legalisir</h4>


                <table id="key-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>NIM</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>Prodi</th>
                      <th>Tahun Lulus</th>
                      <th>no Ijazah</th>
                      <th>Status</th>
                      <th>File Ijazah</th>
                      <th>File Transkrip</th>
                      <th>Opsi</th>
                      <th>Status</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($legalisir as $row) {
                      ?>
                    <tr>
                      
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->nim; ?></td>
                        <td><?php echo $row->jenis_kelamin; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->no_hp; ?></td>
                        <td><?php echo $row->prodi; ?></td>
                        <td><?php echo $row->tahun_lulus; ?></td>
                        <td><?php echo $row->no_ijazah; ?></td>
                        <?php
                        if($row->status_midtrans == "settlement"){
                          $st_mid = "Sudah dibayar";
                        }else{
                          $st_mid = $row->status_midtrans;
                        }
                        ?>
                        <td><span class="badge badge-primary"><?php echo $st_mid; ?></span></td>
                        <td><a href="<?php echo base_url('upload/'.$row->file_ijazah.'');?>" target="_blank"><?php echo $row->file_ijazah; ?></a></td>
                        <td><a href="<?php echo base_url('upload/'.$row->file_transkrip.'');?>" target="_blank"><?php echo $row->file_transkrip; ?></a></td>
                        
                        <td>
                          <a href="#" class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                          <a href="#" class="btn btn-primary"><i class="mdi mdi-table-detail"></i></a>

                        </td>
                        <td>
                          <select class="form-control" name="status_<?php echo $row->id_legalisir;?>" id="status_<?php echo $row->id_legalisir;?>" onchange="ubahStatus(<?php echo $row->id_legalisir; ?>)">
                            <option value="" disabled="disabled" selected="selected">Pilih Status</option>
                            <option value="1">Diproses</option>
                            <option value="2">Dikirim</option>
                            <option value="3">Selesai</option>
                          </select>
                        </td>

                    </tr>
                      <?php
                      }
                      ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div> <!-- end row -->

        </div> <!-- container -->

      </div> <!-- content -->

      <script type="text/javascript">
        var base_url = "<?php echo base_url() ?>";
           // $('#datatable').DataTable( {
            //  dom: 'Bfrtip',
            //  buttons: [
            //      'excel', 'pdf', 'print'
            //  ]

          //} );
              $('#key-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                },
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                },

            },
        ]
    } );

        function ubahStatus(id){
          var status = $('#status_'+id).val();
          $.ajax({
          url: base_url+"admin/legalisir/ubahStatus",
          type: "POST",
          data: 'id='+ id+'&status='+status,
          success: function (msg){
            if(msg == 1){
              alert("sukses Ubah data");
              location.reload();
            }else{
              alert("Gagal Ubah data");
            }
          }
          });
        }
      </script>

      <footer class="footer text-right">
        2016 - 2019 © Adminto. Coderthemes.com
      </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->