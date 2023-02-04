<!doctype html>
<html lang="en">
    <?php $this->load->view('templates/header'); ?>
    <body>
        
    <?php $this->load->view('templates/navbar'); ?>
    
    <?php $this->load->view($content); ?>
        
    <?php $this->load->view('templates/footer'); ?>
    </body>
</html>