<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-6">
            <h1>Forgot Password</h1>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getTempdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getTempdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getTempdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getTempdata('success') ?>
                </div>
            <?php endif; ?>

            <?= form_open(site_url('LoginControl/forgot_password')) ?>

            <div class="form-group">
                <label for="">Enter your email</label>
                <input type="text" name="email" class="form-control">
            </div>
            

            <div class="form-group">
                <input type="submit" name="register" value="Login" class="btn btn-primary">
            </div>
            


            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>