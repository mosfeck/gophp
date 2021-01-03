<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-6">
            <h1>Login</h1>
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

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif ?>

            <?php if (session()->getTempdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getTempdata('success') ?>
                </div>
            <?php endif; ?>

            <?= form_open(site_url('LoginControl')) ?>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="register" value="Login" class="btn btn-primary">
                <a href="<?= site_url()?>/LoginControl/forgot_password">Forgot Password</a>
            </div>
            <div class="form-group">
                <a href="#"><img src="<?= base_url() ?>/public/assets/images/Google-Login.png" height="40"></a>
            </div>
            <div class="form-group">
                <a href="#"><img src="<?= base_url() ?>/public/assets/images/Facebook-Login.png" height="36"></a>
            </div>


            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>