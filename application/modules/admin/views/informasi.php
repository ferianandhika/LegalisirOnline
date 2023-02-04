    <div class="content-page">
        <!-- Start content -->

        <div class="content">
            <div class="container-fluid">
                <h1>INFORMASI</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Data Informasi</h4>
                            <hr>
                            <table id="key-table" class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Informasi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td><?= $row->teks; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/informasi/edit/<?php echo $row->id; ?>"
                                            class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                                    </td>
                                </tr>
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
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1]
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths = ['10%', '90%'];
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1]
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths = ['10%', '90%'];
                    }

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