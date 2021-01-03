<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>



<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-6">

        <?php if (isset($validation)) : ?> 
            <div class="text-danger"><?php echo $validation->listErrors() ?></div>
             <?php endif; ?>

             <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif ?>

            <h1>Throttler Signin Form</h1>
            <?= form_open(site_url('SigninControl')) ?>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username"  class="form-control">
                
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password"  class="form-control">
                
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>