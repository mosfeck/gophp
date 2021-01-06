<?= $this->extend('layouts/main') ?>

<?= $this->section("title") ?>
<?= $page_title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Validation</h1>

<div class="row justify-content-md-center">
    <div class="col-12 col-md-12">
        
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Email address</label>
                <input type="text" name="email" class="form-control" value="<?php echo old(set_value('email')); ?>" placeholder="Enter email">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'email') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo old(set_value('password')); ?>" placeholder="Password">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'password') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo old(set_value('mobile')); ?>" placeholder="Mobile">
                <!-- <span class="text-danger"><?php //echo display_error($validation, 'mobile') ?></span> -->
            </div>
            <div class="form-group">
                <label for="">upload file</label>
                <input type="file" name="theFile" class="form-control-file">
            </div>
            <?php
            echo '<pre>';
            print_r($_POST);
            echo '<pre>';
            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>