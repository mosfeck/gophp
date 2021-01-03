<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Image Manipulation</h1>

<div class="row justify-content-md-center">
    <div class="col-12 col-md-12">

        <!-- <form method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="">upload file</label>
                <input type="file" name="theFile" class="form-control-file">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>  -->
        <?php if (session('filepath')) : ?>
            <!-- <?php //echo session('filepath'); ?> -->
            <img src="<?php echo session('filepath'); ?>" alt="image1" width="200px" height="auto">
        <?php endif; ?>
        
        <!-- <img src="<?= base_url()?>/uploads/pp.jpg" alt="image"> -->
    </div>
</div>

<?= $this->endSection() ?>