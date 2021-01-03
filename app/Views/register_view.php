<?php
$page_session = \CodeIgniter\Config\Services::session();
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-6">
            <h1>Register</h1>

            <?php if (isset($validation)) : ?> 
                <div class="alert alert-danger"><?php echo $validation->listErrors() ?></div>
             <?php endif; ?>

             <?php if ($page_session->getTempdata('success')) : ?>
                <div id ="hideMsg" class="alert alert-success"><?= $page_session->getTempdata('success') ?></div>
            <?php endif; ?>

            <?php if ($page_session->getTempdata('error')) : ?>
                <div id ="hideMsg" class="alert alert-danger"><?= $page_session->getTempdata('error') ?></div>
            <?php endif; ?>
            
            <?= form_open(site_url('RegisterControl')) ?>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'username') 
                                                ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email"  value="<?= set_value('email') ?>" class="form-control">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'email'); ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass"  value="<?= set_value('pass') ?>" class="form-control">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'pass') 
                                                ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="cpass"  value="<?= set_value('cpass') ?>" class="form-control">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'cpass') 
                                                ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" value="<?= set_value('mobile') ?>"  class="form-control">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'mobile') 
                                                ?></span> -->
            </div>
            <div class="form-group">

                <input type="submit" name="register" value="Register" class="btn btn-primary">
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>