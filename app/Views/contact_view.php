<?php
$page_session = \CodeIgniter\Config\Services::session();
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<script>
    setTimeout(function(){
        $('#hideMsg').hide();
    },3000)
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?php echo $validation->listErrors(); ?></div>
            <?php endif; ?>

            <?php if ($page_session->getTempdata('success')) : ?>
                <div id ="hideMsg" class="alert alert-success"><?= $page_session->getTempdata('success') ?></div>
            <?php endif; ?>

            <?php if ($page_session->getTempdata('error')) : ?>
                <div id ="hideMsg" class="alert alert-danger"><?= $page_session->getTempdata('error') ?></div>
            <?php endif; ?>


            <?= form_open(site_url('ContactControl')) ?>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="uname" class="form-control" value="<?= set_value('uname') ?>">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'uname') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'email') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?= set_value('mobile') ?>">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'mobile') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control" value="<?= set_value('message') ?>"></textarea>
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'message') ?></span> -->
            </div>
            <div class="form-group">

                <input type="submit" name="save" class="btn btn-primary" value="Send">
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>