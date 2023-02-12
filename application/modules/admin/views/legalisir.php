    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <h1>Data Legalisir</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Data Proses Legalisir</h4>
                            <table id="key-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Nama Lengkap</th>
                                        <th>Prodi</th>
                                        <th>Status Transaksi</th>
                                        <th>File Ijazah</th>
                                        <th>File Transkrip</th>
                                        <th>Dokumen</th>
                                        <th>Status Legalisir</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($legalisir as $row) :
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?=  date("d-m-Y", strtotime($row->created_at)) ?></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->nama_prodi; ?></td>
                                        <td>
                                            <?php if($row->status_midtrans == "settlement"): ?>
                                            <span class="badge badge-success">Sudah Dibayar</span>
                                            <?php elseif($row->status_midtrans == "expire") :?>
                                            <span class="badge badge-danger">Expired</span>
                                            <?php else :?>
                                            <span class="badge badge-warning">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="<?php echo base_url('upload/'.$row->file_ijazah.'');?>"
                                                target="_blank">Download Ijazah</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="<?php echo base_url('upload/'.$row->file_transkrip.'');?>"
                                                target="_blank">Download Transkrip</a>
                                        </td>
                                        <td>
                                            <?php if($row->delivery_status == 0) : ?>
                                            <span class="badge badge-info">Belum Diterima</span>
                                            <?php else : ?>
                                            <span class="badge badge-success">Sudah Diterima</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->status != 3) : ?>
                                            <select class="form-control" name="status_<?php echo $row->id_legalisir;?>"
                                                id="status_<?php echo $row->id_legalisir;?>"
                                                onchange="ubahStatus(<?php echo $row->id_legalisir; ?>)">
                                                <option value="" disabled="disabled" selected="selected">Pilih Status
                                                </option>
                                                <option value="1"
                                                    <?= $row->status == 1 ? ' selected="selected"' : '';?>>Diproses
                                                </option>
                                                <option value="2"
                                                    <?= $row->status == 2 ? ' selected="selected"' : '';?>>Dikirim
                                                </option>
                                                <option value="3"
                                                    <?= $row->status == 3 ? ' selected="selected"' : '';?>>Selesai
                                                </option>
                                            </select>
                                            <?php else : ?>
                                            <select disabled class="form-control"
                                                name="status_<?php echo $row->id_legalisir;?>"
                                                id="status_<?php echo $row->id_legalisir;?>"
                                                onchange="ubahStatus(<?php echo $row->id_legalisir; ?>)">
                                                <option value="" disabled="disabled" selected="selected">Pilih Status
                                                </option>
                                                <option value="1"
                                                    <?= $row->status == 1 ? ' selected="selected"' : '';?>>Diproses
                                                </option>
                                                <option value="2"
                                                    <?= $row->status == 2 ? ' selected="selected"' : '';?>>Dikirim
                                                </option>
                                                <option value="3"
                                                    <?= $row->status == 3 ? ' selected="selected"' : '';?>>Selesai
                                                </option>
                                            </select>
                                            <?php endif;  ?>
                                        </td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-success btn-sm"><i
                                                    class="mdi mdi-table-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a> -->
                                            <a href="#!" class="btn btn-primary btn-sm"
                                                onclick=showDetail(<?php echo $row->id_legalisir; ?>)> <i
                                                    class="mdi mdi-eye" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
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

        $('#key-table').DataTable({});

        function ubahStatus(id) {
            var status = $('#status_' + id).val();
            $.ajax({
                url: base_url + "admin/legalisir/ubahStatus",
                type: "POST",
                data: 'id=' + id + '&status=' + status,
                success: function(msg) {
                    if (msg == 1) {
                        alert("sukses Ubah data");
                        location.reload();
                    } else {
                        alert("Gagal Ubah data");
                    }
                }
            });
        }

        function showDetail(id) {
            $.ajax({
                url: base_url + "admin/legalisir/showDetail",
                type: "POST",
                data: 'id=' + id,
                success: function(msg) {
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