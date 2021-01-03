<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1><?= $title ?></h1>

<div class="row justify-content-md-center">
    <div class="col-12 col-md-8 offset-md-2">
        <form action="<?php echo site_url('Blog/create'); ?>" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <input id="" class="form-control" type="text" name="post_title">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea id="" class="form-control" name="post_content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>