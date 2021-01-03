<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1><?= $title ?></h1>
<a href="<?= site_url('blog/delete/' .$post['post_id']) ?>" class="btn btn-danger">Delete</a>
<a href="<?= site_url('blog/edit/' .$post['post_id']) ?>" class="btn btn-primary">Edit</a>

<?= $this->endSection() ?>