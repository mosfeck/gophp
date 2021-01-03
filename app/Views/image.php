<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Image Manipulation</h1>

<div class="row justify-content-md-center">
    <div class="col-12 col-md-12">
        <?php if (isset($validation)) : ?>
            <div class="text_danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="">upload file</label>
                <input type="file" name="theFile" class="form-control-file">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>
</div>

<?= $this->endSection() ?>