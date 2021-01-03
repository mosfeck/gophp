<?= $this->extend('layouts/main') ?>
<?= $this->section('page_title') ?>
<span>Welcome to <?= ucfirst($userdata->username) ?></span>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-12">
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

            <?php if (count($login_info) > 0) : ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Login time</th>
                        <th>Logout time</th>
                        <th>User Agent</th>
                        <th>Ip Address</th>
                    </tr>
                    <?php foreach ($login_info as $row) : ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= date("l dS M Y h:i:s a", strtotime($row->login_time)) ?></td>
                            <td><?= date("l dS M Y h:i:s a", strtotime($row->logout_time))  ?></td>
                            <td><?= $row->agent ?></td>
                            <td><?= $row->ip ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <h5>No information</h5>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>