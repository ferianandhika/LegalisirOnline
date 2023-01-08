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
                      <th>Prodi</th>
                      <th>Status</th>
                      <th>File Ijazah</th>
                      <th>File Transkrip</th>
                      <th>Opsi</th>
                      <th>Status</th>
                      <th>Diterima</th>
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
                        <td><?php echo $row->prodi; ?></td>
                        <?php
                        if($row->status_midtrans == "settlement"){
                          $st_mid = "Sudah dibayar";
                        }else{
                          $st_mid = $row->status_midtrans;
                        }

                        if($row->delivery_status == 0){
                          $deliv = "Belum <br> diterima";
                        }else{
                          $deliv = "Sudah <br> diterima";
                        }
                        ?>
                        <td><span class="badge badge-primary"><?php echo $st_mid; ?></span></td>
                        <td><a class="btn btn-primary" href="<?php echo base_url('upload/'.$row->file_ijazah.'');?>" target="_blank">Download Ijazah</a></td>
                        <td><a class="btn btn-success" href="<?php echo base_url('upload/'.$row->file_transkrip.'');?>" target="_blank">Download Transkrip</a></td>
                        
                        <td>
                          <a href="#" class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                          <a href="#!" class="btn btn-primary" onclick=showDetail(<?php echo $row->id_legalisir; ?>)> <i class="mdi mdi-information" data-toggle="modal" data-target=".bs-example-modal-lg"></i></a>

                        </td>
                        <td>
                          <select class="form-control" name="status_<?php echo $row->id_legalisir;?>" id="status_<?php echo $row->id_legalisir;?>" onchange="ubahStatus(<?php echo $row->id_legalisir; ?>)">
                            <option value="" disabled="disabled" selected="selected">Pilih Status</option>
                            <option value="1" <?php if ($row->status == 1){echo "selected";}else{}?>>Diproses</option>
                            <option value="2" <?php if ($row->status == 2){echo "selected";}else{}?>>Dikirim</option>
                            <option value="3" <?php if ($row->status == 3){echo "selected";}else{}?>>Selesai</option>
                          </select>
                        </td>
                        <td><?php echo $deliv;?></td>

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

       <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Detail Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body" id='bodyDetailData'>
                      ...
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

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
                          columns: [ 0, 1, 2, 3 ]
                      },
                  },
                  {
                      extend: 'pdfHtml5',
                      orientation: 'landscape',
                      pageSize: 'LEGAL',
                      exportOptions: {
                          columns: [ 0, 1, 2, 3 ]
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

        function showDetail(id){
           $.ajax({
              url: base_url+"admin/legalisir/showDetail",
              type: "POST",
              data: 'id='+ id,
              success: function (msg){
                $('#bodyDetailData').html(msg);
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