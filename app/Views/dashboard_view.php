<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>
<span>Welcome to <?= ucfirst($userdata->username) ?></span>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <?php if ($userdata->profile_pic != '') : ?>
                    <img src="<?= $userdata->profile_pic  ?>" height="60">
                <?php else : ?>
                    <img src="<?= base_url() ?>/public/assets/images/Mosfeck.jpg" height="60">
                <?php endif; ?>
                <h1>Welcome to <?= ucfirst($userdata->username) ?></h1>
                <h4>Mobile: <?= $userdata->mobile ?></h4>
                <h4>Email: <?= $userdata->email ?></h4>
                <a href="<?= site_url() . '/DashboardControl/logout' ?>">Logout</a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>