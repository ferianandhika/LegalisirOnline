<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="container-fluid">
                <h3><i class="mdi mdi-account mr-2 mt-4"></i>Ubah Data Informasi</h3>

                <div class="card-body">
                    <?php
          if (validation_errors() != false) {
          ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php
          }
          ?>
                    <form method="post" action="<?php echo base_url(); ?>admin/informasi/update">
                        <input type="hidden" name="id_informasi" id="id_informasi" value="<?php echo $row->id; ?>" />
                        <div class="form-group">
                            <label for="nama">Teks Informasi</label>
                            <textarea class="form-control" id="teks" name="teks"
                                style="margin-top: 0px; margin-bottom: 0px; height: 500px;"><?php echo $row->teks;?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->




    <footer class="footer text-right">
        2016 - 2019 © Adminto. Coderthemes.com
    </footer>

</div>

<script>
CKEDITOR.replace('teks');
</script>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->