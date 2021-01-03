<?= $this->extend('layouts/main') ?>
<?= $this->section('page_title') ?>
<span>Welcome to <?= ucfirst($userdata->username) ?></span>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row ">
        <div class="col col-md-12">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <?php if (session()->getTempdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getTempdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
            <?php endif; ?>

            <h3>Upload Profile Photo</h3>
            <?= form_open_multipart(site_url('DashboardControl/avatar')) ?>
            <div class="form-group">
                <label>Upload Photo:</label>
                <input type="file" name="avatar" class="form-control-file">
            </div>
            <div class="form-group">

                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>