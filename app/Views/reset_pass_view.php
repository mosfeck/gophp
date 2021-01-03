<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-6">
            <h1>Reset Password</h1>
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
            <?php else : ?>
                <!-- <?php// print_r($users['uniid']) ?> -->
                <?= form_open(site_url('LoginControl/reset_password/'.$users['uniid'])) ?>

                <div class="form-group">
                    <label for="">Enter new password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Confirm new password</label>
                    <input type="password" name="confirmPassword" class="form-control">
                </div>


                <div class="form-group">
                    <input type="submit" name="register" value="Update" class="btn btn-primary">
                </div>



                <?= form_close() ?>
            <?php endif ?>




        </div>
    </div>
</div>
<?= $this->endSection() ?>